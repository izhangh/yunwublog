<?php
/* ----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 ------------------------------------------------------------------------
 * 创建日期：2016-08-24
 ------------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 后台管理首页
 ------------------------------------------------------------------------
 * 升级记录：  
 ------------------------------------------------------------------------
*/
class IndexAction extends CommonAction {

    public function _initialize() {
        parent::_initialize();
    }

    /**
     *
     */
    public function index() {
        //查询单位总数
        $block[0]['name'] = '单位总数';
        $block[0]['class'] = 'bg-primary';
        $block[0]['icon'] = 'tachometer';
        $block[0]['url'] = U('Admin/GroupClient/index');
        $block[0]['num'] = M('GroupClient')->count();
        //查询任务总数
        $block[1]['name'] = '团检任务';
        $block[1]['class'] = 'bg-success';
        $block[1]['icon'] = 'heartbeat';
        $block[1]['url'] = U('Admin/CheckTask/index');
        $block[1]['num'] = M('CheckTask')->count();

        $block[2]['name'] = '操作手册';
        $block[2]['class'] = 'bg-warning hidden-xs';
        $block[2]['icon'] = 'smile-o';
        $block[2]['url'] = U('Admin/OperationFile/index');
        $block[2]['num'] = '';
        $this->assign('block', $block);
        $this->display();
    }
    function delRuntime() {
        import("ORG.Io.Dir");
        Dir::delDir(RUNTIME_PATH, true);
        $this->mtReturn('200', '清除成功');
    }
}