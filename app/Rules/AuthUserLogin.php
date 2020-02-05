<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Facades\App\Repositories\SharedRepository;

class AuthUserLogin implements Rule
{
    protected $phone_number;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($phone_number)
    {
        $this->phone_number = $phone_number;
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
        return SharedRepository::
        find_user('users', 'phone_number', SharedRepository::
        convert_standard_pattern($this->phone_number))[0]->password === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'نام کاربری یا پسورد اشتباه است.';
    }
}
