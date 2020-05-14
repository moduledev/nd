<?php


namespace App\Contracts;


use App\Http\Requests\AttributeUpdateRequest;

interface AttributeContract
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findAttributeById(int $id);

    /**
     * @return mixed
     */
    public function listAttributes();

    /**
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return mixed
     */
    public function updateAttribute(AttributeUpdateRequest $request, int $id);
}
