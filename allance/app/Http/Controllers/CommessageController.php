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
        $r_name=$request->input('r_name');
        // if(empty($m_name)){
        //     $name=$request->input('r_name');
        // }else{
        //     $name=$request->input('m_name');
        // }
        $url = $this -> apiUrl('Commessage','index');
        $arr=[
            'r_name'=>$r_name,
            'm_name'=>$m_name
        ];
        print_r($arr);die;
        $api_array = CurlPost( $url , $arr);
        print_r($api_array);die;
       

    }
}