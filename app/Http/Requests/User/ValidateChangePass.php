<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ValidateChangePass extends FormRequest
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
            'password' => ['required'],
            'password_verify' => ['required', 'same:password']
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'password.required' => __('validation.required', ['attr' => __('common.password_new')]),
            'password_verify.same' => __('validation.same', ['attr' => __('common.password_verify')]),
            'password_verify.required' => __('validation.required', ['attr' => __('common.password_verify')]),
        ];

        return $messages;
    }
}
