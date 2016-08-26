<?php
/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhang@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-08
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 公用方法
 +----------------------------------------------------------------------
 * 升级记录： 
 +----------------------------------------------------------------------
*/
class CommonAction extends Action {

	public function _initialize() {
        $this->_channel();   //栏目列表
    }

    public function _empty() {
        redirect(U('Index/Index/index'));
    }

    /**
     * 栏目列表
     */
    protected function _channel() {
        $menu = D('Channel');
        $list = $menu->where(array('status' => 'a'))->order('sort ASC')->select();
        foreach($list as $key => $value) {
            switch($value['type']) {
                case 'a':
                    $list[$key]['alink'] = U('Index/Index/single', array('id' => $value['id']));
                    break;
                case 'b':
                    $list[$key]['alink'] = U('Index/Index/listArticle', array('id' => $value['id']));
                    break;
                case 'c':
                    $list[$key]['alink'] = $value['link'];
                    break;
                default:
                    unset($list[$key]);
                    break;
            }
        }
        $this->assign('channel_list', $list);
        return true;
    }
}