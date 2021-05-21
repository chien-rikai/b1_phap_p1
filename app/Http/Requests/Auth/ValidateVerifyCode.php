<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class ValidateVerifyCode extends FormRequest
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
        return [
            'verify' => function ($attribute, $value, $fail) {
                if ($value != Session::get('verify_code')) {
                    $fail(__('validation.verify_code'));
                }
            }
        ];
    }
}
