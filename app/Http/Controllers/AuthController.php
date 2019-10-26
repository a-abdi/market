<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

class AuthController extends Controller
{
    public function login_index() {
        return view('auth.login');
    }

    public function register_index() {
        return view('auth.register');
    }
    
    public function register(Request $request) {
        $register_res['status'] = false;

        if(!$request->filled('frist-name')){
            $register_res['msg'] = 'نام را وارد کنید';    
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }        

        if(!$request->filled('last-name')){
            $register_res['msg']='نام خانوادگی را وارد کنید';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        
        if(!$request->filled('phone-number')){
            $register_res['msg'] = 'شماره موبایل وارد کنید';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        $phone = $request->input("phone-number");
        if(!preg_match("/^[0-9]{11}$/", $phone)) {
            $register_res['msg'] = 'شماره موبایل نامعتبر هست';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        
        if(!$request->filled('password')) {
            $register_res['msg'] = 'پسورد را وارد کنید';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        $pass = $request->input('password');

        if(!$request->filled('password-confirm')) {
            $register_res['msg'] = 'تایید پسورد وارد کنید';
            return view('auth.register',[
                    'register_res' => $register_res
                ]
            );
        }
        $pass_c = $request->input('password-confirm');
        
        if($pass_c != $pass){
            $register_res['msg'] = 'پسورد تایید نشد';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }

        if($request->filled('email')) {
            $email = $request->input("email");
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $register_res['msg'] = 'ایمیل نامعتبر هست';
                return view('auth.register', [
                        'register_res' => $register_res
                    ]
                );
            }
        }
        
        $register_res['msg'] = 'ثبت نام موفقیت آمیز بود';
        $register_res['status'] = true; 
        return view('auth.register', [
                'register_res' => $register_res
            ]
        );
    }


    public function login(Request $request)
    {    
        //check username
        if(!$request->filled('phone-number')) {
            $login_res['msg'] = 'یوزر را وارد کنید';
            return view('auth.login', [
                    'login_res' => $login_res
                ]
            );
        }
        $phone = $request->input('phone-number');
        if(!preg_match("/^[0-9]{11}$/", $phone)) {
            $login_res['msg'] = 'شماره تلفن نامعتبر هست';
            return view('auth.login', [
                    'login_res' => $login_res
                ]
            );
        }

        //check password
        if(!$request->filled('password')) {
            $login_res['msg'] = 'پسورد را وارد کنید';
            return view('auth.login', [
                    'login_res' => $login_res
                ]
            ); 
        }
        $pass = $request->input('password');

        //validation
        if( ($phone == '09394552776') && ($pass == 'dev') ){
            //refresh session
            session()->flush();
            session()->regenerate();
            
            //login
            session()->put('phone-number', $phone);
            return redirect('/profile');
        }

        //authentication failed
        $login_res['msg'] = 'یوزر یا پسورد اشتباه هست';
        return view('auth.login', [
                'login_res' => $login_res
            ]
        );
    }
}
