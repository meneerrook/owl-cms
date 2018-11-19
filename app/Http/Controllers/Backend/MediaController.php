<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Request;
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
        if (Request::ajax()) {
            $navigation = view('backend.navigation.right-menu')->with('menuItems', 'menuitems.default')->render();
            $content = view('backend.media.index-template')->render();
            return Response::json(['html' => [ 'navigation' => $navigation, 'content' => $content,]]);
        } else {
            return view('backend.media.index')->with('menuItems', 'menuitems.default');
        }
    }
}
