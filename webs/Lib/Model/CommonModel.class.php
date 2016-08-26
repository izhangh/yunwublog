<?php
/* +----------------------------------------------------------------------
 * 创建作者: lele <940518008@qq.com>
 +----------------------------------------------------------------------
 * 创建日期：2012-12-19
 +----------------------------------------------------------------------
 * 文件描述：
 +----------------------------------------------------------------------
 * 升级记录： 
 +----------------------------------------------------------------------
*/
class CommonModel extends Model {
	//获取系统日期
    function getDate(){
		return time();
	}
	//获取年月
	function getYearAndMonth(){
		return date('Y-m');
	}
	//获取系统短日期
	function getShortDate(){
		return date('Y-m-d');
	}
    //获取登录用户ID
	function getUserId(){
		return session('userId');
	}
	function getUserName(){
		return session('name');
	}
	function getUserRealName(){
		return session('username');
	}
}