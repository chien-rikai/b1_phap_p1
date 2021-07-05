<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BlockUser;

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
            'email' => ['required', 'email:filter', 'max:100', new BlockUser()],
            'password' => ['required', 'max:100']
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'email.required' =>  __('validation.required', ['attr' => 'Email']),
            'email.email' =>  __('validation.email'),
            'email.max' => __('validation.max', ['attr' => 'Email', 'max' => '100']),

            'password.required' => __('validation.required', ['attr' => __('common.password')]),
            'password.max' => __('validation.max', ['attr' => __('common.password'), 'max' => '100']),
        ];

        return $messages;
    }
}
