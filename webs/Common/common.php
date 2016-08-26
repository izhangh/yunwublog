<?php
	// +----------------------------------------------------------------------
	// | 作   者: zhangh <izhangh@outlook.com>
	// +----------------------------------------------------------------------
	// | 创建日期: 2015-06-16
	// +----------------------------------------------------------------------
	// | 文件描述: 项目全局公用函数
	// +----------------------------------------------------------------------
	// | 升级记录:
	// +----------------------------------------------------------------------

	/**
	 * 获取省份列表
	 * @return array
	 */
	function get_province_list() {
		$model = new ProvinceModel();
		$data = $model->field("code, name")->select();
		return $data;
	}
	
	/**
	 * 根据省份编码获取市州列表
	 * @param string $province_code
	 * @return array
	 */
	function get_city_list($province_code) {
		$model = new CityModel();
		$data = $model->field("code, name")
					  ->where("province_code = '".$province_code."'")
					  ->select();
		return $data;
	}
	
	/**
	 * 根据市州编码获取县区列表
	 * @param string $city_code
	 * @return string
	 */
	function get_area_list($city_code) {
		$model = new AreaModel();
		$data = $model->field("code, name")
					  ->where("city_code = '".$city_code."'")
					  ->select();
		return $data;
	}

	/**
	 * 删除指定地址下的文件
	 * @param string $path 文件路径
	 */
	function delFile($path) {
		try {
      		if(file_exists($path)) {
       			unlink($path);
      		}
      	} catch (Exception $e) {
      		echo $e->getMessage();
      	}
	}
	
	/**
	 * 将文件大小换算成合适的单位
	 * @param int $size
	 * @return $size
	 */
	function convertSize($size) {
		// Adapted from: http://www.php.net/manual/en/function.filesize.php  
		$mod = 1024;
		$units = explode(' ', 'B KB MB GB TB PB');
		for($i = 0; $size > $mod; $i ++) {
			$size /= $mod;
		}
		return round($size, 2).' '.$units[$i];
	}

    /**
     * 检查权限
     * @param name string|array  需要验证的规则列表,支持逗号分隔的权限规则或索引数组
     * @param uid  varchar       认证用户的id
     * @param type  int          类别
     * @param string mode        执行check的模式
     * @param relation string    如果为 'or' 表示满足任一条规则即通过验证;如果为 'and'则表示需满足所有规则才能通过验证
     * @return boolean           通过验证返回true;失败返回false
     */
    function authcheck($name, $uid, $type=1, $mode='url', $relation='or') {
        if($uid !== C("ADMINISTRATOR")) {
            import('ORG.Util.Auth');//加载类库
            $auth = new Auth();
            return $auth->check($name, $uid, $type, $mode, $relation)?true:false;
        }else{
            return true;
        }
    }

    /**
     * 根据pid level获取导航树
     * @param string $pid
     * @param int $level
     * @param int $db
     * @return array
     */
    function cateTree($pid = '0', $level = 0, $db = 0) {
        $cate = M(''.$db.'');
        $array = array();
        $tmp = $cate->where(array('pid'=>$pid))->order("sort")->select();
        if(is_array($tmp)) {
            foreach($tmp as $v) {
                $v['level'] = $level;
                $sub = cateTree($v['id'], $level + 1, $db);
                if(!empty($sub)) {
                    $v['is_parent'] = '1';
                }
                $array[count($array)] = $v;
                if(is_array($sub))
                    $array = array_merge($array, $sub);
            }
        }
        return $array;
    }

    function orgcateTree($pid = '0', $level = 0, $type = 0) {
        $cate = M('auth_group');
        $array = array();
        $tmp = $cate->where(array('pid'=>$pid, 'type'=>$type))->order("sort")->select();
        if(is_array($tmp)) {
            foreach($tmp as $v) {
                $v['level'] = $level;
                $array[count($array)] = $v;
                $sub = orgcateTree($v['id'], $level+1, $type);
                if(is_array($sub))
                    $array = array_merge($array,$sub);
            }
        }
        return $array;
    }

    /**
     * 字符串截取，支持中文和其他编码
     * @static
     * @access public
     * @param string $str 需要转换的字符串
     * @param int $start 开始位置
     * @param int $length 截取长度
     * @return string
     */
    function msubstr($str, $start = 0, $length = 1) {
        $charset="utf-8";
        $suffix=true;
        if(function_exists("mb_substr"))
            $slice = mb_substr($str, $start, $length, $charset);
        elseif(function_exists('iconv_substr')) {
            $slice = iconv_substr($str,$start,$length,$charset);
            if(false === $slice) {
                $slice = '';
            }
        }else{
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("",array_slice($match[0], $start, $length));
        }
        return $suffix ? $slice.'' : $slice;
    }

    /**
     * 密码加密
     * @param $data
     * @return string
     */
    function encrypt($data) {
        return md5(md5(C('AUTH_MASK') . $data));
    }

    //html代码输出
    function html_out($str){
        if(function_exists('htmlspecialchars_decode')){
            $str=htmlspecialchars_decode($str);
        }else{
            $str=html_entity_decode($str);
        }
        $str = stripslashes($str);
        return $str;
    }