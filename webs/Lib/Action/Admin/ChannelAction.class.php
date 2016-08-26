<?php
/* +----------------------------------------------------------------------
 * 创建作者: wuchao <775669127@qq.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-10
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 栏目管理 类
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
*/
Class ChannelAction extends CommonAction {

    /**
     * 初始化
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->dbname = MODULE_NAME;
    }

    /**
     * 列表查询前的操作
     * @param $field        要查询的字段
     * @param $keysField    关键字匹配的字段---
     * @param $sortBy       根据字段排序
     * @param $asc          排序方式 asc desc
     */
    public function _befor_index(&$field, &$keysField, &$sortBy, &$asc) {
        $sortBy = 'sort';
        $asc = 'asc';
        $keysField = array('name');
    }

    public function _befor_del($id) {
        //先获取类型
        $type = M($this->dbname)->where(array('id' => $id))->getField('type');
        if($type == 'a') {
            //如果是一篇文章，删除
            M('SinglePage')->where(array('channel_id' => $id))->delete();
        } else if($type == 'b') {
            //如果是文章列表
            $article = M('Article')->where(array('channel_id' => $id))->getField('id', true);
            if(!empty($article)) {
                $this->mtReturn('300', '该栏目下有文章，请先删除文章，再删除栏目');
            }
        }
        return ;
    }
}