<?php

namespace App\Contracts\Repositories;


interface CommentRepositoryInterface
{
    public function get_comments_data_by_goods_id($good_id);
}