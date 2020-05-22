<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'messages' => $validator->errors()->all()
            ], 200)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ru' => 'required',
            'name_ua' => 'required',
            'available' => 'required',
            'price' => 'sometimes',
            'composition_ru' => 'required|max:255',
            'composition_ua' => 'required|max:255',
            'description_ru' => 'required|max:255',
            'description_ua' => 'required|max:255',
            'productImages' => 'required',
            'productImages.*' => 'file|mimes:jpeg,jpg,png|max:3072',
            'gluten' => 'sometimes',
            'lactose' => 'sometimes',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name_ru.required' => 'Название обязательно к заполнению!',
            'name_ua.required' => 'Название обязательно к заполнению!',
            'composition_ru.required' => 'Цена обязательно к заполнению!',
            'composition_ua.required' => 'Цена обязательно к заполнению!',
            'productImages.required' => 'Изображения обязательны!',
            'productImages.*.mimes' => 'Допустимые форматы изображений jpeg,jpg,png!',
            'productImages.*.max' => 'Максимальный размер изображения 3мб',
        ];

    }
}
