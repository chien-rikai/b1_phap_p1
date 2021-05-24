<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneLenght implements Rule
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
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $check = false;

        if ((int) strlen($value) === 10 || (int) strlen($value) === 11) {
            $check = true;
        }

        return $check;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.phone_lenght');
    }
}
