<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class IndexController extends CommonController {
	/**
	 * 首页职位列表接口
	 */
    public function index(){
	    $page = IsNaN( $this -> _data , 'page' );
		if( empty( $page ) ){
			$page = 1;
		}
		$order = IsNaN( $this -> _data , 'order' );
		if( empty( $order ) ){
			$order = 'r_addtime desc';
		}
		$data_size = IsNaN( $this -> _data , 'data_size' );
		if( empty( $data_size ) ){
			$data_size = 5;
		}
		$table = 'recruit';
		$join = 'al_com_message on al_recruit.mes_id = al_com_message.mes_id ';
		$where = 'r_status = 1';
		$arr = $this -> paging( $page , $data_size , $table , $where , $order , $join );
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

	public function jobClassify()
	{
		$arr = $this -> classify( 'post' , 'p_pid' );
		$this -> success( Success::POST_SELECT_SUCCESS , Success::POST_SELECT_SUCCESS_MSG , $arr );
		exit;
	}
}