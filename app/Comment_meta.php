<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_meta extends Model
{
    public function comment() {
        return $this->belongsTo('App\Comment', 'comment_id');
    }
    protected $table = 'comment_meta';
}
