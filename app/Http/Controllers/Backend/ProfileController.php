<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use ViewHelper;

class ProfileController extends Controller
{
    public function index() 
    {
        $user = User::find(Auth::user()->id);
        return ViewHelper::resolve("backend.profile.index", "navigation.profile.profile", $user);
    }
}
