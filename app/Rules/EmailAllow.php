<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailAllow implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allows = [
            '@gmail.com',
            '@yahoo.com.vn',
            '@yahoo.com',
            '@yahoo.vn',
        ];

        return (in_array(strstr($value, '@'), $allows, true)) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Địa chỉ Email không đúng định dạng cho phép';
    }
}
