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
    public function login(Request $request)
    {
		$type = $request -> login_type ? $request -> login_type : 0 ;
        return view( 'login.login' , array( 'login_type' => $type ) );
    }

    /**
     * 查询登录信息
     */
    public function doLogin(Request $request)
    {
		$login_type = $request->login_type;
        $username = $request->username;
        $password = $request->password;

        $url = $this->apiUrl('Login','index');
        $arr = array(
            'user_name'      => $username,
            'user_password' => $password,
			'login_type'    => $login_type
        );
        $api_array = CurlPost( $url , $arr );
		print_r($api_array);die;
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
    public function register(Request $request)
    {
		$type = $request -> register_type ? $request -> register_type : 0 ;
        return view('login.register' , array( 'register_type' => $type ) );
    }

    /**
     * 注册入库
     * @param Request $request
     */
    public function doRegister(Request $request)
    {
        $phone    = $request->phone;
        $email    = $request->email;
        $password = $request->password;
		$register_type = $request->register_type;

        $url = $this->apiUrl('Register','index');
        $arr = array(
            'phone'    => $phone,
            'email'    => $email,
            'password' => $password,
			'register_type' => $register_type
        );
        $api_array = CurlPost( $url , $arr );
        if($api_array['status'] == 0) {
            print_r($api_array);die;
        } else {
            echo $api_array['msg'];
        }
    }
}