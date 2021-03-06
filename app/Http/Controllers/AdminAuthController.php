<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use Facades\App\Repositories\SessionRepository;

class AdminAuthController extends Controller
{

    public function __construct() {
        $this->middleware('admin_auth');
    }

    public function login_index() {
        return view('admin.auth.login');
    }

    public function login(AdminLoginRequest $request)
    {
        $admin = new \stdClass();
        $admin->id = "1";
        $admin->phone_number = "9394552776";
        
        SessionRepository::refresh_session();
        SessionRepository::set_session($admin);
    }

}
