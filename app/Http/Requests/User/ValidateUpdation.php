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
        ];

        if (!empty(Request::all('url_image'))) {
            $rules['url_image'] = ['image'];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
<<<<<<< HEAD
            'name.required' => __('validation.required', ['attr' => __('common.user')]),
            'name.max' => __('validation.max', ['attr' => __('common.user'), 'max' => '100']),
        ];

        if (!empty(Request::all('url_image'))) {
            $messages['url_image.image'] = __('validation.image');
=======
            'name.required' => 'Tên quản trị viên không được bỏ trống !',
            'name.max' => 'Tên quản trị viên không được quá 100 kí tự !',
        ];

        if (!empty(Request::all('url_image'))) {
            $messages['url_image.image'] = 'Hình ảnh tải lên không đúng định dạng cho phép !';
>>>>>>> b9956af (build_users_admin_module)
        }

        return $messages;
    }
}
