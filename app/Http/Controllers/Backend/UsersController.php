<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use View;
use Auth;
use ViewHelper;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return ViewHelper::resolve("backend.users.index", "navigation.users.users", "modules.users.index", $users);
    }

    public function userProfile($id) {
        $user = User::find($id);
        return ViewHelper::resolve("backend.users.user-profile", "navigation.users.user-profile", null, $user);
    }

    public function userAdd() {
        return ViewHelper::resolve("backend.users.user-add", "navigation.users.user-add");
    }

    public function userEdit($id) {
        $user = User::find($id);
        return ViewHelper::resolve("backend.users.user-edit", "navigation.users.user-edit", null, $user);
    }

    public function userDelete($id) {
        $user = User::find($id);
        return ViewHelper::resolve("backend.users.user-delete", "navigation.users.user-delete", null, $user);
    }
}
