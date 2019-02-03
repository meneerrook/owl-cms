<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Response;
use Validator;
use View;
use Auth;
use ViewHelper;

class UsersController extends Controller
{
    // get:
    public function __construct() {
        $this->userRules = [
            'firstname' => 'required||max:255',
            'lastname' => 'required:max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:5',
            'role' => 'required|in:admin,manager,editor,user',
            'status' => 'required|in:active,inactive'
        ];
    }

    public function index(){
        $users = User::all();
        return ViewHelper::resolve("backend.users.index", "navigation.users.users", "modules.users.index", $users);
    }

    public function userProfile($id) {
        $user = User::find($id);
        return ViewHelper::resolve("backend.users.user-profile", "navigation.users.user-profile", null, $user);
    }

    public function userAdd() {
        return ViewHelper::resolve("backend.users.user-add", "navigation.users.user-add", "modules.users.user-add");
    }

    public function userEdit($id) {
        $user = User::find($id);
        return ViewHelper::resolve("backend.users.user-edit", "navigation.users.user-edit", null, $user);
    }

    public function userDelete($id) {
        $user = User::find($id);
        return ViewHelper::resolve("backend.users.user-delete", "navigation.users.user-delete", null, $user);
    }

    // post:

    public function create(Request $request) {

        $validator = Validator::make($request->all(), $this->userRules);

        if ($validator->fails()) {
            return Response::json([
                'form' => 'add-user',
                'type' => 'danger',
                'messages' => $validator->errors()->messages()
            ]);
        };

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->status = "active";
        $user->save();

        return Response::json([
            'form' => 'add-user',
            'type' => 'success',
            'message' => 'User was successfully created.'
        ]);
    }
    public function update(Request $request) {

    }
    public function delete(Request $request) {
        
    }
}
