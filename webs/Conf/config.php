<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'            	 	=> 1,
	'DB_TYPE'              		=> 'mysqli',         			// 数据库类型
    'DB_HOST'            	   	=> 'localhost',     		// 服务器地址
    'DB_NAME'               	=> 'yunwublog',          			// 数据库名
    'DB_USER'               	=> 'root',          			// 用户名
    'DB_PWD'                	=> '950430zhangh',  			// 密码
    'DB_PORT'               	=> '3306',          			// 端口
	'DB_PREFIX'					=> 'blog_',							// 数据库表前缀

	'PAGESIZE'              	=> 10,               			//配置每页显示数据个数
	'VAR_PAGE'					=> 'pageNum',					//分页变量名称
	'PAGE_NUM_SHOWN'			=> '10',						//页标数字显示数目
	
    'APP_GROUP_LIST' 			=> 'Index,Admin',
    'DEFAULT_GROUP' 			=> 'Index',

	//分组配置
	'DEFAULT_THEME'				=> 'Default',
	'TMPL_DETECT_THEME'			=> true,						// 自动侦测模板主题
	'THEME_LIST' 				=> 'Default',					//模板列表
    'DEFAULT_CHARSET' 			=> 'utf-8',

	'WEB_TITLE'					=> '',

	'SHOW_PAGE_TRACE'			=> true,						//显示调试信息
    'SHOW_ERROR_MSG'        	=> true,            			// 显示错误信息
    'SHOW_PAGE_TRACE'       	=> false,           			// 显示页面Trace信息
	'FFDEBUG'					=> true,						//开启firebug调试

    //密码加密拼接字段
    'AUTH_MASK'                 => '@blog_!',

    //Auth权限配置
    'AUTH_CONFIG'=>array(
        'AUTH_ON'               => true, //认证开关
        'AUTH_TYPE'             => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP'            => 'blog_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS'     => 'blog_auth_group_access', //用户组明细表
        'AUTH_RULE'             => 'blog_auth_rule', //权限规则表
        'AUTH_USER'             => 'blog_manage'//用户信息表
    ),

    'DEFAULT_FILTER'            => 'trim,htmlspecialchars',
    'LOAD_EXT_CONFIG'			=> 'web',					//加载另加的配置文件
);