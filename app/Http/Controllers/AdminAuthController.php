<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Facades\App\Repositories\AuthRepository;

class AdminAuthController extends Controller
{

    public function __construct(){
        $this->middleware('admin_auth');
    }

    public function login_index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $error = AuthRepository::auth_name($request);
        if($error){
            return $error;
        }

        $error = AuthRepository::auth_password($request);
        if($error){
            return $error;
        }
        
        if($request->input('name') != "root"){
            $error = [
                'error' => 'نام کاربری اشتباه است.'
            ];
            return $error;
        }

        if($request->input('password') != "toor"){
            $error = [
                'error' => 'پسورد اشتباه است.'
            ];
            return $error;
        }
        
        AuthRepository::refresh_session(); 
        session()->put('user_name', $request->input('name'));

    }

}
