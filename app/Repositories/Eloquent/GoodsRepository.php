<?php

namespace App\Repositories\Eloquent;

use App\Models\Good;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\GoodsRepositoryInterface;


class GoodsRepository extends BaseRepository implements GoodsRepositoryInterface
{
    protected $model;
   
    public function __construct(Good $model)
    {
        $this->model = $model;
        parent::setModel($model);
    }

    public function get_goods_information($image_id)
    {
        return  DB::table('goods')
        ->join('users', 'goods.user_id', '=', 'users.id')
        ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.id','goods.name','goods.price','goods.img_src', 'goods.created_at')
        ->Where('goods.id', $image_id)
        ->first();
    }

    public function get_all_goods_data() {
        return  DB::table('goods')
        ->join('users', 'goods.user_id', '=', 'users.id')
        ->select('users.first_name','users.last_name','users.email','goods.id','goods.name','goods.price','goods.img_src', 'goods.created_at')
        ->get();
    }

    public function with_paginate($relations, $number_field)
    {
        return $this->model->with($relations)->paginate($number_field);
    }

}
