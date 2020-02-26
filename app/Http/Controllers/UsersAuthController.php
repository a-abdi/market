<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Models\SharedModel;
use Facades\App\Models\SessionModel;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Contracts\Repositories\UserRepositoryInterface;


class UsersAuthController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user) {
        $this->middleware('users_auth');
        $this->user = $user;
    }

    public function users_login_index() {
        return view('users.auth.login');
    }

    public function users_register_index() {
        return view('users.auth.register');
    }
    
    public function users_register(UserRegisterRequest $request) 
    {
        $request['phone_number'] = SharedModel::standard_phone_number($request->input('phone_number'));       
        $new_user = $this->user->create($request->all());
        SessionModel::refresh_session();
        SessionModel::user_set_session($new_user);
        return redirect('/users/'.$request->session()->get('user_id').'/goods/create');
    }

    public function users_login(UserLoginRequest $request)
    {    
        $user = SharedModel::find_user('users', 'phone_number', SharedModel::standard_phone_number($request->input('phone_number')))[0];
        SessionModel::refresh_session();
        SessionModel::user_set_session($user);
        return redirect('/users/'.$request->session()->get('user_id').'/goods/create');
    }
}