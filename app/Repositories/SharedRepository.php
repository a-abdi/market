<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class SharedRepository
{

    function check_number_persian($phone){
        if (!preg_match('/[^۰-۹+]/', $phone))
        {
            return true;   
        }
        return false;
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

    public function convert_phone_number($phone)
    {
        if(preg_match("/^[+]{1}[9]{1}[8]{1}[1-9]{1}[0-9]{9}$/", $phone)){
           return mb_substr($phone, -10, 10, 'utf-8');
        }

        if(preg_match("/^[0]{1}[1-9]{1}[0-9]{9}$/", $phone)){
            return mb_substr($phone, -10, 10, 'utf-8');
        }

        if(preg_match("/^[1-9]{1}[0-9]{9}$/", $phone)) {
            return $phone;
        }

        return false;
    }

    public function admin_goods_search($value,$type)
    {
        $data = DB::table('goods')
        ->select('name','price','img_src','created_at','id','user_id')
        ->where($type, $value)
        ->get();
        return $data;
    }

}