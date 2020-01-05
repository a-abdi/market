<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Exceptions\Handler;


class ImageController extends Controller
{
       
    public function get_image_info(Request $request, $user_id){
        $check_error = DB::table('goods')
        ->where('id', $user_id)
        ->get();
        
        if(!count($check_error)) {
            abort(404);       
        }   
        
        $data = DB::table('goods')
            ->join('users', 'goods.user_id', '=', 'users.id')
            ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.name','goods.price','goods.img_src','goods.created_at')
            ->where('goods.id', $user_id)
            ->get();
            $data=$data['0'];

        return view('information.info_image',['data'=>$data]);
        

    }
}
