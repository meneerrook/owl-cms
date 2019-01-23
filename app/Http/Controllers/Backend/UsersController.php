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
    public function index() 
    {
        $users = User::all();
        return $this->returnView("backend.users.index", "navigation.users.users", $users);
    }

    public function userProfile($id) {
        $user = User::find($id);
        return $this->returnView("backend.users.user-profile.user-profile", "navigation.users.user-profile", $user);
    }

    public function userEdit($id) {
        $user = User::find($id);
        return $this->returnView("backend.users.user-edit.user-edit", "navigation.users.user-edit", $user);
    }

    public function userDelete($id) {
        $user = User::find($id);
        return $this->returnView("backend.users.user-delete.user-delete", "navigation.users.user-delete", $user);
    }

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
