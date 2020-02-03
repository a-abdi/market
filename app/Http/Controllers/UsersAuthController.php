<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRegisterRequest;
use Facades\App\Repositories\AuthRepository;
use Facades\App\Repositories\SharedRepository;

class UsersAuthController extends Controller
{
    public function __construct(){
        $this->middleware('users_auth');
    }

    public function users_login_index() {
        return view('users.auth.login');
    }

    public function users_register_index() {
        return view('users.auth.register');
    }
    
    public function users_register(UserRegisterRequest $request) {
        //store to database
        $request['phone_number'] = SharedRepository::convert_standard_pattern($request->input('phone_number'));       
        $user = $this->store($request);  
        AuthRepository::refresh_session(); 
        AuthRepository::set_session($user);
        return redirect('/users/'.$request->session()->get('id').'/goods/create');
    }


    public function users_login(Request $request)
    {    
        //check username
        if(!$request->filled('phone_number')) {
            $login_res['msg'] = 'شماره تلفن را وارد کنید';
            return view('users.auth.login', [
                    'login_res' => $login_res
                ]
            );
        }

        $status = SharedRepository::check_number_persian($request->input('phone_number'));
        if($status){
            $request["phone_number"]= SharedRepository::convert2english($request->input('phone_number'));
        }
        $phone = SharedRepository::convert_phone_number($request->input('phone_number'));
       
        if(!$phone) {
            $login_res['msg'] = 'شماره تلفن نامعتبر هست';
            return view('users.auth.login', [
                'login_res' => $login_res
                ]
            );
        }

        //check password
        if(!$request->filled('password')) {
            $login_res['msg'] = 'پسورد را وارد کنید';
            return view('users.auth.login', [
                    'login_res' => $login_res
                ]
            ); 
        }
        $pass = $request->input('password'); 

        $res = true;
        $user = DB::table('users')
            ->where('phone_number', $phone)
            ->first();
           
        if(empty($user)) {
            $res = false;
        } else {
            if($user->password != $pass) {
                $res = false;
            }
        }
        
        if(!$res) {
            $login_res['msg'] = 'شماره تلفن یا پسورد اشتباه هست';
            return view('users.auth.login', [
                'login_res' => $login_res
                ]
            );
        }
    
        AuthRepository::refresh_session();
        AuthRepository::set_session($user);
        
        return redirect('/users/'.$request->session()->get('id').'/goods/create');

    }

    //store information register in database
    public function store(Request $request)
    {   
        $user = new User;
        $user->first_name = $request->input('frist_name');
        $user->last_name =  $request->input('last_name');
        $user->phone_number =  $request->input('phone_number');
        $user->email =  $request->input('email');
        $user->password =  $request->input('password');
        $user->save();
        return $user;
    }
   
}