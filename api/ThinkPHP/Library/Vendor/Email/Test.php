<?php
header("content-type:text/html;charset=utf-8");
class Test {
    //收件人邮箱
    public $smtpemailto;
    //邮箱内容
    public $content;
    //邮箱标题
    public $subject;

    function __construct($info)
    {
        $this->smtpemailto = $info['smtpemailto'];
        $this->content = $info['content'];
        $this->subject = $info['subject'];
        error_reporting(0);
    }

    //发送邮箱
    function set_email(){

//引入发送邮件类
        require("smtp.php");
//使用163邮箱服务器
        $smtpserver = "ssl://smtp.qq.com";
//163邮箱服务器端口
        $smtpserverport = 465;
//你的163服务器邮箱账号
        $smtpusermail = "754070473@qq.com";
//收件人邮箱
        $smtpemailto = $this->smtpemailto;
//你的邮箱账号(去掉@163.com)
        $smtpuser = "754070473@qq.com";//SMTP服务器的用户帐号
//你的邮箱密码
        $smtppass = "knyjgtqyelvzbbgg"; //SMTP服务器的用户密码
//邮件主题
        $mailsubject = "$this->subject";
//邮件内容
        $mailbody = "$this->content";
//邮件格式（HTML/TXT）,TXT为文本邮件
        $mailtype = "html";
//这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
//是否显示发送的调试信息
        $smtp->debug = TRUE;
//发送邮件
        $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
    }
}