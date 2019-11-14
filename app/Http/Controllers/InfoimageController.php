<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Exceptions\Handler;


class InfoimageController extends Controller
{
    // public function __construct(){
    //     $this->middleware('profile');
    // }
       
    public function info_image(Request $request){
        if(!$request->filled('id')) {
            return [
                'err' => 'no id found'
            ];
        }

        $id = $request->input('id');
        $data = DB::table('goods')
            ->join('users', 'goods.user_id', '=', 'users.id')
            ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.name','goods.price','goods.img_src','goods.created_at')
            ->where('goods.id', $id)
            ->get();
            $data=$data['0'];

        return view('information.info_image',['data'=>$data]);
        

    }
}
