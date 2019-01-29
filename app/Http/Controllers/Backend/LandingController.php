<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Request;
use Response;
use Auth;
use Input;
use ViewHelper;

class LandingController extends Controller
{
    // get:

    public function index() 
    {
        return ViewHelper::resolve("backend.dashboard.index", "navigation.main.default");
    }

    public function login()
    {
    	return view('backend.login.index');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/owl');
    }

    // post:
    
    public function authenticate(Request $request)
    {
        $email = Input::get('email');
        $password = Input::get('password');
        
        if (Auth::attempt(array('email' => $email, 'password' => $password ))){

            $navigation = view('backend.navigation.index')->with('menuItems', 'navigation.main.default')->render();
            $content = view('backend.dashboard.index-template')->render();
            

            return Response::json([
                'type' => 'page',
                'html' => [
                    'navigation' => $navigation,
                    'content' => $content,
                ],
                'config' => [
                    'activePage' => 'dashboard'
                ]
            ]);
        }
        else{
            return Response::json([
                'type' => 'message',
                'content' => [
                    'message-type' => 'warning',
                    'text' => "wrong email or pass",
                ]
            ]);
        }
    }

    /*public function getDashboardData() {

        $content = [];

        $posts_active = Post::all()->where('active', 1)->count();
        $posts_inactive = Post::all()->where('active', 0)->count();
        $posts_total = Post::all()->count();
        
        $dataTypes = ['posts', 'pages', 'media', 'comments'];

        for ($i=0; $i < $dataTypes->count(); $i++) { 
            
            $type = $dataTypes[$i];

            if($type == "posts") {
                $active = Post::all()->where('status', 'active')->count();
                $inactive = Post::all()->where('status', 'inactive')->count();
                $total = Post::all()->count();
            } elseif($type == "pages") {
                $active = Post::all()->where('status', 'active')->count();
                $inactive = Post::all()->where('status', 'inactive')->count();
                $total = Post::all()->count();
            } elseif($type == "media") {
                $active = Post::all()->where('status', 'active')->count();
                $inactive = Post::all()->where('status', 'inactive')->count();
                $total = Post::all()->count();
            } elseif($type == "comments") {
                $active = Post::all()->where('status', 'active')->count();
                $inactive = Post::all()->where('status', 'inactive')->count();
                $total = Post::all()->count();
            } else {
                return false;
            }
        }
    }*/
}
