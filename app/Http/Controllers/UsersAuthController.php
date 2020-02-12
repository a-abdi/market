<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Facades\App\Models\SharedModel;
use Facades\App\Models\SessionModel;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

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
        $request['phone_number'] = SharedModel::convert_standard_pattern($request->input('phone_number'));       
        $user = $this->store($request);  
        SessionModel::refresh_session(); 
        SessionModel::user_set_session($user);
        return redirect('/users/'.$request->session()->get('user_id').'/goods/create');
    }


    public function users_login(UserLoginRequest $request)
    {    
        $user = SharedModel::find_user('users', 'phone_number', SharedModel::convert_standard_pattern($request->input('phone_number')))[0];
        SessionModel::refresh_session();
        SessionModel::user_set_session($user);
        return redirect('/users/'.$request->session()->get('user_id').'/goods/create');
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