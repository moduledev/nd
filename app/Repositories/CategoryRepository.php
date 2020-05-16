<?php


namespace App\Repositories;


use App\Category;
use App\Contracts\CategoryContract;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function listCategories()
    {
        return $this->all();
    }

    public function createCategory(CategoryStoreRequest $request)
    {
        $category = new Category();
        $category->fill($request->validated());
        $category->save();
        return $category;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getCategoryById(int $id)
    {
       return $this->findOneOrFail($id);
    }

    public function updateCategory(CategoryUpdateRequest $request, int $id)
    {
        $category = $this->find($id);
        $category->fill($request->validated());
        $category->save();
        return $category;
    }
}
