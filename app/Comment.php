<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function post()
    {
        $this->belongsTo('App\Post');
    }
}
