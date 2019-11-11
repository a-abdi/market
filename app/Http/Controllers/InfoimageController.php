<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class InfoimageController extends Controller
{
    public function info_image(Request $request){

        return view('information.info_image');

    }
}
