<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use ViewHelper;
use View;

class MediaController extends Controller
{
    // get:

    public function index() 
    {
        return ViewHelper::resolve("backend.media.index", "navigation.media.media");
    }

    public function add() 
    {
        return ViewHelper::resolve("backend.media.media-add", "navigation.media.media-add");
    }
}
