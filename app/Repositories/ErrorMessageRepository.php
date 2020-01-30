<?php

namespace App\Repositories;

class ErrorMessageRepository
{
    // all message for auth
    const name_is_empty_msg = "نام وارد نشده است.";
    const password_is_empty_msg = "پسورد وارد نشده است.";
    const username_or_password_is_incorrect = "نام کاربری یا پسورد اشتباه است.";


    public function get_name_is_empty_msg(){
        return $this::name_is_empty_msg;
    }
    
    public function get_password_is_empty_msg(){
        return $this::password_is_empty_msg;
    }

    public function username_or_password_is_incorrect_msg(){
        return $this::username_or_password_is_incorrect;
    }
    

}