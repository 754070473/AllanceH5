<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Ill_Controller;
use Session,DB;

header("content-type:text/html;charset=utf-8");
class IndexController extends Controller{

    public $enableCsrfValidation = false;
    /**
     * 首页s
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
		//主页职位分类
		$url = $this -> apiUrl('Public','jobClassify');
        $classify = CurlPost( $url );
		//主页推广类型
		$url = $this -> apiUrl('Index','generalize');
		$generalize_list = CurlPost( $url );
		//print_r($generalize_list['data']);die;
		$g_type_id = array_keys($generalize_list['data']);
        //主页职位列表
		foreach($g_type_id as $key => $val){
			$url = $this -> apiUrl('Index','index');
			$arr = array( 'g_type_id' => $val );
			$api_array = CurlPost( $url , $arr );
		   //print_r( $api_array );die;
			if ( $api_array['status'] == 0 ){
				$data[$val] = array(
					'data' => $api_array['data'] ,
					'count' => $api_array['count'] ,
					'page' => $api_array['page'] ,
					'page_sum' => $api_array['page_sum'] ,
					'show_click' => $api_array['show_click']
				);
			} else {
				echo $api_array['msg'];
				exit;
			}
		}
		//print_r($data);die;
		return view( 'index.index', array( 'data' => $data , 'generalize_list' => $generalize_list['data'] , 'classify' => $classify['data']) );
    }

    public function page( Request $request )
    {
        $url = $this -> apiUrl('Index','index');
        $page = $request -> p;
		$g_type_id = $request -> g_type_id;
        $arr['page'] = $page;
		$arr['g_type_id'] = $g_type_id;
        $api_array = CurlPost( $url , $arr);
        return view(
            'index.page',
            array(
                'data' => $api_array['data'] ,
                'count' => $api_array['count'] ,
                'page' => $api_array['page'] ,
                'page_sum' => $api_array['page_sum'] ,
                'show_click' => $api_array['show_click'],
				'g_type_id' => $g_type_id
            )
        );
    }
}