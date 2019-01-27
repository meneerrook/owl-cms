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
        $posts = [];
        return $this->returnView("backend.posts.index", "navigation.posts.posts", $posts);


    }
    public function add(){
        $posts = [];
        return $this->returnView("backend.posts.post-add.post-add", "navigation.posts.post-add", $posts);
    }
    public function edit(){}
    public function delete(){}


    // handles XHR and HTTP requests
    private function returnView($viewName, $menu, $data) {

        $template = $viewName.'-template';
        $view = $viewName;

        if (Request::ajax()) {
            if(isset($data->id)){
                $navigation = view('backend.navigation.right-menu')->with('id', $data->id)->with('menuItems', $menu)->render();
            } else {
                $navigation = view('backend.navigation.right-menu')->with('menuItems', $menu)->render();
            }

            $content = view($template)->with('data', $data)->render();
            
            return Response::json(['html' => [ 'navigation' => $navigation, 'content' => $content]]);
        } else {
            if(isset($data->id)){
                return view($view)->with('data', $data)->with('id', $data->id)->with('menuItems', $menu);
            } else {
                return view($view)->with('data', $data)->with('menuItems', $menu);
            }
                
        }
    }
}
