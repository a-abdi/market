<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AuthAdmin implements Rule
{
    protected $password;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
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
        return $value === 'toor' && $this->password === 'root';
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
