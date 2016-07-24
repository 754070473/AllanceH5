<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class PublicController extends CommonController {
	/**
	 * 职位无限级分类接口
	 */
	public function jobClassify()
	{
		$arr = $this -> classify( 'post' , 'p_pid' );
		$this -> success( Success::POST_SELECT_SUCCESS , Success::POST_SELECT_SUCCESS_MSG , $arr );
		exit;
	}

	/**
	 * 地区无限级分类接口
	 */
	public function areaClassify()
	{
		$arr = $this -> classify( 'place' , 'p_pid' );
//		print_r($arr);die;
		$this -> success( Success::POST_SELECT_SUCCESS , Success::POST_SELECT_SUCCESS_MSG , $arr);
		exit;
	}

	/**
	 * 发送邮件接口
	 */
	public function setEmail()
	{
		//接收参数
		$content = IsNaN( $this -> _data , 'content' );
		if( empty( $content ) ){
			$this -> errorMessage( Param::Email_CONTENT_IS_NULL , Param::Email_CONTENT_IS_NULL_MSG );
			exit;
		}
		$set_to = IsNaN( $this -> _data , 'set_to' );
		if( empty( $set_to ) ){
			$this -> errorMessage( Param::Email_SETTO_IS_NULL , Param::Email_SETTO_IS_NULL_MSG );
			exit;
		}
		$info['content'] = $content;
		$info['smtpemailto'] = $set_to;
		vendor('Email.Test');//加载发送邮件类
		new \Test;
	}
}