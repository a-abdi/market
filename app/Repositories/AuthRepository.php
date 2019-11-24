<?php

namespace App\Repositories;

class AuthRepository
{
    public function set_session($user)
    {
        // set session
        session()->put('id',$user->id);
        session()->put('phone_number', $user->phone_number);

    }


    public function refresh_session()
    {
        //refresh session
        session()->flush();
        session()->regenerate();
    }
}