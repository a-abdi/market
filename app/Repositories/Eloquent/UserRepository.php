<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\UserRepositoryInterface;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
   
    public function __construct(User $model)
    {
        $this->model = $model;
        parent::setModel($model);
    }

}
