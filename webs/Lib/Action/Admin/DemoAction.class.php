<?php

/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhang@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-10
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 演示类
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
*/

class DemoAction extends CommonAction
{

    public function _initialize()
    {
        parent::_initialize();
//        $this->dbname = 'demo';
        $this->dbname = MODULE_NAME;

        //假设要获取其他表对应的数据
        $taskList = $this->_list(D("Task"), $map = array(), $field = array());

        //假设要获取其他表对应一个字段的数据
        $taskList = $this->_getField(D("Task"), $map = array());

        //假设头部有一个固定的信息，例如任务信息，任务id
        $taskData = $this->_find(D("Task"), array('id' => I('get.taskId')));
    }

    /**
     * 添加过滤条件
     * @param $map
     */
    function _filter(&$map)
    {
        if (IS_POST && isset($_REQUEST['filter']) && $_REQUEST['filter'] != '') {
            $map['field'] = array('EQ', I('filter'));
        }
    }

    /**
     * 列表查询前的操作
     * @param $field        要查询的字段
     * @param $keysField    关键字匹配的字段
     * @param $sortBy       根据字段排序
     * @param $asc          排序方式 asc desc
     * @param $table        联表查询表名字符串，格式 string  'table1 a, table2 b, ...'
     * @param $count        联表查询时，根据哪个字段来获取总数，格式 string  a.id
     */
    public function _befor_index(&$field, &$keysField, &$sortBy, &$asc, &$table, &$count)
    {

    }

    /**
     * 列表信息查询出来后，对查出来的信息再处理
     * @param $list
     */
    public function _afte_list(&$list)
    {

    }

    /**
     * 列表查询后的操作
     * @param $list        要处理的数据
     */
    public function _afte_index(&$list)
    {

    }

    /**
     * 获取列表查询的sql语句，用于调试所用
     * @param $sql
     */
    public function get_index_sql($sql) {
        echo $sql;
    }

    /**
     * 添加、修改页面显示前的操作
     */
    public function _befor_handle()
    {

    }

    /**
     * 添加、修改页面显示后的操作
     */
    public function _afte_handle()
    {

    }

    /*
     * 删除之前的操作
     * @param $id   删除对象id
     */
    public function _befor_del($id)
    {

    }

    /*
     * 删除之后的操作
     * @param $id   删除对象id
     */
    public function _afte_del($id)
    {

    }
}