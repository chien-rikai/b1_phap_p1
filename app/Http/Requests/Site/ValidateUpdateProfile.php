<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Phone;
use App\Rules\PhoneLenght;

class ValidateUpdateProfile extends FormRequest
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
            'name' => ['bail', 'required', 'regex:/^([^0-9]*)$/'],
            'email' => ['bail', 'email:rfc,dns'],
            'address' => ['required'],
            'phone' => ['required', new Phone(), new PhoneLenght()],
        ];

        // if (Request::all('url_image')) {
        //     $rules['url_image'] = ['image'];
        // }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Vui lòng nhập đây đủ họ tên',
            'name.regex' => 'Tên người dùng có chứa kí tự không phù hợp',
            'email.email' => 'Email không đúng định dạng cho phép',
            'address.required' => 'Địa chỉ không  được để trống',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'password.required' => 'Mật khẩu không được để trống',
            'password_confirm.required' => 'Mật khẩu xác minh không được để trống',
            'pasword_confirm.same' => 'Mật khẩu xác nhận không đúng với Mật khẩu',
        ];

        return $messages;
    }
}
