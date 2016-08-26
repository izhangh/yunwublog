<?php
// +------------------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +------------------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +------------------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +------------------------------------------------------------------------------
// | Author: liu21st <>
// +------------------------------------------------------------------------------
// | Mark: The corrected page class is just for home page on every modules of TPD
// +------------------------------------------------------------------------------
// $Id$


class Page extends Think {
	// 起始行数
	public $firstRow;
	// 列表每页显示行数
	public $listRows = 20;
	// 页数跳转时要带的参数
	public $parameter;
	// 分页总页面数
	protected $totalPages;
	// 总行数
	protected $totalRows;
	// 当前页数
	protected $nowPage;
	// 分页上下栏显示的页数
	protected $roundPage;
	// 分页栏首页
	protected $theHead;
	// 分页栏尾页
	protected $theLast;
	// 分页显示定制
	protected $script;
	protected $up;
	protected $down;
//	protected $config = array ('header' => '条记录', 'prev' => '上一页', 'next' => '下一页', 'first' => '第一页', 'last' => '最后一页', 'theme' => ' %totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %script% %up% %linkPage% %down% %nextPage% %end%' );
//	protected $config = array ('header' => '条记录', 'prev' => '<', 'next' => '>', 'first' => '<<', 'last' => '>>', 'theme' => ' %downPage% %linkPageList% %first%  %script% %up% %linkPage% %down% %nextPage% %end%' );
	protected $config = array ('header' => '条记录', 'prev' => '<', 'next' => '>', 'first' => '<<', 'last' => '>>', 'theme' => '%totalRow% %header% %nowPage%/%totalPage% 页  %upPage% %linkPageList% %downPage%' );
	 // 默认分页变量名
    protected $varPage;
	
	
	/**
     +----------------------------------------------------------
	 * 架构函数
     +----------------------------------------------------------
	 * @access public
     +----------------------------------------------------------
	 * @param array $totalRows 总的记录数
	 * @param array $listRows 每页显示记录数
	 * @param array $parameter 分页跳转的参数
     +----------------------------------------------------------
	 */
	public function __construct($totalRows, $listRows, $parameter = '') {
		$this->totalRows = $totalRows;
		$this->parameter = $parameter;
        $this->varPage      =   C('VAR_PAGE') ? C('VAR_PAGE') : 'p' ;
		$this->roundPage = C ( 'ROUND_PAGE' );
		$this->listRows = ! empty ( $listRows ) ? $listRows : C ( 'PAGE_LISTROWS' );
		$this->totalPages = ceil ( $this->totalRows / $this->listRows ); //总页数
		$this->nowPage = ! empty ( $_GET [$this->varPage] ) ? $_GET [$this->varPage] : 1;
		if (! empty ( $this->totalPages ) && $this->nowPage > $this->totalPages) {
			$this->nowPage = $this->totalPages;
		}
		$this->firstRow = $this->listRows * ($this->nowPage - 1);
	}
	
	public function setConfig($name, $value) {
		if (isset ( $this->config [$name] )) {
			$this->config [$name] = $value;
		}
	}
	
