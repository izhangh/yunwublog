<?php
/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2015-06-16
 +----------------------------------------------------------------------
 * 文件描述：教师研修网首页
 +----------------------------------------------------------------------
 * 升级记录： 
 +----------------------------------------------------------------------
*/
class IndexAction extends CommonAction {

    /**
     * 首页/文章列表
     */
    public function index() {
        if(!empty(I('get.channel_id'))) {
            $map['channel_id'] = I('get.channel_id');
            //获取栏目信息
            $this->channelData = $this->get_channel_info(I('get.id'));
        }
        //获取文章列表
        $model = D('Article');
        $count = $model->where($map)->count();  // 查询满足要求的总记录数
        //分页处理
        import('ORG.Util.Page');// 导入分页类
        $page = new Page($count, C('PAGESIZE'));  // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $page->show();	//分页显示输出
        $this->assign("show", $show);
        //获取列表
        $this->newsList = $model->field('id, channel_id, name, description, update_date, SUBSTRING(update_date, "1", "7") YM, SUBSTRING(update_date, "9", "10") D')->where($map)->order('id desc')->limit($page->firstRow.', '.$page->listRows)->select();
        $this->display();
    }

    /**
     * 文章页
     */
    public function article()
    {
        if (IS_GET && !empty(I('get.channel_id')) && !empty(I('get.id'))) {
            //获取栏目信息
            $this->channelData = $this->get_channel_info(I('get.channel_id'));
            //获取文章信息
            $articleData = M('Article')->where(array('channel_id' => I('get.channel_id'), 'id' => I('get.id')))->find();
            $articleData['markdown'] = html_out($articleData['markdown']);
            $this->assign('articleData', $articleData);
            $this->display();
        } else {
            $this->error('页面错误');
        }
    }

    /**
     * 获取栏目信息
     * @param $channel_id
     * @return mixed
     */
    protected function get_channel_info($channel_id) {
        return M('Channel')->where("id = '".$channel_id."'")->find();
    }

    /**
     * 验证登录
     */
    public function signin() {
        if(IS_AJAX && IS_POST) {
            $data = I('post.');
            if(empty($data['password']) || empty($data['username'])) {
                $this->ajaxReturn(array(), '数据不全！', '300');
            }
            $map['name'] = $data['username'];
            $map['pwd'] = encrypt($data['password']);
            $info = M('Manage')->where($map)->find();
            if(!empty($info['id'])) {
                session('userId', $info['id']);
                session('userImg', $info['img']);
                session('userName', $info['name']);
                session('userRealName', $info['manage_name']);
                $this->ajaxReturn(array(), '登录成功！', '200');
            } else {
                $this->ajaxReturn(array(), '用户账号密码错误！', '300');
            }
        } else {
            $this->ajaxReturn(array(), '错误类型！', '300');
        }
    }

    /**
     *退出登录
     */
    public function signup() {
        session('[destroy]');
        redirect(U('Index/Index/index'));
    }
}