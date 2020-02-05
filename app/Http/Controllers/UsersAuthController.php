<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
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


    public function users_login(UserLoginRequest $request)
    {    
        $user = SharedRepository::find_user('users', 'phone_number', SharedRepository::convert_standard_pattern($request->input('phone_number')))[0];
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