	/**
     +----------------------------------------------------------
	 * 分页显示输出
     +----------------------------------------------------------
	 * @access public
     +----------------------------------------------------------
	 */
	public function show() {
		if ($this->listRows >= $this->totalRows)
			return '';
		$p = C ( 'VAR_PAGE' );
		$url = $_SERVER ['REQUEST_URI'] . (strpos ( $_SERVER ['REQUEST_URI'], '?' ) ? '' : "?") . $this->parameter;
		$parse = parse_url ( $url );
		if (isset ( $parse ['query'] )) {
			parse_str ( $parse ['query'], $params );
			unset ( $params [$p] );
			$url = $parse ['path'] . '?' . http_build_query ( $params );
		}
		//上下翻页字符串
		$upRow = $this->nowPage - 1;
		$downRow = $this->nowPage + 1;
		if ($upRow > 0) {
			$theFirst = "<a href='" . $url . "&" . $p . "=1' >" . $this->config ['first'] . "</a>";
			$upPage = "<a href='" . $url . "&" . $p . "=$upRow'>" . $this->config ['prev'] . "</a>";
		} else {
			$theFirst = $this->config ['first'];
			$upPage = $this->config ['prev'];
		}
		
		if ($downRow <= $this->totalPages) {
			$downPage = "<a href='" . $url . "&" . $p . "=$downRow'>" . $this->config ['next'] . "</a>";
		} else {
			$theFirst = "<a href='" . $url . "&" . $p . "=1' >" . $this->config ['first'] . "</a>";
			$downPage = $this->config ['next'];
		}
		
		// << < > >>
		if ($this->nowPage == 1) { // 首页
            $theFirst   =   '';
            $prePage    =   '';
            $upPage		=	'';
            $theEnd     =   "<a href='".str_replace('__PAGE__',$this->totalPages,$url)."'>".$this->config['last']."</a>";
		} elseif ($this->nowPage == $this->totalPages) { //最后一页
			$theFirst = "<a href='" . $url . "&" . $p . "=1'>" . $this->config ['first'] . "</a>";
            $nextPage   =   '';
            $downPage	=	'';
            $theEnd     =   '';
		} else {
			$theFirst = "<a href='" . $url . "&" . $p . "=1'>" . $this->config ['first'] . "</a>";
            $theEnd     =   "<a href='" . $url . "&" . $p . "=".$this->totalPages."'>".$this->config['last']."</a>";
		}
		// 1 2 3 4 5
		$linkPageList = "";
        for($i=1;$i<=$this->totalPages;$i++){
            if($i!=$this->nowPage){
            	if($i == 1) {
            		$linkPageList .= "&nbsp;<a href='".str_replace('__PAGE__', $i, $url)."&".$p."=".$i."'>&nbsp;".$i."&nbsp;</a>";
            		if($this->nowPage - $i > $this->roundPage + 1) {
            			$linkPageList .= "&nbsp;...&nbsp;";
            		}
            	} elseif(abs($i-$this->nowPage) <= $this->roundPage) {
                    $linkPageList .= "&nbsp;<a href='".str_replace('__PAGE__', $i, $url)."&".$p."=".$i."'>&nbsp;".$i."&nbsp;</a>";
                } elseif ($i == $this->totalPages){
            		if($i - $this->nowPage > $this->roundPage + 1) {
            			$linkPageList .= "&nbsp;...&nbsp;";
            		}
            		$linkPageList .= "&nbsp;<a href='".str_replace('__PAGE__', $i, $url)."&".$p."=".$i."'>&nbsp;".$i."&nbsp;</a>";
                } else {
                    continue;
                }
            }else{
                if($this->totalPages != 1){
                    $linkPageList .= "&nbsp;<span class='current'>".$i."</span>";
                }
            }
        }
        //<script><select/></script>
		$script = '<script type="text/javascript">
			function MM_jumpMenu(selObj){ //v3.0
			var url = selObj.options[selObj.selectedIndex].value;
			window.location.href = url;
		}
		</script>';
		
		$up = '<select name="jumpMenu" id="jumpMenu" class="page_jump_select" onchange="MM_jumpMenu(this)">';
		$linkPage = "";
		$down = '</select>';
		$selected = "";
		
		for($i = 1; $i <= $this->totalPages; $i ++) {
			if ($i != $this->nowPage) {
				
				if ($i <= $this->totalPages) {
					$ul = $url . "&". $p . "=" . $i;
					if ($this->nowPage == $i) {//判断当点跳转菜单显示的页
						$selected = 'selected="selected"';
						$linkPage .= "<option value=\"$ul\" $selected >第 $i 页</option>";
					
					} else {
						$linkPage .= "<option value=\"$ul\">第 $i 页</option>";
					}
				} else {
					break;
				}
			} else {
				if ($this->totalPages != 1) {
					if ($this->nowPage == $i) {//判断当点跳转菜单显示的页面
						$selected = 'selected="selected"';
						$linkPage .= "<option value=\"$ul\" $selected >第 $i 页</option>";
					} else {
						$linkPage .= "<option value=\"$ul\">第 $i 页</option>";
					}
				} else {
					$linkPage .= "<option>总页数</option><option value=\"$ul\" $selected >第 1 页</option>";
				}
			}
		}
		
										//%totalRow% %header% %nowPage%/%totalPage% 页  %downPage% %linkPageList% %upPage%
		
		$pageStr = str_replace ( array ('%header%', '%nowPage%', '%totalRow%', '%totalPage%', '%linkPageList%', '%upPage%', '%downPage%', '%theFirst%', '%theEnd%' ), 
								 array ($this->config ['header'], $this->nowPage, $this->totalRows, $this->totalPages, $linkPageList, $upPage, $downPage, $theFirst, $theEnd), 
						 		 $this->config ['theme'] );
		return $pageStr;
	}
	
