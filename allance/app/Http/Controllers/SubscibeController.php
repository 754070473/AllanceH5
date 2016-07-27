<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Ill_Controller;
use Session,DB;

header("content-type:text/html;charset=utf-8");
class SubscibeController extends Controller{

    public $enableCsrfValidation = false;
    
	public function index()
	{
		$user = session:get('user');
		if( empty( $user['per_id'] ) ){
			return redirect('login');
			exit;
		}
		
		$per_id = $user['per_id'];
		$url = $this->apiUrl('Subscibe','subSelect');
		$arr = array( 'user_id' => $per_id );
		$api_array = CurlPost( $url , $arr );
		if( $api_array['status'] == 0 ){
			return view('subscibe.subIndex');
		}else{
			return view('subscibe.subInsert');
		}
	}
}