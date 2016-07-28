<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Ill_Controller;
use Session,DB;

class ResumeController extends Controller{

    public $enableCsrfValidation = false;
    /**
     * 简历投递
     */
    public function resumeTop(Request $request){
        $per_id=$request->input('per_id');
        $mes_id=$request->input('mes_id');

        $url = $this -> apiUrl('Resume','top');
        $arr=[
            'per_id'=>$per_id,
            'mes_id'=>$mes_id
        ];
        $api_array = CurlPost( $url , $arr);

        if($api_array['status']=='0'){
        
            if(!empty($toke_id)){
                $toke_id=isset($api_array['per_id'])?$api_array['per_id']:'';
            }
            echo "1";exit;
            
        }else{
            echo $api_array['msg'];
        }
    }
    
}