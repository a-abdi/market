<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = ['name', 'price', 'user_id', 'img_src', 'post_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
