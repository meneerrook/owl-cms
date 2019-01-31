<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Request;
use Response;

class ViewHelper
{
    /**
     * Determines wether request was xhr or not, 
     * based on that returns the correct view based on the parameters given.
     *
     * @param string $view
     * @param string $menu
     * @param string $module
     * @param array $data
     * @return Request json data
     * @return View blade view
     */
    public static function resolve($view, $menu, $module = "", $data = []) {
        
        $menu = config($menu);
        $module = config($module);

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
            
            isset($module['id']) ? $module_id = $module['id'] : $module_id = '';
            isset($module['src']) ? $module_src = asset($module['src']) : $module_src = '';

            return Response::json([
                'html' => [ 
                    'navigation' => $navigation, 
                    'content' => $content
                ], 
                'module' => [
                    'id' => $module_id,
                    'src' => $module_src
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