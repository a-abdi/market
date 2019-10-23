<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

class Auth1Controller extends Controller
{
    public function get_users() {
        $users = post::all();
        return $users;
    }
    
    public function register2_user(){
        return view('auth.register2');
    }
    public function login_index()
    {
        return view('auth.login1');
    }
    public function register_index()
    {
        return view('auth.register1');
    }
    public function auth_user()
    {
        // /* $name=Requset::input()
        if(Request::has('name')){
            return view('auth.register1');
        }
        
    }
    public function login_user(Request $request)
    {
        
        if(!$request->filled('email')){
            $login_res['status']=false;
            $login_res['msg']='یوزر را وارد کنید';
            return view('auth.login1',['login_res' => $login_res]);
        }
        if(!$request->filled('password')){
            $login_res['status']=false;
            $login_res['msg']='پسورد را وارد کنید';
            return view('auth.login1',['login_res' => $login_res]);
            
        }
        $email=$request->input('email');
        $pass=$request->input('password');
        if(($email=='aliabdi709')&&($pass=='dev')){
            $login_res['status']=true;
            $login_res['msg']='ورود موفقیت آمیز';
            return view('auth.login1',['login_res' => $login_res]);
        }
        $login_res['status']=false;
        $login_res['msg']='یوزر یا پسورد اشتباه هست';
        return view('auth.login1',['login_res' => $login_res]);
        
        /*if(!$request->filled('email')){
            $err='یوزر وارد کنید';
            return view('auth.login1', compact('err'));
            
        }
        if(!$request->filled('password')){
            $err='پسورد را وارد کنید';
            return view('auth.login1', compact('err'));
            
        }
        if(($arr['email']=='aliabdi709')&&($arr['password']=='dev')){
            // return view('auth.login1', compact('arr'));
            // return view('auth.login1')->with(compact('arr'));
            $msg = 'ورود با موفقیت انجام شد.';
            return view('auth.login1', compact('msg'));
            return view('auth.login1')->with('arr', $arr);
            return view('auth.login1')->with(['arr' => $arr]);
            return view('auth.login1', ['arr' => $arr]);
        }
        $err='یوزر یا پسورد اشتباه هست';
        return view('auth.login1', compact('err'));*/
        // if ($request->filled('email')) {
            /*$res = [];
            $email=$request->input('email');
            $res['email'] = $email;
            return view('auth.login1',$res);*/
            

            /*$email=$request->input('email');
            return view('auth.login1', compact('email'));*/
        // }

        dd('param is empty');
        
    }
}
