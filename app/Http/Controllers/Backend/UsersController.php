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

class UsersController extends Controller
{
    public function  index() 
    {
        $users = User::all();
        return $this->returnView("menuitems.users", $users);
    }

    // handles XHR and HTTP requests
    private function returnView($menu, $data) {

        if (Request::ajax()) {

            $navigation = view('backend.navigation.right-menu')
                ->with('menuItems', $menu)
                ->render();

            $content = view('backend.users.index-template')
                ->with('data', $data)
                ->render();
            
            return Response::json(['html' => [ 'navigation' => $navigation, 'content' => $content]]);

        } else {

            return view('backend.users.index')
                ->with('menuItems', $menu)
                ->with('data', $data);
        }
    }
}
