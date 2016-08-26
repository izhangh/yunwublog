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

	function _initialize() {
        $this->_name = MODULE_NAME;
		if(!session('userId')) {
            redirect(U('Public/login'));
		}
        $currentPAGE = '/'.GROUP_NAME.'/'.MODULE_NAME.'/'.ACTION_NAME;
        if(!authcheck($currentPAGE, session('userId'))) {
            if(IS_AJAX) {
                $this->mtReturn(300,"很抱歉,此项操作您没有权限！");
            } else {
                $this->error(''.session('username').'很抱歉,此项操作您没有权限！');
            }
        }
        $menu_list = $this->_menu();  //获取左侧菜单栏
        $key = '-1';
        $menu_link = M('AuthRule')->where(array('name' => $currentPAGE))->getField('menu_link');
        foreach($menu_list as $menu_k => $menu_v) {
            $menu_list[$menu_k]['is_cur'] = '0';
            if($menu_v['alink'] == $menu_link) {
                $menu_list[$menu_k]['is_cur'] = '1';
                session('curMenu', $menu_list[$menu_k]);
                $key = '0';
                break;
            }
        }
        $this->assign('menu_list', $menu_list);
        $channel_list = $this->_channel();   //栏目列表
        if($key == '-1') {
            foreach($channel_list as $channel_k => $channel_v) {
                $channel_list[$channel_k]['is_cur'] = '0';
                if($channel_v['id'] == I('get.channel_id')) {
                    $channel_list[$channel_k]['is_cur'] = '1';
                    session('curMenu', $channel_list[$channel_k]);
                    $key = '0';
                    break;
                }
            }
        }
        $this->assign('channel_list', $channel_list);
    }

    public function _empty() {
        redirect(U('Index/Index/index'));
    }

    protected function mtReturn($status, $info, $sql = '', $return = array()) {
        /*
        $udata['id'] = session('userId');
        $udata['update_time']=time();
        M("user")->save($udata);
        */
        if(APP_DEBUG && !empty($sql)) {
            $return['sql'] = $sql;
        }
        $this->ajaxReturn($return, $info, $status);
    }

	/**
	 * 菜单
	 */
	protected function _menu() {
		$menu = D('Menu');
        $list = $menu->where("level = '0' and status = '1'")
                     ->order('sort ASC')
                     ->select();
        if(!empty($list)) {
            foreach($list as $key => $value) {
                if(!authcheck($value['alink'], session('userId'))) {
                    unset($list[$key]);
                }
            }
        }
        return $list;
	}

    /**
     * 栏目列表
     */
    protected function _channel() {
        $menu = D('Channel');
        $list = $menu->order('sort ASC')->select();
        foreach($list as $key => $value) {
            $list[$key]['check_link'] = '/Admin/Article/index';
            $list[$key]['alink'] = U('Admin/Article/index', array('channel_id' => $value['id']));
        }
        return $list;
    }

    /**
     * 列表信息
     * @param $model 模型
     * @param array  $map 条件
     * @param array  $field 查询字段
     * @param string $sortBy 默认排序字段
     * @param string $asc 默认排序方式
     * @param string $table 查询的表
     * @return array
     */
    protected function _list($model, $map = array(), $field = array(), $sortBy = '', $asc = '', $table = '', $count = '') {
        if(!empty($table)) {
            $model->table($table);
        }
        if(empty($count)) {
            $count = $model->getPk();
        }
        $count = $model->where($map)->count($count);  // 查询满足要求的总记录数
        $p = array ();
        $p['order'] = !empty($sortBy) ? $sortBy : $model->getPk();	//排序字段，优先是$_REQUEST['_order']， 然后是$sortBy参数，最后默认为主键名
        $p['sort'] = !empty($asc) ? $asc : 'asc';					//排序规则
        //分页数量
        $p['listRows'] = C("PAGESIZE");
        if(!empty($_REQUEST['numPerPage'])) {
            $p['listRows'] = $_REQUEST['numPerPage'];
        }
        $_REQUEST['numPerPage'] = $p['listRows'];	//继续传值
        //分页处理
        import('ORG.Util.Page');// 导入分页类
        $page = new Page($count, $p['listRows']);  // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $page->show();	//分页显示输出
        $this->assign("show", $show);

        if(!empty($table)) {
            $model->table($table);
        }
        $list = $model->field($field)->where($map)->order("`".$p['order']."` ".$p['sort'])->limit($page->firstRow.', '.$page->listRows)->select();

        if(method_exists($this, '_afte_list')) {
            $this->_afte_list($list);
        }
        return $list;
    }

    /**
     * 关键字搜索条件拼接
     * @param array $field
     * @return array
     */
    protected function _search($field) {
        $map = array();
        $field = implode("|", $field);
        if(!mb_check_encoding($_REQUEST['keys'], 'utf-8')) {
            $_REQUEST['keys'] = iconv('gbk', 'utf-8', $_REQUEST['keys']);
        }
        $map[$field] = array('like', '%'.trim($_REQUEST['keys']).'%');
        $where['_complex'] = $map;
        return $where;
    }

    /**
     * 根据条件查找一条
     * @param $model
     * @param array $map
     * @return bool|mixed
     */
    protected function _find($model, $map = array(), $field = array()) {
        if(empty($model)) {
            return false;
        }
        if(!empty($field)) {
            $model->field($field);
        }
        $data = $model->where($map)->find();
        return $data;
    }

    /**
     * 根据条件获取一个字段对应的值
     * @param $model
     * @param $map
     * @param $field
     * @param bool $is_list 是否获取列表
     * @return bool|mixed
     */
    protected function _getField($model, $map, $field, $is_list = true) {
        if(empty($model)) {
            return false;
        }
        if($is_list) {
            $data = $model->where($map)->getField($field, $is_list);
        } else {
            $data = $model->where($map)->getField($field);
        }
        return $data;
    }

    /**
     * 首页
     */
    public function index() {
        $model = D($this->dbname);
        $field = array();
        $keysField = array();
        $sortBy = '';
        $asc = '';
        $table = '';
        $count = '';
        if(method_exists($this, '_befor_index')) {
            $this->_befor_index($field, $keysField, $sortBy, $asc, $table, $count);
        }
        $map = array();
        if($keysField && isset($_REQUEST['keys']) && $_REQUEST['keys'] != '') {
            $map = $this->_search($keysField);
        }
        if(method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        if(!empty($model)) {
            $list = $this->_list($model, $map, $field, $sortBy, $asc, $table, $count);
            $this->assign('list', $list);
        }
        if(method_exists($this, '_afte_index')) {
            $this->_afte_index($list);
        }
        $this->display();
    }

    /**
     * 处理添加、修改
     */
    public function handle() {
        if(IS_AJAX) {
            $data = I('post.');
            if(empty($data)) {
                $data = I('get.');
            }
            //判断提交信息是否符合要求
            $method = $data['_method_'];
            if(!in_array($method, array('add', 'edit'))) {
                $this->mtReturn(300, '失败，数据不合适', array($method));
            } else if($method === 'edit' && empty($data['id'])) {
                $this->mtReturn(300, '失败，数据不合适', array($method));
            }
            $model = D($this->dbname);
            if(method_exists($this, '_befor_handle')) {
                $this->_befor_handle($data);
            }
            $data = $model->create($data);
            echo $model->getDbError();
            if(false === $data) {

                $this->mtReturn(300, '失败，请不要重复提交', $model->getDbError().$model->_sql());
            }
            if($method === 'add') {
                unset($data['id']);
                if(false !== $model->add($data)) {
                    $id = $model->getLastInsID();
                    if(method_exists($this, '_afte_handle')) {
                        $this->_afte_handle($id);
                    }
                    $this->mtReturn(200, "添加成功", $model->_sql(), array($id));
                } else {
                    $this->mtReturn(300, "添加失败", $model->getDbError()."<br />".$model->_sql());
                }
            } else if($method === 'edit') {
                if(false !== $model->save($data)) {
                    $id = $data['id'];
                    if(method_exists($this, '_afte_handle')) {
                        $this->_afte_handle($id);
                    }
                    $this->mtReturn(200, "操作成功", $model->_sql(), array($id));
                } else {
                    $this->mtReturn(300, "操作失败", $model->getDbError()."<br />".$model->_sql());
                }
            }
        } else {
            $this->mtReturn(300, "操作错误");
        }

    }

    /**
     * 删除
     */
    public function del() {
        if(IS_GET && IS_AJAX) {
            $model = D($this->dbname);
            $id = I('get.id');
            if($id) {
                if (method_exists($this, '_befor_del')) {
                    $this->_befor_del($id);
                }
                if(false !== $model->where("id = ".$id."")->delete($id)) {
                    if (method_exists($this, '_afte_del')) {
                        $this->_afte_del($id);
                    }
                    $this->mtReturn(200, "操作成功", $model->_sql());
                } else {
                    $this->mtReturn(300, "操作失败", $model->getDbError()."<br />".$model->_sql());
                }
            } else {
                $this->mtReturn(300, "参数丢失");
            }
        } else {
            $this->mtReturn(300, "操作错误");
        }
    }

    /**
     * 导出excel
     * @param string $fileName
     * @param $headArr
     * @param array $data
     */
    public function xlsout($fileName = '数据表', $headArr, $data) {
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        //对数据进行检验
        if(empty($data) || !is_array($data)) {
            die("data must be a array");
        }
        //检查文件名
        if(empty($fileName)) {
            exit;
        }

        $date = date("Y_m_d_H_i_s",time());
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach($headArr as $v) {
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();

        //设置为文本格式
        foreach($data as $key => $rows) { //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value) {// 列写入
                $j = chr($span);

                $objActSheet->setCellValueExplicit($j.$column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }

    public function xlsin($filename){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        //要导入的xls文件，位于根目录下的Public文件夹
        $filename = $filename;
        //创建PHPExcel对象
        $PHPExcel = new PHPExcel();
        //如果excel文件后缀名为.xls，导入这个类
        import("Org.Util.PHPExcel.Reader.Excel5");
        //如果excel文件后缀名为.xlsx，导入这下类
        //import("Org.Util.PHPExcel.Reader.Excel2007");
        //$PHPReader=new PHPExcel_Reader_Excel2007();

        $PHPReader = new PHPExcel_Reader_Excel5();
        //载入文件
        $PHPExcel=$PHPReader->load($filename);
        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
        //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for($currentRow=1;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
            }
        }
        return $arr;
    }
}