<?php
namespace Home\Status;
/**
 * 错误时候的提示
 */
class Status {
    
    /**
     * 登录
     */
    //用户被锁定
    const USER_IS_LOCKER = 1;
    const USER_IS_LOCKER_MSG = '账号被锁定，请稍后再试!';


    //用户没有找到
    const USER_NOT_FOUND = 1;
    const USER_NOT_FOUND_MSG = '账号没有找到!';

    //账号密码不匹配
    const USER_PASSWORD_ERROR = 1;
    const USER_PASSWORD_ERROR_MSG = '账号密码不匹配!';

    /**
     * 注册
     */
    //手机号已注册
    const REGISTER_PHONE_EXIST = 1;
    const REGISTER_PHONE_EXIST_MSG = '手机号已注册';
    //邮箱已注册
    const REGISTER_EMAIL_EXIST = 1;
    const REGISTER_EMAIL_EXIST_MSG = '邮箱已注册';
    
    /**
     * 职位查询
     */
    //无数据
    const POST_COUNT_SELECT_ERROR = 1;
    const POST_COUNT_SELECT_ERROR_MSG = '暂无数据';
    //本页无数据
    const POST_PAGE_SELECT_ERROR = 1;
    const POST_PAGE_SELECT_ERROR_MSG = '本页暂无数据';

    /**
     * 发送邮件
     */
    //邮件发送失败
    const EMAIL_SET_ERROR = 1;
    const EMAIL_SET_ERROR_MSG = '邮件发送失败';

    /**
     * 职位订阅
     */
    //订阅失败
    const SUBSCIBE_INSERT_ERROR = 1;
    const SUBSCIBE_INSERT_ERROR_MSG = '订阅失败';

    //无数据
    const SUBECIBE_COUNT_SELECT_ERROR = 1;
    const SUBECIBE_COUNT_SELECT_ERROR_MSG = '暂无数据';


	/**
     * 简历查询
     */
    const RESUMES_SELECT_ERROR = 1;
    const RESUMES_SELECT_ERROR_MSG = '数据获取失败';
     /**
     * 登录
     */
    const RESUME_LOGIN = '请先登录';
    const RESUME_XINXI_TOP = '请完善简历信息';
    const RESUME_QIYE_TOP = '该企业信息不完善';
    const RESUME_JIANLI_TOP = '您已提交过简历';
}