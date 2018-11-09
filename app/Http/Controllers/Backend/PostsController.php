<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Input;
use Response;
use View;

class PostsController extends Controller
{
    // get:

    public function  index() 
    {
        return view('backend.posts.index');
    }
}
