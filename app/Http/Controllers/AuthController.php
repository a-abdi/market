<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function login_index() {
        return view('auth.login');
    }

    public function register_index() {
        return view('auth.register');
    }
    
    public function register(Request $request) {
        $register_res['status'] = false;

        if(!$request->filled('frist_name')){
            $register_res['msg'] = 'نام را وارد کنید';    
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }        

        if(!$request->filled('last_name')){
            $register_res['msg']='نام خانوادگی را وارد کنید';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        
        if(!$request->filled('phone_number')){
            $register_res['msg'] = 'شماره موبایل وارد کنید';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            );
        }
        $phone = $request->input('phone_number');
        if(!preg_match("/^[1-9]{1}[0-9]{9}$/", $phone)) {
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

        if(!$request->filled('password_confirm')) {
            $register_res['msg'] = 'تایید پسورد وارد کنید';
            return view('auth.register',[
                    'register_res' => $register_res
                ]
            );
        }
        $pass_c = $request->input('password_confirm');
        
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
        $users = DB::table('users')
            ->where('phone_number', $phone)
            ->get();

        if(count($users)) {
            $register_res['msg'] = ' این شماره قبلا ثبت نام کرده';
            return view('auth.register', [
                    'register_res' => $register_res
                ]
            ); 
        }   

        //store to database
        $user = $this->store($request);   
        $this->set_session($user);
        return redirect('/profile');
    }


    public function login(Request $request)
    {    
        //check username
        if(!$request->filled('phone_number')) {
            $login_res['msg'] = 'یوزر را وارد کنید';
            return view('auth.login', [
                    'login_res' => $login_res
                ]
            );
        }

        $phone = $request->input('phone_number');
        if(!preg_match("/^[1-9]{1}[0-9]{9}$/", $phone)) {
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

        $users = DB::table('users')
            ->where('phone_number', $phone)
            ->where('password', $pass)
            ->get();

        if(!count($users)) {
            $login_res['msg'] = 'یوزر یا پسورد اشتباه هست';
            return view('auth.login', [
                    'login_res' => $login_res
                ]
            ); 
        }
        
        //
        //validation
        
        $user = $users[0];
        $this->set_session($user);
        
        return redirect('/profile');

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

    public function set_session($user)
    {
        //refresh session
        session()->flush();
        session()->regenerate();
            
        //login
        session()->put('id',$user->id);
        session()->put('phone_number', $user->phone_number);

    }
    
}
