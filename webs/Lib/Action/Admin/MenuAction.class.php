<?php

Class MenuAction extends CommonAction
{

    public function _initialize()
    {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
    }

    public function index()
    {
        $list = cateTree($pid = 0, $level = 0, $this->dbname);
        $this->assign('list', $list);
        $this->display();
    }

    public function _befor_handle(&$data)
    {
        $pid = $data['pid'];
        if ($pid == 0) {
            $data['level'] = 0;
        } else {
            //查询父的level
            $level = D($this->dbname)->where('id=' . $pid . '')->field('level')->limit(1)->select();
            $level = $level[0]['level'] + 1;
            $data['level'] = $level;
        }
        return;
    }
}