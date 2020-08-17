<?php


namespace App\Contracts;


use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Http\Request;

interface ProductContract
{
    /**
     * @param ProductStoreRequest $request
     * @return mixed
     */
    public function createProduct(ProductStoreRequest $request);


//    /**
//     * @param Product $product
//     * @param $request
//     * @return mixed
//     */
//    public function createProductTranslations(Product $product, $request);

    public function getProductById(int $id);

    public function updateProduct(ProductUpdateRequest $request);

    public function getProductWithAttributes(int $id);

    public function deleteProduct(int $id);
}
