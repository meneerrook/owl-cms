<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use ViewHelper;

class SettingsController extends Controller
{

    public function  index() 
    {
        return ViewHelper::resolve("backend.settings.index", "navigation.main.default");
    }
}
