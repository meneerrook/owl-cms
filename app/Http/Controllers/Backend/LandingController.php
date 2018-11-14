<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Input;
use Response;
use View;

class LandingController extends Controller
{
    // get:

    public function  index() 
    {
        return view('backend.dashboard.index');
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

            $navigation = view('backend.navigation.index')->render();
            $page = view('backend.dashboard.template')->render();
            
            $html = $navigation . $page;

            return Response::json([
                'type' => 'page',
                'content' => [
                    'html' => $html,
                    'email' => 'simro@test.nl',
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
