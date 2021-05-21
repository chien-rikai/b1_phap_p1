<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePayment extends FormRequest
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
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required'],
            'address' => ['required']
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => __('validation.required', ['attr' => __('common.name_custom')]),
            'name.max' => __('validation.max', ['attr' => __('common.name_custom'), 'max' => '100']),

            'phone.required' => __('validation.required', ['attr' => __('common.phone')]),
            'email.required' => __('validation.required', ['attr' => __('common.email')]),
            'email.email' =>  __('validation.email'),
            'address.required' => __('validation.required', ['attr' => __('common.address')]),
        ];

        return $messages;
    }
}
