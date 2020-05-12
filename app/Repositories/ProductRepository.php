<?php


namespace App\Repositories;


use App\Contracts\ProductContract;
use App\Http\Requests\ProductStoreRequest;
use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            $this->createProductTranslations($product, $request);
            $product->categories()->sync(explode(',', $request->productCategories));
            if($request->productAttributes){
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

    public function createProductTranslations(Product $product, $request)
    {
        $product->translateOrNew('ru')->name = $request->name_ru;
        $product->translateOrNew('ru')->description = $request->description_ru;
        $product->translateOrNew('ru')->composition = $request->composition_ru;
        $product->translateOrNew('ua')->name = $request->name_ua;
        $product->translateOrNew('ua')->description = $request->description_ua;
        $product->translateOrNew('ua')->composition = $request->composition_ua;
        $product->save();
    }
}
