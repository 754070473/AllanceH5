<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Ill_Controller;
use Session,DB;

header("content-type:text/html;charset=utf-8");
class IndexController extends Controller{

    public $enableCsrfValidation = false;
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
		//主页职位分类
		$url = $this -> apiUrl('Public','jobClassify');
        $classify = CurlPost( $url );
        //主页职位列表
        $url = $this -> apiUrl('Index','index');
        $api_array = CurlPost( $url );
//        print_r( $api_array );die;
        if ( $api_array['status'] == 0 ){
            return view(
                'index.index',
                array(
                    'data' => $api_array['data'] ,
                    'count' => $api_array['count'] ,
                    'page' => $api_array['page'] ,
                    'page_sum' => $api_array['page_sum'] ,
                    'show_click' => $api_array['show_click'],
					'classify' => $classify['data']
                )
            );
        } else {
            echo $api_array['msg'];
        }
    }

    public function page( Request $request )
    {
        $url = $this -> apiUrl('Index','index');
        $page = $request -> p;
        $arr['page'] = $page;
        $api_array = CurlPost( $url , $arr);
        return view(
            'index.page',
            array(
                'data' => $api_array['data'] ,
                'count' => $api_array['count'] ,
                'page' => $api_array['page'] ,
                'page_sum' => $api_array['page_sum'] ,
                'show_click' => $api_array['show_click']
            )
        );
    }
}