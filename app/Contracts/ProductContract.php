<?php


namespace App\Contracts;



use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;

interface ProductContract
{
    /**
     * @param ProductStoreRequest $request
     * @return mixed
     */
    public function createProduct(ProductStoreRequest $request);

}
