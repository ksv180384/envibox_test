<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'phone' => 'required|regex:/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/',
            'message' => 'required|min:2',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Заполните поле Имя',
            'name.min' => 'Имя имя должно быть не короче :min-х символов.',
            'phone.required' => 'Введите номер телефона.',
            'phone.regex' => 'Неверный номер телефона. Пример: +7 (000) 000-00-00',
            'message.required' => 'Введите сообщение.',
            'message.min' => 'Размер сообщения должен быть не короче :min-х символов.',
        ];
    }
}
