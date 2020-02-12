<?php

namespace App\Models;

class SessionModel
{
    public function user_set_session($user)
    {
        // set session
        session()->put('user_id', $user->id);
        session()->put('user_phone_number', $user->phone_number);
    }

    public function admin_set_session($admin)
    {
        // set session
        session()->put('admin_id', $admin->id);
        session()->put('admin_phone_number', $admin->phone_number);
    }

    public function refresh_session()
    {
        //refresh session
        session()->flush();
        session()->regenerate();
    }
    

}