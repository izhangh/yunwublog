<?php

/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhangh@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-10
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 文章管理类
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
*/

Class ArticleAction extends CommonAction
{
    /**
     * 初始化
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
    }

    /**
     * 添加过滤条件
     * @param $map
     */
    function _filter(&$map)
    {
        $channel = session('curMenu');
        $map['channel'] = array('EQ', $channel['name']);
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
        if (empty(I('channel_id'))) {
            $this->error('参数丢失');
        }
        $sortBy = 'id';
        $asc = 'desc';
        $keysField = array('name', 'description', 'content');
        $this->channel_id = I('channel_id');
        return;
    }

    /**
     *文章页面
     */
    public function page()
    {
        $method = 'add';
        $pic_display = 'style="display: none;"';
        if (!empty(I('get.article_id'))) {
            $currdata = $this->_find(M($this->dbname), array('id' => I('get.article_id')));
            $currdata['content'] = html_out($currdata['content']);
            $method = 'edit';
            if (!empty($currdata['pic'])) {
                $pic_display = '';
            }
            $this->assign('currdata', $currdata);
            $this->assign('article_id', I('get.article_id'));
        }
        $this->classify_list = M('Classify')->field(array('id', 'name'))->where(array('channel_id' => I('channel_id')))->select();
        $this->assign('method', $method);
        $this->assign('pic_display', $pic_display);
        $this->assign('channel_id', I('get.channel_id'));
        $this->display();
    }

    /**
     * @param $data
     * 编辑时旧的图片的处理
     */
    public function _befor_handle(&$data)
    {
        if (!empty(I('post.pic_old')) && !empty(I('post.pic'))) {
            delFile('.' . I('post.pic_old'));
        }
        if (empty($data['pic'])) {
            unset($data['pic']);
        }
        return;
    }

    /**
     * 上传照片
     */
    public function uploadPic()
    {
        if (IS_POST && !empty($_FILES)) {
            import('ORG.Net.UploadFile');
            $config = array(
                'maxSize' => 2097152,
                'allowExts' => array('jpg', 'png'),
                'savePath' => './Article/images/',
            );
            $upload = new UploadFile($config);// 实例化上传类
            // 上传文件
            if (!$upload->upload()) {// 上传错误提示错误信息
                $data['message'] = $upload->getErrorMsg();
                $data['success'] = 0;
            } else {// 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
                $data['message'] = '上传成功';
                $data['url'] = substr($info[0]['savepath'] . $info[0]['savename'], 1);
                $data['success'] = 1;
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * @param $id
     * 删除时图片的删除
     */
    public function _befor_del(&$id)
    {
        $pic = $this->_find(M($this->dbname), array('id' => $id));
        if ($pic['pic'] !== '') {
            delFile('.' . $pic['pic']);
        }
    }
}