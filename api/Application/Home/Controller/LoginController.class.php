<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class LoginController extends CommonController {
	/**
	 * 登录接口
	 */
    public function index(){
	    //用户名
	    $user_name = IsNaN( $this -> _data , 'user_name' );
	    if( empty( $user_name ) ){
		    $this -> errorMessage( Param::LOGIN_USER_NAME_IS_NULL , Param::LOGIN_USER_NAME_IS_NULL_MSG );
	    }

	    //密码
	    $user_password = IsNaN( $this -> _data , 'user_password' );
	    if( empty( $user_name ) ){
		    $this -> errorMessage( Param::LOGIN_USER_NAME_IS_NULL , Param::LOGIN_USER_NAME_IS_NULL_MSG );
	    }

        //判断是企业登录还是个人账号登录
	    $login_type = IsNaN( $this -> _data , 'login_type' );
        if (empty( $login_type ) ) {
	        //默认为个人账号登录
            $login = M("personal"); // 实例化User对象
			$user_id = 'per_id';
			$type = 0;
		} else {
	        //企业登录
	        $login = M("company"); // 实例化User对象
			$user_id = 'com_id';
			$type = 1;
        }

	    //判断是邮箱登录还是手机号码登录
	    if(preg_match("/^1[34578]{1}\d{9}$/",$user_name)) {
		    //手机登录 查询用户登录信息
		    $arr_login = $login->where('p_phone='."'$user_name'")->find();
	    } else {
		    //邮箱登录 查询用户登录信息
		    $arr_login = $login->where('p_email='."'$user_name'")->find();
	    }

	    if ( empty( $arr_login ) ) {
		    //用户不存在
		    $this -> errorMessage( Status::USER_NOT_FOUND , Status::USER_NOT_FOUND_MSG );
	    } else {
		    //判断密码是否正确
		    if ( md5( $user_password ) == $arr_login['p_pwd'] ) {
			    //密码正确 登录成功
				$other_data = $this -> createToken( $arr_login[$user_id] , $type );
				$arr_login['type'] = $type;
			    $this -> success( Success::LOGIN_SUCCESS , Success::LOGIN_SUCCESS_MSG , $arr_login ,$other_data );
		    } else {
			    //密码错误
			    $this -> errorMessage( Status::USER_PASSWORD_ERROR , Status::USER_PASSWORD_ERROR_MSG );
		    }
	    }
    }

	public function token(){
		$token = IsNaN( $this -> _data , 'token' );
		$token_id = IsNaN( $this -> _data , 'toke_id' );
		$this -> verifyToken( $token , $token_id );
	}
}