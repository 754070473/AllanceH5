<?php
/**
 * Created by PhpStorm.
 * User: chenhao
 * Date: 2016/7/14
 * Time: 19:29
 */

namespace Home\CheckParam;


class CheckIndex
{
	public function index($data){
		$check_param_template = array (
			/**
			 * type 类型
			 * is_must 是否必须【1、必须】
			 * enum 表示参数必须在数组的值之中
			 */
			'user_name' => array (
				'type' => 's',
				'is_must' => 1
			),
			'user_password' => array (
				'type' => 's' ,
				'is_must' => 1 ,
				'enum_array' => array (
				)
			),
			'status' => array (
				'type' => '1' ,
				'is_must' => 0 ,
				'enum_array' => array (
					1,2
				)
			)
		);
		return $this -> checkParam ( $data , $check_param_template );
	}
}