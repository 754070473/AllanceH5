<?php

namespace App\Http\Controllers;

use Boris\Config;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * 验证token值
     * Controller constructor
     */
    public function __construct()
    {
        $action = $this->getCurrentAction();
        $function = $action['method'];
        $controller = substr($action['controller'], strpos($action['controller'], 'Controllers') + 12, -10);
        $token_config = require ('Auth/TokenConfig.php');
        if ( in_array( $controller.'.'.$function , $token_config['action'] ) == true || in_array( 'GLOBAL' , $token_config['action'] )){
            $token    = Session::get('token');
            $token_id = Session::get('toke_id');
            if( !empty( $token ) && !empty( $token_id ) ) {
                $url = $this->apiUrl( 'Login' , 'token' );
                $arr = array(
                    'token' => $token,
                    'toke_id' => $token_id
                );
                $api_array = CurlPost( $url , $arr );
                if ( $api_array['status'] == 1 ){
                    if( $token_config['restrict'] == 0 ) {
                        Session::put( 'token' , $api_array['data']['token'] );
                    }elseif( $token_config['restrict'] == 1 ){
                        Session::flush();
                        echo "<script>alert('您的账号已在别的地方登陆！');location.href='login'</script>";
                    }
                }
            }
        }
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

    /**
     * 获取当前控制器与方法
     *
     * @return array
     */
    public function getCurrentAction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);

        return ['controller' => $class, 'method' => $method];
    }
}
