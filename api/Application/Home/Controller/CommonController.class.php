<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 公共控制器
 * Class CommonController
 *
 * @package Home\Controller
 * @author chenHao
 * @date 2016/7/13
 */
class CommonController extends Controller {
	public $_data = '';

	/**
	 * 构造函数
	 * CommonController constructor.
	 */
	public function __construct()
	{
		//参数过滤【 必须要的，防止XSS攻击以及SQL注入等 】
		$all_data = array_merge ($_POST, $_GET, $_REQUEST);
		unset($_POST);
		unset($_GET);
		unset($_REQUEST);

		$this->_data = html_encode ($all_data);


        //接口的参数校验
        //获取当前请求的控制器
        /*$Controller = ucwords( str_replace( __MODULE__ . '/' , '' , __CONTROLLER__ ) );

        //当前请求的方法
        $Action = ucwords( str_replace( __CONTROLLER__ . '/' , '' , __ACTION__ ) );

        if( !in_array( $Controller , array( 'Base' , 'Common' ) ) ){

            //拼装格式化类
            $Format_Controller = 'Check'.$Controller;

            //反射格式化类
            $ReflectionClass = new \ReflectionClass('Home\CheckParam\\'.$Format_Controller);

            //获取格式化类的方法
            $ReflectionMethod = $ReflectionClass->getMethod($Action);

            //实例化格式化类
            $Instance = $ReflectionClass->newInstance();

            //格式化数据类型
			 $arr['data'] = $ReflectionMethod->invokeArgs( $Instance , array( $all_data ) );
        }*/
		//合并返回结果
//		$arr = array_merge( $arr , (array) $othor_data );
	}

	/**
	 * 输入json数据
	 */
	public function JsonOutPut( $arr = array() , $other_data = array() )
	{

		if (!is_array ($arr)) {
			$arr = ( array )$arr;
		}

		//合并返回结果
		$arr = array_merge ($arr, (array)$other_data);
//
		//返回的JSON数据
		$json_str = json_encode ($arr);

		echo $json_str;

		exit;
	}

	/**
	 * 错误信息返回
	 * @param int    $error_status 状态码
	 * @param string $error_msg    错误消息
	 * @param array  $error_data   返回数组
	 * @param array  $other_data   其他数组
	 */
	public function errorMessage( $error_status = 1 , $error_msg = 'Error' , $error_data = array() , $other_data = array() )
	{

		//拼装数据
		$error_arr = [];

		//失败的状态码
		$error_arr['status'] = $error_status;

		//失败的提示信息
		$error_arr['msg'] = $error_msg;

		//失败返回的错误数据
		$error_arr['data'] = $error_data;

		$this->JsonOutPut ($error_arr, $other_data);
	}

	/**
	 * 成功信息返回
	 * @param int    $success_status 状态码
	 * @param string $success_msg    成功消息
	 * @param array  $data           返回数组
	 * @param array  $other_data     其他数组
	 */
	public function success( $success_status = 0  , $success_msg = 'success' , $data = array() ,  $other_data = array() ){

		//拼装数据
		$error_arr = array();

		//失败的状态码
		$error_arr['status'] = $success_status;

		//失败的提示信息
		$error_arr['msg'] = $success_msg;

		//失败返回的错误数据
		$error_arr['data'] = $data;

		$this -> JsonOutPut( $error_arr , $other_data  );

	}
	
	/**
	 * 分页
	 * @param     $data_size
	 * @param     $table
	 * @param int $page
	 * @param int $where
	 * @param int $order
	 *
	 * @return array
	 */
	public function paging( $page , $data_size , $table , $where = 1 , $order = 1 , $join = ""){
		$User = M("$table");
		//查询数据总条数
		if( $join == "" ){
			$count = count( $User -> where( $where ) -> select() );
		} else {
			$count = count( $User -> join( $join )-> where( $where )->select() );
		}
		//总页码
		$page_sum = ceil( $count/$data_size );
		//偏移量
		$n = ( $page - 1 ) * $data_size;
		//查询数据
		if( $join == "" ) {
			$data = $User -> where( $where ) -> order( $order )-> limit( $n , $data_size )->select();
		} else {
			$data = $User -> join( $join ) -> where( $where ) -> order( $order ) -> limit( $n , $data_size )->select();
		}
		//判断是否要‘加载更多’按钮  1为显示，0为不显示
		$show_click = $page >= $page_sum ? 0 : 1 ;

		$other_data = array( 'count' => $count , 'page_sum' => $page_sum , 'show_click' => $show_click , 'page' => $page );
		return array( 'data' => $data , 'other_data' => $other_data );
	}
	
	/**
	 * 判断是否要‘加载更多’按钮
	 * @param        $data
	 * @param        $page
	 * @param        $page_size
	 * @param        $request_url
	 * @param string $all_page_key
	 */
	public function showClickMore( $data , $page , $page_size , $request_url , $all_page_key = 'totalpages' ){
		$api_data = $data;
		//获取总页数
		$all_page_keys = explode( '.' , $all_page_key );

		foreach( $all_page_keys as $k => $v ){
			if ( isset( $data[$v] ) ){
				$data = $data[$v];
			}
		}

		$page_data = intval( $data );

		//如果数据大于等于每页条数， 显示‘加载更多’
		if ( $page || $page_size ){
			$show_click = $page < $page_data ? 1 : 0 ;
		}

		if ( $page > $page_data ){
			$this -> assign( 'data' , array() );
		}

		if ( count( $api_data['data']['list'] ) < $page_size ){
			$show_click = 0;
		}

		$this -> assign( 'page' , $page );
		$this -> assign( 'page_size' , $page_size );
		$this -> assign( 'show_click' , $show_click );
		$this -> assign( 'request' , $request_url );
	}

    /**
     * 生成token值并入库
     * @param $user_id  用户id
     * @param int $type 用户类型 （默认是个人用户，1是企业用户）
     * @return string   返回生成的token值
     */
	public function createToken( $user_id , $type = 0 )
	{
        //生成token
		$token = md5(mt_rand_str(20).time());
        //实例化User对象
        $User = M('token');
        $time = time();
        $data['token'] = $token;
        //判断登录方式
        if( $type == 0 ){
            $data['per_id'] = $user_id;
            $arr = $User -> where('per_id ='.$user_id) ->find();
        } else {
            $data['com_id'] = $user_id;
            $arr = $User -> where('com_id ='.$user_id) ->find();
        }
        //判断是添加还是修改
        if( empty( $arr ) ){
            $data['c_time'] = $time;
            $re = $User -> create( $data ) -> add();
			$id = $re;
        }else{
			$id = $arr['toke_id'];
            $data['u_time'] = $time;
            $re = $User -> where( 'toke_id = '.$id ) -> save( $data );
        }
        if ($re){
            return array( 'token' => $token , 'toke_id' => $id );
        }else{
            $this -> errorMessage( 1 , 'token值入库失败' );
            exit;
        }
	}

    public function verifyToken( $token , $toke_id )
    {
        $User = M('token');
		$arr = $User ->where('toke_id='.$toke_id) -> find();
		if($arr['token'] == $token){
			$this -> success( 0 , 'token值正确');
		}else{
			$this -> errorMessage( 1 , 'token值错误' , array('token'=>$arr['token']));
		}
    }
}