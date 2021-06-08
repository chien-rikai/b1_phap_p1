<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCreation extends FormRequest
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
            'name' => ['required', 'max:100', 'unique:categories,name'],
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => __('validation.required', ['attr' => __('common.category')]),
            'name.max' => __('validation.max', ['attr' => __('common.category'), 'max' => '100']),
            'name.unique' => __('validation.unique', ['attr' => __('common.category')]),
        ];

        return $messages;
    }
}
