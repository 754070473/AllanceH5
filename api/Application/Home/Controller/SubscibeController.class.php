<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class SubscibeController extends CommonController {

    /**
     * 订阅查询接口
     */
    public function subSelect()
    {
        $user_id   = IsNaN( $this -> _data , 'user_id' );
        if( empty( $user_id ) ) {
            $this -> errorMessage( Param::SUBSCIBE_USERID_IS_NULL , Param::SUBSCIBE_USERID_IS_NULL_MSG );
            exit;
        }
        $User = M('subscrip');
        $arr = $User -> where('per_id ='.$user_id) -> find();
        if( $arr ){
            $this -> success( Success::SUBSCIBE_SELECT_SUCCESS , Success::SUBSCIBE_SELECT_SUCCESS_MSG , $arr );
        }else{
            $this -> errorMessage( Status::SUBECIBE_COUNT_SELECT_ERROR , Status::SUBECIBE_COUNT_SELECT_ERROR_MSG );
        }
    }

    /**
     * 订阅添加接口
     */
	public function subInsert()
	{
		$user_id   = IsNaN( $this -> _data , 'user_id' );
		if( empty( $user_id ) ) {
			$this -> errorMessage( Param::SUBSCIBE_USERID_IS_NULL , Param::SUBSCIBE_USERID_IS_NULL_MSG );
			exit;
		}
		$email     = IsNaN( $this -> _data , 'email');
		if( empty( $email ) ) {
			$this -> errorMessage( Param::SUBSCIBE_EMAIL_IS_NULL , Param::SUBSCIBE_EMAIL_IS_NULL_MSG );
			exit;
		}
		$day       = IsNaN( $this -> _data , 'day');
		if( empty( $day ) ) {
			$this -> errorMessage( Param::SUBSCIBE_DAY_IS_NULL , Param::SUBSCIBE_DAY_IS_NULL_MSG );
			exit;
		}
		$job       = IsNaN( $this -> _data , 'job');
		if( empty( $job ) ) {
			$this -> errorMessage( Param::SUBSCIBE_JOB_IS_NULL , Param::SUBSCIBE_JOB_IS_NULL_MSG );
			exit;
		}
		$city      = IsNaN( $this -> _data , 'city');
		if( empty( $city ) ) {
			$this -> errorMessage( Param::SUBSCIBE_DAY_IS_NULL , Param::SUBSCIBE_DAY_IS_NULL_MSG );
			exit;
		}
		$stage     = IsNaN( $this -> _data , 'stage');
		if( empty( $stage ) ) {
			$stage = '';
		}
		$industry  = IsNaN( $this -> _data , 'industry');
        if( empty( $industry ) ) {
            $industry = '';
        }
		$salary    = IsNaN( $this -> _data , 'salary');
        if( empty( $salary ) ) {
            $salary = '';
        }
		$time      = date('Y-m-d',time());
		$next_time = date("Y-m-d",strtotime("+$day days"));

        $data = array(
            'per_id'     => $user_id ,
            's_email'    => $email ,
            's_day'      => $day ,
            's_job'      => $job ,
            's_city'     => $city ,
            's_stage'    => $stage ,
            's_industry' => $industry ,
            's_salary'   => $salary ,
            's_time'     => $time ,
            'next_time'  => $next_time
        );
        $User = M("subscrip"); // 实例化User对象
        $re = $User->data($data)->add();
        if( $re ){
            $this -> success( Success::SUBSCIBE_INSERT_SUCCESS , Success::SUBSCIBE_INSERT_SUCCESS_MSG );
            exit;
        }else{
            $this -> errorMessage( Status::SUBSCIBE_INSERT_ERROR , Success::SUBSCIBE_INSERT_SUCCESS_MSG );
            exit;
        }
	}

    /**
     * 修改订阅信息接口
     */
	public function subUpdate()
	{
		$user_id   = IsNaN( $this -> _data , 'user_id' );
		if( empty( $user_id ) ) {
			$this -> errorMessage( Param::SUBSCIBE_USERID_IS_NULL , Param::SUBSCIBE_USERID_IS_NULL_MSG );
			exit;
		}
		$email     = IsNaN( $this -> _data , 'email');
		if( empty( $email ) ) {
			$this -> errorMessage( Param::SUBSCIBE_EMAIL_IS_NULL , Param::SUBSCIBE_EMAIL_IS_NULL_MSG );
			exit;
		}
		$day       = IsNaN( $this -> _data , 'day');
		if( empty( $day ) ) {
			$this -> errorMessage( Param::SUBSCIBE_DAY_IS_NULL , Param::SUBSCIBE_DAY_IS_NULL_MSG );
			exit;
		}
		$job       = IsNaN( $this -> _data , 'job');
		if( empty( $job ) ) {
			$this -> errorMessage( Param::SUBSCIBE_JOB_IS_NULL , Param::SUBSCIBE_JOB_IS_NULL_MSG );
			exit;
		}
		$city      = IsNaN( $this -> _data , 'city');
		if( empty( $city ) ) {
			$this -> errorMessage( Param::SUBSCIBE_DAY_IS_NULL , Param::SUBSCIBE_DAY_IS_NULL_MSG );
			exit;
		}
		$stage     = IsNaN( $this -> _data , 'stage');
		if( empty( $stage ) ) {
			$stage = '';
		}
		$industry  = IsNaN( $this -> _data , 'industry');
		if( empty( $industry ) ) {
			$industry = '';
		}
		$salary    = IsNaN( $this -> _data , 'salary');
		if( empty( $salary ) ) {
			$salary = '';
		}
		$time      = date('Y-m-d',time());
		$next_time = date("Y-m-d",strtotime("+$day days"));

		$data = array(
			'per_id' => $user_id ,
			's_email' => $email ,
			's_day' => $day ,
			's_job' => $job ,
			's_city' => $city ,
			's_stage' => $stage ,
			's_industry' => $industry ,
			's_salary' => $salary ,
			's_time' => $time ,
			'next_time' => $next_time
		);
		$User = M("subscrip"); // 实例化User对象
		$re = $User->where('per_id = '.$user_id)->save($data);
		if( $re ){
			$this -> success( Success::SUBSCIBE_INSERT_SUCCESS , Success::SUBSCIBE_INSERT_SUCCESS_MSG );
			exit;
		}else{
			$this -> errorMessage( Status::SUBSCIBE_INSERT_ERROR , Success::SUBSCIBE_INSERT_SUCCESS_MSG );
			exit;
		}
	}
}