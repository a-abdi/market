<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['first_name','last_name','email','phone_number','password'];

    public function goods()
    {
        return $this->hasMany('app\models\good');
    }

    public function comments()
    {
        return $this->hasMany('app\models\comment');
    }
}
