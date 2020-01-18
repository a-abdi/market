<?php

namespace App\Repositories;

use Facades\App\Responses\AuthResponses;
use Facades\App\Repositories\ErrorMessageRepository;
use Facades\App\Repositories\SharedRepository;

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

    public function auth_name($request)
    {
        if(!$request->filled('name')) {
            return [
                'error' => 'نام انتخاب نشده'
            ];
        }
        return null;
    }

    public function auth_password($request)
    {
        if(!$request->filled('password')) {
            return [
                'error' => 'پسورد انتخاب نشده'
            ];
        }
        return null;
    }

    public function auth_price($request)
    {
        if(!$request->filled('price')) {
            return [
                'error' => 'قیمت کالا تعیین نشده'
            ];
        }

        if($request->price < 0) {
            return [
                'error' => 'قیمت کالا نمی تواند منفی باشد'
            ];
        }
        if($request->price > 9999999999) {
            return [
                'error' => 'حداکثر قیمت مجاز ۹,۹۹۹,۹۹۹,۹۹۹ می باشد'
            ];
        }
        return null;
    }

    public function auth_image($request)
    {
        $img =  $request->file('image');
        if(!$img){
            return [ 
                'error' => 'عکس انتخاب نشده'
            ];
        }
        $extension = $request->image->extension();
        $supported_image = array(
            'gif',
            'jpg',
            'jpeg',
            'png'
        );
        if (!in_array($extension, $supported_image)){
            return [ 
                'error' => 'فرمت عکس انتخاب شده پشتیبانی نمی شود' 
            ];
        }
        return null;
    }

    //********************************************************************************************** */ 
    
   
    
    // start point chech auth
    public function auth_admin($request)
    {
        return $this->check_name($request);
    }

    // check input name
    public function check_name($request)
    {
        if(!$request->filled('name')) {
            return SharedRepository::create_object_error(ErrorMessageRepository::get_name_is_empty_msg());
        }
        return $this->check_password($request);
    }

    // check input password
    public function check_password($request)
    {
        if(!$request->filled('password')) {
            return SharedRepository::create_object_error(ErrorMessageRepository::get_password_is_empty_msg());
        }
        return $this->auth_login($request);
    }

    // if the name and password is false return error massege
    public function auth_login($request)
    {
        if($request->input('name') != "root" || $request->input('password') != "toor")  {
            return SharedRepository::create_object_error(ErrorMessageRepository::username_or_password_is_incorrect_msg());
        }
        return new \stdClass();
    }


}