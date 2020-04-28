<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'name_ru' => 'required',
//            'name_ua' => 'required',
//            'available' => 'required',
//            'price' => 'required',
//            'composition_ru' => 'required|max:255',
//            'description_ru' => 'required|max:255',
//            'productImages.*' => 'required|mimes:jpeg,jpg,png|max:3072',
//            'gluten' => 'sometimes',
//            'lactose' => 'sometimes',
        ];
    }
}
