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
        $toke_id= Session::get( 'toke_id');

        $url = $this -> apiUrl('Commessage','index');
        $arr=[
            'm_name'=>$m_name,
            'toke_id'=>$toke_id
        ];
        $api_array = CurlPost( $url , $arr);
        if($api_array['status']=='0'){
            //$per_id=isset($toke_id)?isset($toke_id):'';
        //print_r($api_array);die;
        if(!empty($toke_id)){
            $toke_id=isset($api_array['per_id'])?$api_array['per_id']:'';
        }
            return view(
                'commessage.commessage',
                array(
                    'arr' => $api_array['data'] ,
                    'count' => $api_array['count'] ,
                    'page' => $api_array['page'] ,
                    'page_sum' => $api_array['page_sum'] ,
                    'show_click' => $api_array['show_click'],
                    'm_name' => $m_name,
                    'per_id'=>$toke_id
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
    public function CommessagePage(Request $request){
        $m_name=$request->input('m_name');
        $page = $request -> p;

        $url = $this -> apiUrl('Commessage','index');
         $arr=[
            'm_name'=>$m_name,
            'page'=>$page
        ];
        $api_array = CurlPost( $url , $arr);
        //print_r($api_array);die;
        if($api_array['status']=='0'){
            return view(
                'commessage.page',
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
}