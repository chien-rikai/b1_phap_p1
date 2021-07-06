<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ValidateUpdation extends FormRequest
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
            'status' => ['required']
        ];

        if (!empty(Request::all('url_image'))) {
            $rules['url_image'] = ['image'];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => __('validation.required', ['attr' => __('common.user')]),
            'name.max' => __('validation.max', ['attr' => __('common.user'), 'max' => '100']),
            
            'status.required' => __('validation.required', ['attr' => __('common.status')]),
        ];

        if (!empty(Request::all('url_image'))) {
            $messages['url_image.image'] = __('validation.image');
        }

        return $messages;
    }
}
