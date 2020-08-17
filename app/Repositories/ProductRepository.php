<?php


namespace App\Repositories;


use App\Contracts\ProductContract;
use App\Http\Controllers\Admin\ImageUploader;
use App\Http\Requests\ProductStoreRequest;
use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductContract
{
    protected $model;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param ProductStoreRequest $request
     * @return Product|mixed
     */
    public function createProduct(ProductStoreRequest $request)
    {
        try {
            $product = new Product();
            $product->fill($request->validated());
            $product->base_name = $request->name_ru;
            $product->save();
            $product->categories()->sync(explode(',', $request->productCategories));
            if ($request->productAttributes) {
                foreach ($request->productAttributes as $productAttribute) {
                    $attribute = json_decode($productAttribute);
                    $product->attributes()->attach($attribute->attribute_id, ['value_ru' => $attribute->value_ru, 'value_ua' => $attribute->value_ua, 'price' => $attribute->price]);
                }
            }
            return $product;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    public function getProductById(int $id)
    {
        return $this->findOneOrFail($id);
    }

    public function getProductWithAttributes(int $id)
    {
        $product = Product::where('id', $id)->with(['attributes', 'categories', 'images'])->first();
        return $product;
    }

    public function updateProduct(Request $request)
    {
        // TODO: Implement updateProduct() method.
    }

    /** Delete product with images
     * @param int $id
     */
    public function deleteProduct(int $id)
    {
        $product = $this->find($id);
        $images = $product->images()->pluck('path');
        foreach ($images as $image) {
            unlink(storage_path('app/public/'. $image));
        }
        $product->delete();
    }
}
