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
		$this -> success( Success::POST_SELECT_SUCCESS , Success::POST_SELECT_SUCCESS_MSG , $arr);
		exit;
	}

	/**
	 * 发送邮件接口
	 */
	public function setEmail()
	{
		//接收参数
		$content = IsNaN( $this -> _data , 'content' );//发送内容
		if( empty( $content ) ){
			$this -> errorMessage( Param::EMAIL_CONTENT_IS_NULL , Param::EMAIL_CONTENT_IS_NULL_MSG );
			exit;
		}
		$set_to = IsNaN( $this -> _data , 'set_to' );//接收人邮箱
		if( empty( $set_to ) ){
			$this -> errorMessage( Param::EMAIL_SETTO_IS_NULL , Param::EMAIL_SETTO_IS_NULL_MSG );
			exit;
		}
		$subject = IsNaN( $this -> _data , 'subject' );//邮件标题
		if( empty( $subject ) ){
			$this -> errorMessage( Param::EMAIL_SUBJECT_IS_NULL , Param::EMAIL_SUBJECT_IS_NULL_MSG );
			exit;
		}
		$info['content'] = $content;
		$info['smtpemailto'] = $set_to;
		$info['subject'] = $subject;
		vendor('Email.Test');//加载发送邮件类
		$email = new \Test( $info );
		if( $email -> set_email() ){
			$this -> success( Success::EMAIL_SET_SUCCESS , Success::EMAIL_SET_SUCCESS_MSG );
		} else {
			$this -> errorMessage( Status::EMAIL_SET_ERROR , Status::EMAIL_SET_ERROR_MSG );
		}
	}
}