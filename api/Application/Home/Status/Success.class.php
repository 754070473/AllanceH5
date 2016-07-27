<?php
namespace Home\Status;
/**
 * 成功时候的提示
 */
class Success {

    //登录成功
    const LOGIN_SUCCESS = 0;
    const LOGIN_SUCCESS_MSG = '登录成功!';

    //注册成功
    const REGISTER_SUCCESS = 0;
    const REGISTER_SUCCESS_MSG = '注册成功!';

    //职位查询成功
    const POST_SELECT_SUCCESS = 0;
    const POST_SELECT_SUCCESS_MSG = '查询成功!';

    //邮件发送成功
    const EMAIL_SET_SUCCESS = 0;
    const EMAIL_SET_SUCCESS_MSG = '邮件发送成功!';

    //验证码生成成功
    const VERIFY_CREATE_SUCCESS = 0;
    const VERIFY_CREATE_SUCCESS_MSG = '验证码生成成功!';
    
    //订阅成功
    const SUBSCIBE_INSERT_SUCCESS = 0;
    const SUBSCIBE_INSERT_SUCCESS_MSG = '订阅成功';
    
    //订阅成功
    const SUBSCIBE_SELECT_SUCCESS = 0;
    const SUBSCIBE_SELECT_SUCCESS_MSG = '订阅查询成功';

	//简历列表查询成功
    const RESUMES_SELECT_SUCCESS = 0;
    const RESUMES_SELECT_SUCCESS_MSG = '查询成功!';

}