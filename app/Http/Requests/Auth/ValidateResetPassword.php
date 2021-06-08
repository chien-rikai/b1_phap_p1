<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ValidateResetPassword extends FormRequest
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
            'password' => ['required'],
            'password_confirm' => ['required', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'password.required' => __('validation.required', ['attr' => __('common.password')]),
            'password_confirm.same' => __('validation.same', ['attr' => __('common.password_confirm')]),
            'password_confirm.required' => __('validation.required', ['attr' => __('common.password_confirm')]),
        ];
    }
}
