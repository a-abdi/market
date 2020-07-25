<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class SharedModel
{

    function check_number_persian($phone)
    {
        return !preg_match('/[^۰-۹+]/', $phone);  
    }

    function convert2english($string) {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    
        $string =  str_replace($persianDecimal, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }

    public function standard_phone_number($phone)
    {
        return mb_substr($phone, -10, 10, 'utf-8');
    }

    public function find_user($table, $attribute, $value)
    {
        return DB::table($table)->where($attribute, $value)->get();
    }

    public function store_file($file ,$sub_address ,$address)
    {
        return 'storage/'.$file->store($sub_address, $address);
    }

    public function create_object_good($request, $img_src)
    {
        $good = new \stdClass();
        $good->name = $request->input('name');
        $good->price = $request->input('price');
        $good->user_id = session('user_id');
        $good->img_src = $img_src;
        return $good;
    }

    public function goods_select_except($except)
    {
        $columns = array(
            'price', 'name','user_id', 'id', 'img_src', 'created_at', 'updated_at'
        );
        return array_diff( $columns, (array) $except );
    }

    public function users_select_except($except)
    {
        $columns = array(
            'first_name', 'last_name', 'phone_number', 'email', 'password', 'id', 'created_at', 'updated_at'
        );
        return array_diff( $columns, (array) $except );
    }
}