<?php
/* ----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 ------------------------------------------------------------------------
 * 创建日期：2016-08-10
 ------------------------------------------------------------------------
 * 文件描述：研修网后台管理首页
 ------------------------------------------------------------------------
 * 升级记录：  
 ------------------------------------------------------------------------
*/
class AuthGroupAction extends CommonAction {

    public function _initialize() {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
    }

    /**
     * 重载，直接查询所有分组
     */
    public function index() {
        $this->list = M($this->dbname)->order('sort asc')->select();
        $this->rule_list = M('AuthRule')->order('sort asc')->select();
        $this->display();
    }
}