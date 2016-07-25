<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Ill_Controller;
use Session,DB;

class CommessageController extends Controller{

    public $enableCsrfValidation = false;
    /**
     * 企业信息
     */
    public function ComMessage(Request $request){

        $m_name=$request->input('m_name');
        $url = $this -> apiUrl('Commessage','index');
        $arr=[
            'm_name'=>$m_name
        ];
        $api_array = CurlPost( $url , $arr);
        //print_r($m_name);die;
        if($api_array['status']=='0'){
                return view(
                    'commessage.commessage',
                    array(
                        'arr' => $api_array['data'] ,
                        'count' => $api_array['count'] ,
                        'page' => $api_array['page'] ,
                        'page_sum' => $api_array['page_sum'] ,
                        'show_click' => $api_array['show_click'],
                        'm_name' => $m_name
                    )
                );
        }else{
            echo $api_array['msg'];
        }
    }
    /**
     * 企业信息分页
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function actionCommessagePage(Request $request)
    {
        $url = $this -> apiUrl('Commessage','index');
        $page = $request -> p;
        $arr['page'] = $page;
        $api_array = CurlPost( $url , $arr);
        return view(
            'commessage.page',
            array(
                'arr' => $api_array['data'] ,
                'count' => $api_array['count'] ,
                'page' => $api_array['page'] ,
                'page_sum' => $api_array['page_sum'] ,
                'show_click' => $api_array['show_click']
            )
        );
    }
}