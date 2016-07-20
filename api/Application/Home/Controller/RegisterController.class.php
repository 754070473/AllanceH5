<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class RegisterController extends CommonController {
	/**
	 * 注册接口
	 */
	public function index()
	{
		//手机验证
		$phone = IsNaN( $this -> _data , 'phone' );
		if( empty( $phone ) ){
			$this -> errorMessage( Param::REGISTER_PHONE_IS_NULL , Param::REGISTER_PHONE_IS_NULL_MSG );
		} elseif( preg_match("/^1[34578]{1}\d{9}$/",$phone) == false ) {
			$this -> errorMessage( Param::REGISTER_PHONE_IS_ERROR , Param::REGISTER_PHONE_IS_ERROR_MSG );
		}
		//邮箱验证
		$email = IsNaN( $this -> _data , 'email' );
		if( empty( $email ) ){
			$this -> errorMessage( Param::REGISTER_EMAIL_IS_NULL , Param::REGISTER_EMAIL_IS_NULL_MSG );
		} elseif( preg_match( ' /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/' , $email) == false ) {
			$this -> errorMessage( Param::REGISTER_EMAIL_IS_ERROR , Param::REGISTER_EMAIL_IS_ERROR_MSG );
		}
		//密码验证
		$password = IsNaN( $this -> _data , 'password' );
		if( empty( $password ) ){
			$this -> errorMessage( Param::REGISTER_PASSWORD_IS_NULL , Param::REGISTER_PASSWORD_IS_NULL_MSG );
		} elseif( preg_match( '/^(?=.{6,16}$)(?![0-9]+$)(?!.*(.).*\1)[0-9a-zA-Z_-.$#@^&]+$/' , $password ) == false ) {
			$this -> errorMessage( Param::REGISTER_PASSWORD_IS_ERROR , Param::REGISTER_PASSWORD_IS_ERROR_MSG );
		}

		//判断是企业注册还是个人账号登注册
		$login_type = IsNaN( $this -> _data , 'login_type' );
		if (empty( $login_type ) ) {
			//默认为个人账号注册
			$User = M("personal"); // 实例化User对象
			$phone_name = 'p_phone';
			$email_name = 'p_email';
			$id_name = 'per_id';
		} else {
			//企业注册
			$User = M("company"); // 实例化User对象
			$phone_name = 'c_phone';
			$email_name = 'c_email';
			$id_name = 'com_id';
		}

		//判断手机号、邮箱是否已注册
		if( $User->where("$phone_name = '$phone'")->find() ) {
			$this -> errorMessage( Status::REGISTER_PHONE_EXIST , Status::REGISTER_PHONE_EXIST_MSG );
		} elseif ( $User->where("$email_name = '$email'")->find() ) {
			$this -> errorMessage( Status::REGISTER_EMAIL_EXIST , Status::REGISTER_EMAIL_EXIST_MSG );
		}

		$data = array (
			$phone_name => $phone,
			$email_name => $email,
			'p_pwd' => md5($password)
		);

		//注册
		$id = $User->add($data);
		if ( $id ) {
			$data[$id_name] = $id;
			$this -> success( Success::REGISTER_SUCCESS , Success::REGISTER_SUCCESS_MSG , $data );
		} else {
			$this -> errorMessage( Status::USER_PASSWORD_ERROR , Status::USER_PASSWORD_ERROR_MSG );
		}
	}
}