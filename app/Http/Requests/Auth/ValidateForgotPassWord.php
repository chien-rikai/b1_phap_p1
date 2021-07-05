<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BlockUser;

class ValidateForgotPassWord extends FormRequest
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
            'email' => ['bail', 'email:rfc,dns', 'exists:users', new BlockUser()]
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => __('validation.exists', ['attr' => 'Email']),
            'email.email' => __('validation.email')
        ];
    }
}
