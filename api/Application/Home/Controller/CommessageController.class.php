<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class CommessageController extends CommonController {
	/**
	 * 首页职位列表接口
	 */
    public function index(){
	    $name = IsNaN( $this -> _data , 'name' );
	    return $name;

		
		
    }
}