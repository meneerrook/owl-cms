<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments() {
        return $this->hasMany('App\Comment', 'post_id');
    }
    public function post_meta() {
        return $this->hasMany('App\Post_meta', 'post_id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }

    protected $table = 'posts';
}
