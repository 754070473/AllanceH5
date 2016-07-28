<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class ResumeController extends CommonController {
	/**
	 * 企业信息
	 */
    public function top(){
	    
		$per_id = IsNaN( $this ->_data , 'per_id' );//个人id
	    $mes_id = IsNaN( $this ->_data , 'mes_id' );//企业id
	    if($per_id==""){
	    	$this -> errorMessage(
				Status::POST_COUNT_SELECT_ERROR ,
				Status::RESUME_LOGIN
			);
			exit;
	    }else{
	    	//获取提交的简历id
			$resume=M('resume')->where("per_id='$per_id'")->find();
			if(empty($resume)){
				$this -> errorMessage(
				Status::POST_COUNT_SELECT_ERROR ,
				Status::RESUME_XINXI_TOP
				);
				exit;
			}
			$data['res_id']=$resume['res_id'];//简历id
			//获取简历企业id
			$company=M('company')->where("mes_id='$mes_id'")->find();
			if(empty($company)){
				$this -> errorMessage(
				Status::POST_COUNT_SELECT_ERROR ,
				Status::RESUME_QIYE_TOP
				);
				exit;
			}
			$data['com_id']=$company['com_id'];//公司id
			$data['d_time']=date("Y-m-d H:i:s");
			$deliver = M("deliver"); // 实例化User对象
			$com_id=$data['com_id'];
			$res_id=$data['res_id'];
			$arr = $deliver->where("com_id=$com_id and res_id=$res_id")->find();
			if(!$arr){
				$insert=$deliver->data($data)->add();
				if($insert){
					$this -> success(
						Success::POST_SELECT_SUCCESS ,
						Success::POST_SELECT_SUCCESS_MSG ,
						$insert
					);
					exit;
				}else{
					echo "0";
				}
			}else{
				$this -> errorMessage(
				Status::POST_COUNT_SELECT_ERROR ,
				Status::RESUME_JIANLI_TOP
				);
				exit;
			}

			
			
	    }



    }






}