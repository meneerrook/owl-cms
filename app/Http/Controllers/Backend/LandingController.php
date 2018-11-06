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
            //return Redirect::back()->with('message', 'Username/Password was incorrect!');

            // $navigation = view('backend.navigation.template')->render();
            // $page = view('backend.dashboard.template')->render();
            
            // $html = $navigation . $page;

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
