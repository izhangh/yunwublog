<?php
/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhang@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-17
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 网站配置
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
*/
class ConfigAction extends CommonAction {

    public function _initialize() {
        parent::_initialize();
        $this->dbname = '';
    }

    /**
     * 系统选项
     * @return [type] [description]
     */
    public function index() {
        $this->manage_list = M('Manage')->field(array('id', 'name', 'manage_name'))->select();
        $this->display();
    }

    /**
     * 更新验证码配置文件
     * @return [type] [description]
     */
    public function handle() {
        if(!IS_POST)
            $this->error('页面不存在！');

        if(F('web', I('post.'), CONF_PATH)) {
            $this->mtReturn(200, '操作成功！');
        } else {
            $this->mtReturn(300, '操作失败！');
        }
    }
}