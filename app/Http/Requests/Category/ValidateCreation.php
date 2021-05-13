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
            'name.required' => 'Tên danh mục không được để trống !',
            'name.max' => 'Tên danh mục không được quá 100 kí tự !',
            'name.unique' => 'Tên danh mục đã tồn tại !',
        ];

        return $messages;
    }
}
