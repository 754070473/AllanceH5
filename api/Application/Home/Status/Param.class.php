<?php
/**
 * Created by PhpStorm.
 * User: chenhao
 * Date: 2016/7/13
 * Time: 21:41
 */
namespace Home\Status;

/**
 * 缺少参数提示
 * Class Param
 *
 * @package Home\Status
 */
class Param {
	
	//缺少参数
	const PARAM_MISS = 1;
	const PARAM_MISS_MSG = '缺少参数:%s!';
	
	//参数错误
	const PARAM_ERROR = 1;
	const PARAM_ERROR_MSG = '参数错误:%s!';
	
	/**
	 * 登陆
	 */

	//用户名不能为空
	const LOGIN_USER_NAME_IS_NULL = 1;
	const LOGIN_USER_NAME_IS_NULL_MSG = '用户名不能为空';

	//密码不能为空
	const LOGIN_PASSWORD_IS_NULL = 1;
	const LOGIN_PASSWORD_IS_NULL_MSG = '密码不能为空';
	
	/**
	 * 注册
	 */
	
	//手机号码不能为空
	const REGISTER_PHONE_IS_NULL = 1;
	const REGISTER_PHONE_IS_NULL_MSG = '手机号码不能为空';

	//手机号格式有误
	const REGISTER_PHONE_IS_ERROR = 1;
	const REGISTER_PHONE_IS_ERROR_MSG = '请输入正确的手机号';
	
	//邮箱不能为空
	const REGISTER_EMAIL_IS_NULL = 1;
	const REGISTER_EMAIL_IS_NULL_MSG = '邮箱不能为空';
	
	//邮箱格式有误
	const REGISTER_EMAIL_IS_ERROR = 1;
	const REGISTER_EMAIL_IS_ERROR_MSG = '请输入有效的邮箱地址';
	
	//密码不能为空
	const REGISTER_PASSWORD_IS_NULL = 1;
	const REGISTER_PASSWORD_IS_NULL_MSG = '密码不能为空';

	//密码格式有误
	const REGISTER_PASSWORD_IS_ERROR = 1;
	const REGISTER_PASSWORD_IS_ERROR_MSG = '密码为6-16位数字字母及常用特殊字符，不能为同一个字符，不能全是数字';
	
	//邮件内容为空
	const Email_CONTENT_IS_NULL = 1;
	const Email_CONTENT_IS_NULL_MSG = '邮件内容不能为空';
	
	//收件人邮箱为空
	const Email_SETTO_IS_NULL = 1;
	const Email_SETTO_IS_NULL_MSG = '收件人邮箱不能为空';
}