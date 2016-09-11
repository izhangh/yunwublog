<?php

/* +----------------------------------------------------------------------
 * 创建作者: wuchao <775669127@qq.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-10
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 单位管理类
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
 */

Class ManageAction extends CommonAction
{

    public function _initialize()
    {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
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
        $keysField = array('name', 'manage_name', 'manage_phone');
        $sortBy = 'id';
        $asc = 'asc';
    }

    public function afte_list(&$list)
    {
        //查询角色，和用户已有角色
        foreach ($list as $key => $value) {

        }
    }

    /**
     * 添加、修改页面显示前的操作
     */
    public function _befor_handle(&$data)
    {
        $data['pwd'] = encrypt($data['pwd']);
        return;
    }

    public function _afte_handle(&$id)
    {
        if (I('post.handle_method') == 'add') {
            $access['uid'] = $id;
            $access['group_id'] = get_system_option('县管理员分组ID');
            M('AuthGroupAccess')->add($access);
        }
        return;
    }
}