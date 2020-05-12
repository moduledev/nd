<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /** Get all attribute
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadAttributes()
    {
        $attributes = Attribute::all();
        return response()->json($attributes);
    }

    /** Get products attribute
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function productAttributes(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return response()->json($product->attributes);
    }

    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->id);
        return response()->json($attribute);
    }
}
