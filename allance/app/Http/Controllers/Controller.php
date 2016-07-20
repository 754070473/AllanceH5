<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        
    }
    /**
     * 拼接接口地址
     * @param        $controller
     * @param        $function
     * @param string $module
     *
     * @return string
     */
    public function apiUrl( $controller , $function , $module = 'home' ){
        return 'http://www.rbc.api.com/'.$module.'/'.$controller.'/'.$function;
    }


}
