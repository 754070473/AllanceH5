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
}