<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'code' => 'required',
            'name_ua' => 'required',
            'name_ru' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Индификатор категории обязателен к заполнению!',
            'name_ua.required' => 'Название (укр.) обязательно к заполнению!',
            'name_ru.required' => 'Название (рус.) обязательно к заполнению!',
        ];
    }
}
