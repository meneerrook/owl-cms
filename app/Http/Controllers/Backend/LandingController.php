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

            //return Redirect::to('/owl/dashboard');

            $view = view('backend.dashboard.index')->render();
            
            return Response::json(['html' => $view, 'authenticated' => true]);

        }
        else{
            //return Redirect::back()->with('message', 'Username/Password was incorrect!');

            $view = view('backend.dashboard.index')->render();
            
            return Response::json(array('html' => $view, 'authenticated' => true));
        }
    }
}
