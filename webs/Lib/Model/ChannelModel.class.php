<?php
/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-10
 +----------------------------------------------------------------------
 * 文件描述：
 +----------------------------------------------------------------------
 * 升级记录： 
 +----------------------------------------------------------------------
*/
class ChannelModel extends CommonModel{
    // 自动验证设置
    protected $_validate = array(
        array('name', 'require', '栏目名称不能为空！')
    );
}