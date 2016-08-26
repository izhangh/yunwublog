<?php
/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2015-05-05
 +----------------------------------------------------------------------
 * 文件描述：
 +----------------------------------------------------------------------
 * 升级记录： 
 +----------------------------------------------------------------------
*/
class ArticleModel extends CommonModel{
    // 自动验证设置
    protected $_validate = array(
        array('channel_id', 'require', '栏目编号不能为空！'),
        array('name', 'require', '标题不能为空！'),
        array('markdown', 'require', 'markdown不能为空！'),
    );
    // 自动填充设置
    protected $_auto = array(
        array('operator','getUserId',1,'callback'),
        array('update_date','getDate',1,'callback'),
    );  
}