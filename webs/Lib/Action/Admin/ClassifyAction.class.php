<?php
/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-24
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 文章管理类
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
*/
Class ClassifyAction extends CommonAction
{
    /**
     * 初始化
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
        $this->channel_id = I('channel_id');
        $this->channel_data = M('Channel')->where(array('id' => I('channel_id')))->getField('name');
    }

    /**
     * 添加过滤条件
     * @param $map
     */
    function _filter(&$map)
    {
        $map['channel_id'] = array('EQ', I('channel_id')) ;
    }

    /**
     * 列表查询前的操作
     * @param $field        要查询的字段
     * @param $keysField    关键字匹配的字段---
     * @param $sortBy       根据字段排序
     * @param $asc          排序方式 asc desc
     */
    public function _befor_index(&$field, &$keysField, &$sortBy, &$asc)
    {
        $sortBy = 'sort';
        $asc = 'asc';
        $keysField = array('name');
        return ;
    }
}