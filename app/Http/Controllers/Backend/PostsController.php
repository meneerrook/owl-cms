<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use ViewHelper;

class PostsController extends Controller
{
    // get:

    public function  index() 
    {
        return ViewHelper::resolve("backend.posts.index", "navigation.posts.posts");
    }
    public function add()
    {
        return ViewHelper::resolve("backend.posts.post-add", "navigation.posts.post-add");
    }
}
