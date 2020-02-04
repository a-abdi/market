<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PatternPhoneNumber implements Rule
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
        return  preg_match("/^[+]{1}[9]{1}[8]{1}[1-9]{1}[0-9]{9}$/", $value)
            ||  preg_match("/^[0]{1}[1-9]{1}[0-9]{9}$/", $value)
            ||  preg_match("/^[1-9]{1}[0-9]{9}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'شماره تلفن معتبر نمی باشد.';
    }
}
