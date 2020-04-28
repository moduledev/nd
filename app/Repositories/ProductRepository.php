<?php


namespace App\Repositories;


use App\Contracts\ProductContract;
use App\Http\Requests\ProductStoreRequest;
use App\Product;

class ProductRepository extends BaseRepository implements ProductContract
{
    protected $model;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function createProduct(ProductStoreRequest $request)
    {
        return $this->create($request);
    }
}
