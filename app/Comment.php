<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    public function comment_meta() {
        return $this->hasMany('App\Comment_meta', 'comment_id');
    }

    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    protected $table = 'comments';
}
