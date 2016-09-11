<?php

/* +----------------------------------------------------------------------
 * 创建作者: zhangh <izhang@outlook.com>
 +----------------------------------------------------------------------
 * 创建日期：2016-08-10
 +----------------------------------------------------------------------
 * 文件描述：云雾海玲博客后台管理 职员模块
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
*/

Class WorkerAction extends CommonAction
{

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
        $map['status'] = 'a';
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
        $field = array(
            '*',
            'get_field_dict_name("worker", "gender", gender) gender_name',
            'get_field_dict_name("worker", "status", status) status_name'
        );
        $sortBy = 'id';
        $asc = 'asc';
        $keysField = array('name');
    }

    /**
     * 列表查询后的操作
     * @param $list        要处理的数据
     */
    public function _afte_index(&$list)
    {
        $this->nation_list = set_field_dict_list('worker', 'nation');
        $this->marital_status_list = set_field_dict_list('worker', 'marital_status');
    }

    public function get_index_sql($sql) {
//        echo $sql;
    }

    /**
     * 插入数据之前进行加密，同时删除旧文件
     * @param $data
     */
    public function _befor_handle(&$data)
    {
        if (!empty(I('post.pic_old')) && !empty(I('post.pic'))) {
            delFile('.' . I('post.pic_old'));
        }
        if (empty($data['pic'])) {
            unset($data['pic']);
        }
        if (I('post.handle_method') == 'add') {
            M($this->dbname)->where('id_card_no = "' . $data['id_card_no'] . '"')->setField('status', 'c');
            $pwd = strtolower(substr($data['id_card_no'], -6));
            $data['pwd'] = encrypt($pwd);
        }
        $temp_id_card = $data['id_card_no'];
        if (strlen($temp_id_card) === 15) {
            $temp_id_card = $this->idCard15to18($temp_id_card);
        }
        $data['birthday'] = substr($temp_id_card, 6, 4) . '-' . substr($temp_id_card, 10, 2) . '-' . substr($temp_id_card, 12, 2);
        $subTimestamp = strtotime(date("Y-m-d")) - strtotime($data['birthday']);
        $data['age'] = floor($subTimestamp / (60 * 60 * 24 * 30 * 12));
        $data['gender'] = substr($temp_id_card, 16, 1) % 2 ? 'a' : 'b';
        return;
    }

    /**
     * 将用户权限写入
     * @param $id
     */
    public function _afte_handle(&$id)
    {
        if (I('post.handle_method') == 'add') {
            $access['uid'] = $id;
            $access['group_id'] = get_system_option('单位职员分组ID');
            M('AuthGroupAccess')->add($access);
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
                'maxSize' => 1024 * 100,
                'allowExts' => array('jpg', 'png'),
                'savePath' => './upload/worker/pic/',
            );
            $upload = new UploadFile($config);// 实例化上传类
            // 上传文件
            if (!$upload->upload()) {// 上传错误提示错误信息
                $data['info'] = $upload->getErrorMsg();
                $data['status'] = 300;
            } else {// 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
                $data['data'] = substr($info[0]['savepath'] . $info[0]['savename'], 1);
                $data['info'] = '上传成功';
                $data['status'] = 200;
            }
            $this->ajaxReturn($data);
        }
    }

    /**
     * 功能：把15位身份证转换成18位
     *
     * @param string $idCard
     * @return newid or id
     */
    public function idCard15to18($idCard)
    {
        // 若是15位，则转换成18位；否则直接返回ID
        if (15 == strlen($idCard)) {
            $W = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1);
            $A = array("1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2");
            $s = 0;
            $idCard18 = substr($idCard, 0, 6) . "19" . substr($idCard, 6);
            $idCard18_len = strlen($idCard18);
            for ($i = 0; $i < $idCard18_len; $i++) {
                $s = $s + substr($idCard18, $i, 1) * $W [$i];
            }
            $idCard18 .= $A [$s % 11];
            return $idCard18;
        } else {
            return $idCard;
        }
    }

    /**
     * 添加的时候验证身份证号：同一个单位身份证不能重复
     */
    public function checkIdCard()
    {
        $valid['valid'] = false;
        $data = I('post.');
        //引入身份证号判断类
        import('@.ORG.IDValidator');
        $IDValidator = IDValidator::getInstance();
        //判断身份证号是否合法
        if (!$IDValidator->isValid($data['id_card_no'])) {
            $valid['message'] = "此身份证号不合法";
            $this->ajaxReturn($valid);
        }
        if (isset($data['type']) && isset($data['id_card_no'])) {
            $map['id_card_no'] = $data['id_card_no'];
            $map['status'] = 'a';
            $re = $this->_find(D($this->_name), $map);
            if (!empty($re['id']) && $data['type'] == 'edit') {
                if (!empty($data['obj']) && ($re['id'] == $data['obj'])) {
                    $valid['valid'] = true;
                    $this->ajaxReturn($valid);
                } else {
                    $valid['message'] = "此身份证号已存在，对象是：" . $re['name'];
                    $this->ajaxReturn($valid);
                }
            } else if (!empty($re['id']) && $data['type'] == 'add') {
                $valid['message'] = "此身份证号已存在，对象是：" . $re['name'];
                $this->ajaxReturn($valid);
            } else {
                $valid['valid'] = true;
                $this->ajaxReturn($valid);
            }
        } else {
            $this->ajaxReturn($valid);
        }
    }

    /**
     * 删除
     */
    public function del()
    {
        if (IS_GET && IS_AJAX) {
            $model = D($this->dbname);
            $id = I('get.id');
            if ($id) {
                $model->where('id = "' . $id . '"')->setField('status', 'b');
                $this->mtReturn(200, "删除成功");
            } else {
                $this->mtReturn(300, "参数丢失");
            }
        } else {
            $this->mtReturn(300, "操作错误");
        }
    }

    /**
     * 导入职员
     */
    public function importerWorker()
    {
        if (IS_GET && !IS_AJAX) {
            $this->display();
        } else {
            $this->error('操作失败', U('Admin/Index/index'));
        }
    }

    /**
     * 下载模板
     */
    public function downloads()
    {
        $file_name = 'worker.xls';
        $file_dir = './Public/common/xls/';
        if (!file_exists($file_dir . $file_name)) {
            header("Content-type: text/html; charset=utf-8");
            echo "File not found!";
            exit;
        } else {
            $file = fopen($file_dir . $file_name, "r");
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($file_dir));
            Header("Content-Disposition: attachment; filename=单位职员导入模板.xls");
            ob_clean();
            flush();
            readfile($file_dir . $file_name);
        }
    }

    public function uploadWorkerExcel()
    {
        if (IS_POST && !empty($_FILES)) {
            set_time_limit(0);
            import('ORG.Net.UploadFile');
            $config = array(
                'maxSize' => 1024 * 1024,
                'allowExts' => array('xls'),
                'savePath' => './upload/Worker/xls/',
            );
            $upload = new UploadFile($config);// 实例化上传类
            // 上传文件
            if (!$upload->upload()) {// 上传错误提示错误信息
                $data['info'] = $upload->getErrorMsg();
                $data['status'] = 300;
                $this->ajaxReturn($data);
            } else {// 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
                $filepath = $info[0]['savepath'] . $info[0]['savename'];
                if (substr(strrchr($filepath, '.'), 1) !== 'xls') {
                    $return['info'] = '文件格式必须为 xls，不能使 xlsx 或其它格式';
                    $return['status'] = 300;
                    delFile($filepath);     //删除上传的文件
                    $this->ajaxReturn($return);
                }
                $list = $this->xlsin($filepath);
                //根据导入模板写
                if ($list[1]['A'] !== '姓名' ||
                    $list[1]['B'] !== '身份证号' ||
                    $list[1]['C'] !== '职务' ||
                    $list[1]['D'] !== '个人身份' ||
                    $list[1]['E'] !== '民族' ||
                    $list[1]['F'] !== '婚姻状况' ||
                    $list[1]['G'] !== '联系电话'
                ) {
                    $return['info'] = '文件不符合模板规则，请重新下载模板填写信息，再上传';
                    $return['status'] = 300;
                    delFile($filepath);     //删除上传的文件
                    $this->ajaxReturn($return);
                }
                $model = D($this->dbname);
                $error = array();
                $successRow = 0;
                $errorRow = 0;
                array_shift($list); //删除表头
                //引入身份证号判断类
                import('@.ORG.IDValidator');
                $IDValidator = IDValidator::getInstance();
                foreach ($list as $key => $value) {
                    $data = array();
                    $data['name'] = str_replace(" ", "", str_replace("　", "", htmlspecialchars(strip_tags(trim($value['A'])))));
                    $data['id_card_no'] = str_replace(" ", "", str_replace("　", "", htmlspecialchars(strip_tags(trim($value['B'])))));
                    $data['job'] = str_replace(" ", "", str_replace("　", "", htmlspecialchars(strip_tags(trim($value['C'])))));
                    $data['identity'] = str_replace(" ", "", str_replace("　", "", htmlspecialchars(strip_tags(trim($value['D'])))));
                    $data['nation'] = str_replace(" ", "", str_replace("　", "", htmlspecialchars(strip_tags(trim($value['E'])))));
                    $data['marital_status'] = str_replace(" ", "", str_replace("　", "", htmlspecialchars(strip_tags(trim($value['F'])))));
                    $data['phone'] = str_replace(" ", "", str_replace("　", "", htmlspecialchars(strip_tags(trim($value['G'])))));
                    //相应字段赋值，职级字段换单词赋值，其他的直接给$data赋值
                    if (empty($data['name'])) {
                        $data['error'] = '请填写姓名';
                        $error[] = $data;
                        $errorRow++;
                        continue;
                    }
                    if (empty($data['id_card_no'])) {
                        $data['error'] = '请填写身份证号';
                        $error[] = $data;
                        $errorRow++;
                        continue;
                    }
                    if (empty($data['identity'])) {
                        $data['error'] = '请填写个人身份';
                        $error[] = $data;
                        $errorRow++;
                        continue;
                    }
                    //判断身份证号是否合法
                    if (!$IDValidator->isValid($data['id_card_no'])) {
                        $data['error'] = '身份证号不合法';
                        $error[] = $data;
                        $errorRow++;
                        continue;
                    }
                    //性别、年龄和出生日期获取
                    $id_info = $IDValidator->getInfo($data['id_card_no']);
                    $data['pwd'] = encrypt(strtolower(substr($data['id_card_no'], -6)));
                    $data['gender'] = $id_info['sex'];
                    $data['birthday'] = $id_info['birth'];
                    $subTimestamp = strtotime(date("Y-m-d", time())) - strtotime($data['birthday']);
                    $data['age'] = floor($subTimestamp / (60 * 60 * 24 * 30 * 12));
                    //判断是否重复
                    $info = $model->where(array('id_card_no' => $data['id_card_no'], 'status' => 'a'))->find();
                    if (empty($info['id'])) {
                        if (false !== $data = $model->create($data)) {
                            if (false === $model->add($data)) {
                                $data['error'] = $model->getDbError();
                                $error[] = $data;
                                $errorRow++;
                            } else {
                                $id = $model->getLastInsID();
                                //添加权限
                                $access['uid'] = $id;
                                $access['group_id'] = get_system_option('单位职员分组ID');
                                M('AuthGroupAccess')->add($access);
                                //将身份证号相同的账号状态全部改为已转出
                                $model->where('id_card_no = "' . $data['id_card_no'] . '" and id != "' . $id . '"')->setField('status', 'c');
                                $successRow++;
                            }
                        }
                    } else {
                        $data['error'] = '请核查，该身份证号对象已存在，为：' . $info['name'];
                        $error[] = $data;
                        $errorRow++;
                    }
                }
                $returnData = array(
                    'successRow' => $successRow,
                    'errorRow' => $errorRow,
                    'errorData' => $error
                );
                delFile($filepath);     //最后删除上传的文件
                $this->mtReturn('200', '导入结果', '', $returnData);
            }
        }
    }

    /**
     * 打印
     */
    public function printsheet()
    {
        $field = array(
            '*',
            'get_field_dict_name("worker", "gender", gender) gender_name',
            'get_field_dict_name("worker", "status", status) status_name'
        );
        $map['id'] = session('userId');
        $list = M($this->dbname)->where($map)->field($field)->find();
        $this->assign('list', $list);
        $this->display();
    }

    public function resetPwd()
    {
        if (IS_GET && !empty(I('get.id'))) {
            $id_card_no = M($this->dbname)->field('id_card_no')->where('id = "' . I('get.id') . '"')->find();
            $pwd = strtolower(substr($id_card_no['id_card_no'], 12));
            $pwd = encrypt($pwd);
            M($this->dbname)->where('id = "' . I('get.id') . '"')->setField('pwd', $pwd);
            $this->mtReturn(200, "操作成功");
        } else {
            $this->mtReturn(300, "参数丢失");
        }
    }

    /**
     * 导出详情
     */
    public function workerExport()
    {
        if (!empty(session('userId'))) {
            $keysField = array('name', 'get_level_name(level_id)');
            if ($keysField && isset($_REQUEST['keys']) && $_REQUEST['keys'] != '') {
                $map = $this->_search($keysField);
            }
            $field = array(
                '*',
                'get_field_dict_name("worker", "gender", gender) gender_name',
                'get_field_dict_name("worker", "status", status) status_name'
            );
            $list = M('Worker')->field($field)->where($map)->select();
            if (!empty($list)) {
                $data = array();
                foreach ($list as $key => $value) {
                    $data[$key]['worker'] = $value['name'];
                    $data[$key]['worker_id_card_no'] = $value['id_card_no'];
                    $data[$key]['gender_name'] = $value['gender_name'];
                    $data[$key]['age'] = $value['age'];
                    $data[$key]['birthday'] = $value['birthday'];
                    $data[$key]['nation'] = $value['nation'];
                    $data[$key]['job'] = $value['job'];
                    $data[$key]['identity'] = $value['identity'];
                    $data[$key]['phone'] = $value['phone'];
                }
                $filename = '职工名单';
                $headArr = array('单位名称', '姓名', '身份证号', '性别', '年龄', '出生日期', '民族', '职级', '职务', '个人身份', '联系方式');
                $this->xlsout($filename, $headArr, $data);
            } else {
                $this->error('没有相关数据');
            }
            die;
        } else {
            $this->error('参数丢失');
        }
    }
}