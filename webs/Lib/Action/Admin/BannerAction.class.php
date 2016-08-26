<?php
/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhang@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-10
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 职员管理类
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
*/
Class BannerAction extends CommonAction{

    public function _initialize() {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
    }

    /**
     * 添加过滤条件
     * @param $map
     */
    function _filter(&$map) {

    }

    /**
     * 列表查询前的操作
     * @param $field        要查询的字段
     * @param $keysField    关键字匹配的字段---
     * @param $sortBy       根据字段排序
     * @param $asc          排序方式 asc desc
     */
    public function _befor_index(&$field, &$keysField, &$sortBy, &$asc) {
        $sortBy = 'id';
        $asc = 'desc';
        $keysField = array('name', 'description', 'alink');
    }

    /**
     * 插入数据之前进行加密，同时删除旧文件
     * @param $data
     */
    public function _befor_handle(&$data) {
        if(!empty(I('post.pic_old')) && !empty(I('post.pic'))) {
            delFile('.'.I('post.pic_old'));
        }
        if(empty($data['pic'])) {
            unset($data['pic']);
        }
        return ;
    }

    /**
     * 上传照片
     */
    public function uploadPic() {
        if(IS_POST && !empty($_FILES)) {
            import('ORG.Net.UploadFile');
            $config = array(
                'maxSize'   => 2097152,
                'allowExts'      => array('jpg', 'png'),
                'savePath'  => './upload/Banner/',
            );
            $upload = new UploadFile($config);// 实例化上传类
            // 上传文件
            if(!$upload->upload()) {// 上传错误提示错误信息
                $data['info'] = $upload->getErrorMsg();
                $data['status'] = 300;
            } else {// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
                $data['data'] = substr($info[0]['savepath'].$info[0]['savename'], 1);
                $data['info'] = '上传成功';
                $data['status'] = 200;
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 删除的时候删除照片
     * @param $id
     * @param $model
     */
    public function _befor_del($id, $model) {
        $pic = $this->_find(M($this->dbname), array('id' => $id));
        if($pic['pic'] !== '') {
            delFile('.'.$pic['pic']);
        }
        return ;
    }
}