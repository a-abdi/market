<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Models\SessionModel;
use App\Http\Requests\AdminLoginRequest;

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
        
        SessionModel::refresh_session();
        SessionModel::admin_set_session($admin);
    }

}
