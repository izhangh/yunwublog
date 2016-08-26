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
Class UserAction extends CommonAction {

    public function _initialize() {
        parent::_initialize();
        $this->dbname = 'Manage';
    }

    public function index() {
        $data = M($this->dbname)->where(array('id' => session('userId')))->find();
        $this->assign('id' ,$data['id']);
        $this->assign('data' ,$data);
        $this->display();
    }

    public function _befor_handle(&$data) {
        if(!empty($data['pwd'])) {
            $data['pwd'] = encrypt($data['pwd']);
        } else {
            unset($data['pwd']);
        }
        if(!empty($data['manage_name'])) {
            session('userRealName', $data['manage_name']);
        }
        if(!empty($data['img'])) {
            session('userImg', $data['img']);
        }
        return ;
    }
}