<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class AttributeValueController extends MainController
{
    protected $attributeRepository;

    /**
     * AttributeValueController constructor.
     * @param AttributeContract $attributeRepository
     */
    public function __construct(AttributeContract $attributeRepository)
    {
        $this->middleware('auth:admin');
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getValues($id)
    {
        $attribute = $this->attributeRepository->findAttributeById($id);
        $values = $attribute->values;
        return response()->json(['values' => $values, 'attributeName' => $attribute->name]);
    }
}
