<?php
namespace Home\Controller;
use Think\Controller;
use Home\Status\Param;
use Home\Status\Status;
use Home\Status\Success;

class ResumesController extends CommonController {
    /**
     *  简历列表接口
     */		

    public function lists()
    {
        //接受页码
        $page = IsNaN($this->_data, 'page') ? IsNaN($this->_data, 'page') : 1;
        
        //接受每页数量
        $page_num = IsNaN($this->_data, 'page_num') ? IsNaN($this->_data, 'page_num') : 1;
        
        //查询总数量
        $resume=M('resume');
        $sql="select * from  al_resume";
        $resumes = $resume->query($sql);
        
        //总数
        $nums = count($resumes);

        //总页数
        $pages = ceil($nums/$page_num);


        //计算偏移量
        $offset = ($page-1)*$page_num;

        //查询每页数据
        $resume=M('resume');
        $resumes_info=$resume->limit($offset,$page_num)->select();

        $arr['pages']=$pages;
        
        if($resumes_info)
        {
            $this->success($resumes_info,Success::RESUMES_SELECT_SUCCESS,Success::RESUMES_SELECT_SUCCESS_MSG,$arr);
            die;
        }
        else
        {
        	$this->errorMessage(Status::RESUMES_SELECT_ERROR,Status::RESUMES_SELECT_ERROR_MSG);
            die;
        }
    } 
     
}