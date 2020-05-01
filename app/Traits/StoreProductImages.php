<?php


namespace App\Traits;


use App\Http\Requests\ProductStoreRequest;

trait StoreProductImages
{
    public function storeProductImages(ProductStoreRequest $request)
    {
        foreach ($request->productImages as $file) {
            $file->store('products_images', 'public');
        }
    }
}
