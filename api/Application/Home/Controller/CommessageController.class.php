<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class CommessageController extends CommonController {
	/**
	 * 企业信息
	 */
    public function index(){
	    $m_name = IsNaN( $this ->_data , 'm_name' );
	    if($m_name==""){
	    	$this -> errorMessage(
				Status::POST_COUNT_SELECT_ERROR ,
				Status::POST_COUNT_SELECT_ERROR_MSG
			);
			exit;
	    }else{
	    	$com_message = M("com_message"); // 实例化User对象
	    	$list = $com_message->where("m_name like '%$m_name%'")->select();
	    	if($list){
	    		$this -> success(
					Success::POST_SELECT_SUCCESS ,
					Success::POST_SELECT_SUCCESS_MSG ,
					$list
				);
				exit;
	    	}else{
	    		$this -> errorMessage(
				Status::POST_COUNT_SELECT_ERROR ,
				Status::POST_COUNT_SELECT_ERROR_MSG
				);
				exit;
	    	}

	    }
		
    }
}