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

class MediaController extends Controller
{
    // get:

    public function  index() 
    {
        return view('backend.media.index')->with('menuItems', 'menuitems.default');
    }
}
