<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
            'name' => ['required', 'max:100'],
<<<<<<< HEAD
            'email' => ['required', 'email:rfc,dns'],
=======
>>>>>>> b9956af (build_users_admin_module)
            'password' => ['required'],
            'password_verify' => ['required', 'same:password']
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

            'email.required' =>  __('validation.required', ['attr' => 'Email']),
            'email.email' =>  __('validation.email'),

            'password.required' => __('validation.required', ['attr' => __('common.password')]),
            'password_verify.same' => __('validation.same', ['attr' => __('common.password_verify')]),
            'password_verify.required' => __('validation.required', ['attr' => __('common.password_verify')]),
        ];

        if (!empty(Request::all('url_image'))) {
            $messages['url_image.image'] = __('validation.image');
=======
            'name.required' => 'Tên quản trị viên không được bỏ trống !',
            'name.max' => 'Tên quản trị viên không được quá 100 kí tự !',

            'password.required' => 'Mật khẩu không được bỏ trống',
            'password_verify.same' => 'Xác nhận mật khẩu không khớp',
            'password_verify.required' => 'Xác nhận mật khẩu không được bỏ trống',
        ];

        if (!empty(Request::all('url_image'))) {
            $messages['url_image.image'] = 'Hình ảnh tải lên không đúng định dạng cho phép !';
>>>>>>> b9956af (build_users_admin_module)
        }

        return $messages;
    }
}
