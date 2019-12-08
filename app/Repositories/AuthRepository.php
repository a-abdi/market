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

    public function auth_name($request)
    {
        if(!$request->filled('name')) {
            return [
                'error' => 'نام کالا انتخاب نشده'
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
}