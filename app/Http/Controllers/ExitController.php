<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Facades\App\Repositories\AuthRepository;

class ExitController extends Controller
{
    public function exit()
    {
        session()->flush();
        return redirect('login');
    }
}
