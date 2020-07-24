<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'parent_id', 'user_id', 'body'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
