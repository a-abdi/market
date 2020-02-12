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

    public function convert_standard_pattern($phone)
    {
        return mb_substr($phone, -10, 10, 'utf-8');
    }

    public function goods_search($value,$type)
    {
        $data = DB::table('goods')
        ->select('name','price','img_src','created_at','id','user_id')
        ->where($type, $value)
        ->get();
        return $data;
    }

    public function find_user($table, $attribute, $value)
    {
        return DB::table($table)->where($attribute, $value)->get();
    }

    // *******************************************************************************************************************

    // check a value if filled return true
    // public function  check_if_filled($) 
    // {
    //     return filled($value);
    // }
    public function create_object_error($message) {
        $res = new \stdClass();
        $res->error = new \stdclass();
        $res->error->status = true;
        $res->error->message = $message;

        return $res;
    }



}