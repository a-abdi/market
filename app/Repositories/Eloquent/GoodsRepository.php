<?php

namespace App\Repositories\Eloquent;

use App\Models\Good;
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

}
