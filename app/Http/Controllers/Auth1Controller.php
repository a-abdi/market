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
    public function login2_user(){
        return view('auth.login2');
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
    public function auth_register2(Request $request){
        $login_res['status']=false;
        if(!$request->filled('frist-name')){
            $login_res['ms']='Enter Your First Name';    
            return view('auth.register2',['login_res'=>$login_res]);
        }        
        if(!$request->filled('last-name')){
            $login_res['ms']='Enter Your Last Name';
            return view('auth.register2',['login_res'=>$login_res]);
        }
        if(!$request->filled('phone-number')){
            $login_res['ms']='Enter Phone Number';
            return view('auth.register2',['login_res'=>$login_res]);
        }
        if(!$request->filled('password')){
            $login_res['ms']='Enter password';
            return view('auth.register2',['login_res'=>$login_res]);
        }
        if(!$request->filled('password-confirm')){
            $login_res['ms']='Enter password Confirm';
            return view('auth.register2',['login_res'=>$login_res]);
        }
        $email = $request->input("email");
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $login_res['ms']='Invalid email format';
            return view('auth.register2',['login_res'=>$login_res]);
        }
        $phone = $request->input("phone-number");
        if(preg_match("/^[0-9]{4}[0-9]{3}[0-9]{4}$/", $phone)) {
            $login_res['ms']='Invalid phone number';
            return view('auth.register2',['login_res'=>$login_res]);
          }
        $pass_c=$request->input('password-confirm');
        $pass=$request->input('password');
        if($pass_c!=$pass){
            $login_res['ms']='Password Not Mach';
            return view('auth.register2',['login_res'=>$login_res]);
        }

        $login_res['ms']='register Successfuly';
        $login_res['status']=true; 
        return view('auth.register2',['login_res'=>$login_res]);
    }
    public function auth_login2(Request $request)
    {
        
        if(!$request->filled('phone-number')){
            $login_res['status']=false;
            $login_res['msg']='یوزر را وارد کنید';
            return view('auth.login2',['login_res' => $login_res]);
        }
        if(!$request->filled('password')){
            $login_res['status']=false;
            $login_res['msg']='پسورد را وارد کنید';
            return view('auth.login2',['login_res' => $login_res]);
            
        }
        $phone = $request->input("phone-number");
        if(preg_match("/^[0-9]{4}[0-9]{3}[0-9]{4}$/", $phone)) {
            $login_res['ms']='Invalid phone number';
            return view('auth.register2',['login_res'=>$login_res]);
          }
        $email=$request->input('phone-number');
        $pass=$request->input('password');
        if(($email=='09394552776')&&($pass=='dev')){
            $login_res['status']=true;
            $login_res['msg']='ورود موفقیت آمیز';
            return view('auth.login2',['login_res' => $login_res]);
        }
        $login_res['status']=false;
        $login_res['msg']='یوزر یا پسورد اشتباه هست';
        return view('auth.login2',['login_res' => $login_res]);
        
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
