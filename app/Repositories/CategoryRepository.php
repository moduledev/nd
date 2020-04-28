<?php


namespace App\Repositories;


use App\Category;
use App\Contracts\CategoryContract;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories()
    {
        return $this->all();
    }
}
