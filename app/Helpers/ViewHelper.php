<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Request;
use Response;

class ViewHelper
{
    public static function resolve($viewName, $menu, $data = []) {

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