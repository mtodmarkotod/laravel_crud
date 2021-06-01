<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $guarded = [];

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeMale($query)
    {
        return $query->where('gender', 'male');
    }

    public function scopeFemale($query)
    {
        return $query->where('gender', 'female');
    }
}
