<?php

namespace App\Rules;

use Facades\App\Models\SharedModel;
use Illuminate\Contracts\Validation\Rule;

class CheckNotExistUser implements Rule
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
        return !count(SharedModel::find_user('users', $attribute, SharedModel::standard_phone_number($value)));
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
