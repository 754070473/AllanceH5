<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Ill_Controller;
use Session,DB;

header("content-type:text/html;charset=utf-8");
class PublicController extends Controller{

    public $enableCsrfValidation = false;
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function top()
    {
        $user = Session::get('user');
        if ( empty( $user['type'] ) ){
            $key = 2;
        }else{
            $key = $user['type'];
        }
        return view( 'public.top' , array( 'key' => $key ) );
    }
    public function footer()
    {
        return view('public.footer');
    }
}