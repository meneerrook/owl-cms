<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use ViewHelper;

class PagesController extends Controller
{
    // get:

    public function index() 
    {
        return ViewHelper::resolve("backend.pages.index", "navigation.pages.pages");
    }

    public function add() 
    {
        return ViewHelper::resolve("backend.pages.page-add", "navigation.pages.page-add");
    }
}
