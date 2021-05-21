<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> b9956af (build_users_admin_module)
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
<<<<<<< HEAD
        $rules = [
            'password' => ['required'],
            'password_verify' => ['required', 'same:password']
=======
        $id = Request::all('id');
        $rules = [
            'password_old' => ['required', function ($attribute, $value, $fail) use ($id){
                $user = new User();

                if (!blank($user->where([
                    ['id', '=', $id],
                    ['password', '=', Hash::make($value)],
                ]))) {
                    $fail('Mật khẩu nhập không chính xác');
                }
            }],
            'password_new' => ['required'],
            'password_verify' => ['required', 'same:password_new']
>>>>>>> b9956af (build_users_admin_module)
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
<<<<<<< HEAD
            'password.required' => __('validation.required', ['attr' => __('common.password_new')]),
            'password_verify.same' => __('validation.same', ['attr' => __('common.password_verify')]),
            'password_verify.required' => __('validation.required', ['attr' => __('common.password_verify')]),
=======
            'password_old.required' => 'Mật khẩu cũ không được bỏ trống',

            'password_new.required' => 'Mật khẩu mới không được bỏ trống',
            'password_verify.same' => 'Xác nhận mật khẩu mới không khớp',
            'password_verify.required' => 'Xác nhận mật khẩu mới không được bỏ trống',
>>>>>>> b9956af (build_users_admin_module)
        ];

        return $messages;
    }
}
