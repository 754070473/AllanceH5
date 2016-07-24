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
        if($api_array['status']=='0'){
            echo '1';
        }else{
            echo $api_array['msg'];
        }
       

    }
}