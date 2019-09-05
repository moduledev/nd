<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:8',
            'image' => 'mimes:jpeg,jpg,png|max:3072',
            'activate' => 'sometimes',
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
            'name.required' => 'Имя обязательно к заполнению!',
            'email.required' => 'E-mail обязателун к заполнению!',
            'email.unique' => 'Указанный email уже существует!',
            'password.required' => 'Введите пароль!',
            'password.min' => 'Длина пароля должна быть не менее 8 символов!',
            'image.mimes' => 'Доступны для загрузки jpeg,jpg,png!',
            'image.max' => 'Размер изображения не должен превышать 3 мегабайт!',
        ];
    }
}
