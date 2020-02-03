<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Facades\App\Repositories\SharedRepository;

class CheckExistUser implements Rule
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
        return !count(SharedRepository::find_id('users', $attribute, SharedRepository::convert_standard_pattern($value)));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'این شماره قبلا ثبت نام کرده.';
    }
}
