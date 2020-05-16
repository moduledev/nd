<?php


namespace App\Contracts;


use App\Http\Requests\CategoryUpdateRequest;

interface CategoryContract
{
    /**
     * @return mixed
     */
    public function listCategories();

    /**
     * @param int $id
     * @return mixed
     */
    public function getCategoryById(int $id);

    /**
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return mixed
     */
    public function updateCategory(CategoryUpdateRequest $request, int $id);
}
