<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Facades\App\Repositories\SharedRepository;

use Facades\App\Repositories\AuthRepository;

use Illuminate\Support\Facades\DB;

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
    
    public function users_register(Request $request) {
        $register_res['status'] = false;

        if(!$request->filled('frist_name')){
            $register_res['msg'] = 'نام را وارد کنید';    
            return view('users.auth.register', [
                    'register_res' => $register_res
                ]
            );
        }        

        if(!$request->filled('last_name')){
            $register_res['msg']='نام خانوادگی را وارد کنید';
            return view('users.auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        
        if(!$request->filled('phone_number')){
            $register_res['msg'] = 'شماره تلفن را وارد کنید';
            return view('users.auth.register', [
                    'register_res' => $register_res
                ]
            );
        }

        
        $status = SharedRepository::check_number_persian($request->input('phone_number'));
        if($status){
            $request["phone_number"]= SharedRepository::convert2english($request->input('phone_number'));
        }
        $phone = SharedRepository::convert_phone_number($request->input('phone_number'));
        $request["phone_number"] = $phone;
        if(!$phone){
            $register_res['msg'] = 'شماره تلفن نامعتبر هست';
            return view('users.auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        
        if(!$request->filled('password')) {
            $register_res['msg'] = 'پسورد را وارد کنید';
            return view('users.auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        $pass = $request->input('password');

        if(!$request->filled('password_confirm')) {
            $register_res['msg'] = 'تایید پسورد را وارد کنید';
            return view('users.auth.register',[
                    'register_res' => $register_res
                ]
            );
        }
        $pass_c = $request->input('password_confirm');
        
        if($pass_c != $pass){
            $register_res['msg'] = 'پسورد تایید نشد';
            return view('users.auth.register', [
                    'register_res' => $register_res
                ]
            );
        }

        if($request->filled('email')) {
            $email = $request->input("email");
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $register_res['msg'] = 'ایمیل نامعتبر هست';
                return view('users.auth.register', [
                        'register_res' => $register_res
                    ]
                );
            }
        }
        
        $users = DB::table('users')
            ->where('phone_number', $phone)
            ->get();
        
        if(count($users)) {
            $register_res['msg'] = ' این شماره قبلا ثبت نام کرده';
            return view('users.auth.register', [
                    'register_res' => $register_res
                ]
            ); 
        }   
        
        //store to database        
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