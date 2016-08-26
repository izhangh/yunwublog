<?php
/* ----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 ------------------------------------------------------------------------
 * 创建日期：2015-06-24
 ------------------------------------------------------------------------
 * 文件描述：研修网后台管理首页
 ------------------------------------------------------------------------
 * 升级记录：  
 ------------------------------------------------------------------------
*/
class AuthRuleAction extends CommonAction {

    public function _initialize() {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
    }

    public function index() {
        $list = M($this->dbname)->order('sort asc')->select();
        $this->rule_menu_list = M('Menu')->field('alink as id, name')->order('sort asc')->select();
        foreach($list as $key => $value) {
            $list[$key]['menu_name'] = M('Menu')->where(array('alink' => $value['menu_link']))->getField('name');
        }
        $this->list = $list;
        $this->display();
    }
}