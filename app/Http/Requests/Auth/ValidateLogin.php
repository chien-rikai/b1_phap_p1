<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLogin extends FormRequest
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
        $rules = [
            'email' => ['required', 'email:filter', 'max:100'],
            'password' => ['required', 'max:100']
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng cho phép',
            'email.max' => 'Không được quá 100 kí tự',

            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.max' => 'Không được quá 100 kí tự',
        ];

        return $messages;
    }
}
