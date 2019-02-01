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

            $navigation = view('backend.navigation.index')->with('menuItems', config('navigation.main.default'))->render();
            $content = view('backend.dashboard.index')->with('isXhr', true)->render();
            
            return Response::json([
                'type' => 'page',
                'html' => [
                    'navigation' => $navigation,
                    'content' => $content,
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
}
