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
	    $toke_id = IsNaN( $this ->_data , 'toke_id' );
	    if($m_name==""){
	    	$this -> errorMessage(
				Status::POST_COUNT_SELECT_ERROR ,
				Status::POST_COUNT_SELECT_ERROR_MSG
			);
			exit;
	    }else{
		    $page = IsNaN( $this -> _data , 'page' );
			if( empty( $page ) ){
				$page = 1;
			}
			$data_size = IsNaN( $this -> _data , 'data_size' );
			if( empty( $data_size )){
				$data_size = 5;
			}
			$token=M('token')->where("toke_id='$toke_id'")->find();

			$table = 'com_message';
			$join = 'LEFT JOIN al_hang ON al_com_message.me_id = al_hang.me_id';
			$where = "m_name like '%$m_name%'";
			$arr = $this -> paging( $page , $data_size , $table , $where , $order , $join );
			if(!empty($token)){
				$arr['other_data']=array_merge($arr['other_data'],$token['per_id']);//把token值遍历
			}
			//print_r($arr['other_data']);die;
			if( $arr['other_data']['count'] == 0 ){
				$this -> errorMessage(
					Status::POST_COUNT_SELECT_ERROR ,
					Status::POST_COUNT_SELECT_ERROR_MSG
				);
				exit;
			} elseif ( empty( $arr['data'] ) ){
				$this -> errorMessage(
					Status::POST_PAGE_SELECT_ERROR ,
					Status::POST_COUNT_SELECT_ERROR_MSG
				);
				exit;
			}
			
			$this -> success(
				Success::POST_SELECT_SUCCESS ,
				Success::POST_SELECT_SUCCESS_MSG ,
				$arr['data'] ,
				$arr['other_data']
			);
			exit;
	    }
		
    }
}