	public function show_ex() {
        if(0 == $this->totalRows) return '';
        $p              =   $this->varPage;
        $nowCoolPage    =   ceil($this->nowPage/$this->rollPage);
        if($this->nowPage < 1){
            $this->nowPage  =   1;
        }elseif(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage  =   $this->totalPages;
        }

        // 分析分页参数
        if($this->url){
            $depr       =   C('URL_PATHINFO_DEPR');
            $url        =   rtrim(U('/'.$this->url,'',false),$depr).$depr.'__PAGE__';
        }else{
            if($this->parameter && is_string($this->parameter)) {
                parse_str($this->parameter,$parameter);
            }elseif(is_array($this->parameter)){
                $parameter      =   $this->parameter;
            }elseif(empty($this->parameter)){
                unset($_GET[C('VAR_URL_PARAMS')]);
                //$var =  !empty($_POST)?$_POST:$_GET;
                //为了兼容get传过来的参数  by  xinglou 2015-10-2 
                $var =  $_REQUEST;
                unset($var[$p]);
                unset($var['numPerPage']);
                if(empty($var)) {
                    $parameter  =   array();
                }else{
                    $parameter  =   $var;
                }
            }
            $parameter[$p]  =   '__PAGE__';
            $url            =   U('',$parameter);
        }
        if(false !== strstr($url, 'numPerPage')) {
        	$url = substr($url, 0, strpos($url, 'numPerPage') - 1);
        }
        //<script><select/></script>
		$pageStr = '<script type="text/javascript">
			function PageEnterPress(obj, e){
				var nowPage = obj.value;
				var selObj = document.getElementById("pageJumpSelect");
				var numPerPage = selObj.options[selObj.selectedIndex].value;
				var e = e || window.event;
				if(e.keyCode == 13){
					window.location.href = "'.str_replace('__PAGE__','"+nowPage+"',$url).'&numPerPage="+numPerPage;
				}
			}
			function pageJump(selObj) { //v3.0
				var numPerPage = selObj.options[selObj.selectedIndex].value;
				window.location.href = "'.str_replace('__PAGE__','1',$url).'&numPerPage="+numPerPage;
			}
		</script>';
        // 组装分页字符串
        $pageStr .= '<div class="form-group page_ex">
						<div class="col-md-12">
							<div class="col-sm-12 input-group">
								第 &nbsp; ';
        
        //上下翻页字符串
        $upRow          =   $this->nowPage-1;
        $downRow        =   $this->nowPage+1;
        
        if($this->nowPage != 1) {
        	$pageStr .= '<a href="'.str_replace('__PAGE__',$upRow,$url)."&numPerPage=".$_REQUEST['numPerPage'].'" class="prev"><i class="icon icon-chevron-left"></i></a>';
        } else {
        	$pageStr .= '<span class="prev" style="cursor:default;"><i class="icon icon-chevron-left"></i></span>';
        }
        $pageStr .= '&nbsp;&nbsp;<input type="text" maxlenght="5" value="'.$this->nowPage.'" class="form-control tc" style="width:50px; float:none;" onkeypress="PageEnterPress(this, event)" onkeydown="PageEnterPress(this, event)"/>&nbsp;&nbsp;';
        if($this->nowPage != $this->totalPages) {
        	$pageStr .= '<a href="'.str_replace('__PAGE__',$downRow,$url)."&numPerPage=".$_REQUEST['numPerPage'].'" class="next"><i class="icon icon-chevron-right"></i></a>';
        } else {
        	$pageStr .= '<span class="next" style="cursor:default;"><i class="icon icon-chevron-right"></i></span>';
        }
        $pageStr .= '&nbsp; 页&nbsp;共 '.$this->totalPages.' 页 | ';
        $pageStr .= '每页显示 &nbsp;
					<select class="form-control" style="width:75px; float:none;" id="pageJumpSelect" onchange="javascript:pageJump(this);">
						<option value="1" '.($_REQUEST['numPerPage'] == '1' ? 'selected="selected"' : '').'>1</option>
						<option value="2" '.($_REQUEST['numPerPage'] == '2' ? 'selected="selected"' : '').'>2</option>
						<option value="20" '.($_REQUEST['numPerPage'] == '20' ? 'selected="selected"' : '').'>20</option>
						<option value="50" '.($_REQUEST['numPerPage'] == '50' ? 'selected="selected"' : '').'>50</option>
						<option value="100" '.($_REQUEST['numPerPage'] == '100' ? 'selected="selected"' : '').'>100</option>
						<option value="200" '.($_REQUEST['numPerPage'] == '200' ? 'selected="selected"' : '').'>200</option>
						<option value="500" '.($_REQUEST['numPerPage'] == '500' ? 'selected="selected"' : '').'>500</option>
					</select>';
        $pageStr .= '&nbsp; 条记录 | 共 '.$this->totalRows.' 条记录
					</div>
				</div>
			</div>';
        return $pageStr;
	}

}
?>
