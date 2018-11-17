<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_meta extends Model
{
    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }
    protected $table = 'post_meta';
}
