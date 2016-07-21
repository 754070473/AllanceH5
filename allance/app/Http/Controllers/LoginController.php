<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller1;
use Session,DB;

header("content-type:text/html;charset=utf-8");
class LoginController extends Controller{

    public $enableCsrfValidation = false;
    /**
     * 登录显示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('login.login');
    }

    /**
     * 查询登录信息
     */
    public function doLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $url = $this->apiUrl('Login','index');
        $arr = array(
            'user_name' => $username,
            'user_password' => $password
        );
        $api_array = CurlPost( $url , $arr );
        if($api_array['status'] == 0) {
            $token_id = $api_array['toke_id'];
            $token    = $api_array['token'];
            Session::put('toke_id' , $token_id);
            Session::put('token' , $token);
            Session::put('user' , $api_array['data']);
            echo '<script>window.location.href="index"</script>';
        } else {
            echo $api_array['msg'];
        }
    }

    /**
     * 注册界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('login.register');
    }

    /**
     * 注册入库
     * @param Request $request
     */
    public function doRegister(Request $request)
    {
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;

        $url = $this->apiUrl('Register','index');
        $arr = array(
            'phone' => $phone,
            'email' => $email,
            'password' => $password
        );
        $api_array = CurlPost( $url , $arr );
        if($api_array['status'] == 0) {
            print_r($api_array);die;
        } else {
            echo $api_array['msg'];
        }
    }
}