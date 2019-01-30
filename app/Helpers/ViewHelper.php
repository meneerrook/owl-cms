<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Request;
use Response;

class ViewHelper
{
    public static function resolve($view, $menu, $data = []) {

        if (Request::ajax()) {

            if(isset($data->id)){
                $navigation = view('backend.navigation.right-menu')
                                    ->with('id', $data->id)
                                    ->with('menuItems', $menu)
                                    ->render();
            } else {
                $navigation = view('backend.navigation.right-menu')
                                    ->with('menuItems', $menu)
                                    ->render();
            }

            $content = view($view)
                            ->with('data', $data)
                            ->with('isXhr', true)
                            ->render();
            
            return Response::json([
                'html' => [ 
                    'navigation' => $navigation, 
                    'content' => $content
                ]]);
            
        } else {
            
            if(isset($data->id)){
                return view($view)
                        ->with('data', $data)
                        ->with('id', $data->id)
                        ->with('menuItems', $menu)
                        ->with('isXhr', false);
            } else {
                return view($view)->with('data', $data)
                        ->with('menuItems', $menu)
                        ->with('isXhr', false);
            }
        }
    }
}