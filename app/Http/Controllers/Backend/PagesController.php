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

class PagesController extends Controller
{
    // get:

    public function  index() 
    {
        $navigation = view('backend.navigation.right-menu')->with('menuItems', 'menuitems.default')->render();
        $content = view('backend.pages.index')->render();
        
        return Response::json([
            'html' => [
                'navigation' => $navigation,
                'content' => $content,
            ],
        ]);
    }
}
