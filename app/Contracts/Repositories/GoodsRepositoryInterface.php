<?php

namespace App\Contracts\Repositories;


interface GoodsRepositoryInterface
{
    public function get_goods_data($image_id);

    public function get_all_goods_data();
}