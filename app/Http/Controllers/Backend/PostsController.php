<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Request;
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

        if (Request::ajax()) {
            $navigation = view('backend.navigation.right-menu')->with('menuItems', 'menuitems.posts')->render();
            $content = view('backend.posts.index-template')->render();
            return Response::json(['html' => [ 'navigation' => $navigation, 'content' => $content,]]);
        } else {
            return view('backend.posts.index')->with('menuItems', 'menuitems.posts');
        }
    }
    public function add(){}
    public function edit(){}
    public function delete(){}
}
