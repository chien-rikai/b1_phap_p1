<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ValidateImport extends FormRequest
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
            'upload' => ['required', 'mimes:csv,txt,xlsx,xls'],
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'upload.required' => __('validation.required', ['attr' => __('common.upload')]),
            'upload.mimes' => __('validation.mimes'),
        ];

        return $messages;
    }
}
