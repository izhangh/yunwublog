<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo (C("WEB_TITLE")); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- 引入css或js文件 -->
    <!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/bootstrap/css/bootstrap.min.css">

<!-- font-awesome字体 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/font-awesome/css/font-awesome.min.css">

<!--select下拉框美化-->
<link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/select/bootstrap-select.min.css">

<!--select下拉框美化-->
<link rel="stylesheet" href="__PUBLIC__/common/lib/jquery/tablesorter/style.css">

<!--bootstrap表单验证-->
<link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/validate/bootstrapValidator.min.css">

<!-- 自定义样式-->
<link rel="stylesheet" href="__PUBLIC__/common/css/admin.css">

<!--[if lt IE 9]>
<script src="__PUBLIC__/common/lib/html5shiv.min.js"></script>
<script src="__PUBLIC__/common/lib/respond.min.js"></script>
<![endif]-->
    <script>
        var CurrentPage = "<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>";
    </script>
    <!-- ------------------being block------------------- -->
    


    <!-- ------------------ end block ------------------- -->
</head>
<body ondrag="return false" ondragstart="return false;">
<!-- ConfirmModal begin -->
<div class="modal fade" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>ConfirmModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnClose<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                <h4 class="modal-title" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>ConfirmModalLabel">提示</h4>
            </div>
            <div class="modal-body text-center fontsize20">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnCancel<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>">取消</button>
                <button type="button" class="btn btn-success" id="btnConfirm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>">确定</button>
            </div>
        </div>
    </div>
</div>
<!-- ConfirmModal end -->

<!-- FromModal begin -->
<div class="modal fade" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCloseHandleForm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                <h4 class="modal-title" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModalLabel">弹出框</h4>
            </div>
            <div class="modal-body">
                <!-- ------------------being block------------------- -->
                
    <form class="form-horizontal" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm" name="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm" action="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/handle');?>" method="post">
        
        <div class="form-group">
            <label class="col-sm-3 control-label">县局名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" data-bv-field="name" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">登录密码:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="pwd" name="pwd" data-bv-field="pwd" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">确认密码:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="repwd" name="repwd" data-bv-field="repwd" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">管理员姓名:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="manage_name" name="manage_name" data-bv-field="manage_name" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">联系方式:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="manage_phone" name="manage_phone" data-bv-field="manage_phone" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">备注:</label>
            <div class="col-sm-9">
                <textarea class="form-control" style="resize:vertical;" id="remark" name="remark" value="" ></textarea>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="col-sm-12">
                <input type='hidden' name='id' id='id' value='' />
                <input type='hidden' name='_method_' id='_method_' value='add' />
                <button type="submit" class="btn btn-success" data-loading-text="正在提交..." autocomplete="off">提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelHandleForm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>">取消</button>
            </div>
        </div>
    </form>

                <!-- ------------------ end block ------------------- -->
            </div>
        </div>
    </div>
</div>
<!-- FromModal end -->

<div class="container-fluid clearfix hdc_header">
    <div class="container nopadding center-block clearfix">
        <div class="pull-left">
            <a href="<?php echo U(MODULE_NAME.'/index');?>" class="logo"></a>
        </div>
        <div class="pull-right">
            <a href="<?php echo U('User/index');?>"><i class="fa fa-user"></i>欢迎您<span class="hidden-xs hidden-sm">，<?php echo (session('userRealName')); ?></span></a>
            <a href="<?php echo U('Index/Index/index');?>"><i class="fa fa-home"></i>回到首页</a>
            <a href="<?php echo U('Public/logout');?>"><i class="fa fa-power-off"></i>退出</a>
        </div>
    </div>
</div>
<div class="container bordercomm nopadding bgfff clearfix">
    <!-- LeftNav-->
    <div class="col-md-2 hidden-xs nopadding" id="leftNav">
        <a class="thumbnail noborder nomargin mt25" href="<?php echo U('User/index');?>">
            <img src="__PUBLIC__/common/image/<?php echo (session('userImg')); ?>" class="img-thumbnail" style="width:70%" alt="<?php echo (session('userRealName')); ?>">
            <div class="caption text-center">
                <p>欢迎您，<?php echo (session('userRealName')); ?></p>
            </div>
        </a>
        <div class="list-group bordercommt nomargin menu">
            <?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_vo): $mod = ($i % 2 );++$i; if(authcheck($menu_vo['alink'], session('userId'))): ?><a href="<?php echo U(MODULE_NAME.'/'.$menu_vo['alink']);?>" class="list-group-item <?php if(($menu_vo["is_cur"]) == "1"): ?>active<?php endif; ?>">
                        <i class="fa fa-<?php echo ($menu_vo['icon']); ?>"></i> <?php echo ($menu_vo['name']); ?>
                    </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="list-group bordercommt menu">
            <?php if(is_array($channel_list)): $i = 0; $__LIST__ = $channel_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$channel_vo): $mod = ($i % 2 );++$i; if(authcheck($channel_vo['check_link'], session('userId'))): ?><a href="<?php echo ($channel_vo['alink']); ?>" style="margin-left:10px;" class="list-group-item <?php if(($channel_vo["is_cur"]) == "1"): ?>active<?php endif; ?>">
                        <i class="fa fa-<?php echo ($channel_vo['icon']); ?>"></i> <?php echo ($channel_vo['name']); ?>
                    </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!-- RightContent -->
    <div class="col-md-10 col-xs-12 nopadding bordercomml" id="rightContent" style="margin-left:-1px;min-height:600px;">
        <div class="container-fluid">
            
    <div class="row">
        <div class="col-md-12 p15 p25">
            <div class="page-header clearfix">
                <h3 class="pull-left nomargin"><i class='fa fa-<?php echo ($_SESSION['curMenu']['icon']); ?>'></i><?php echo ($_SESSION['curMenu']['name']); ?></h3>
            </div>
			<!-- search begin 如果需要特殊处理，粘贴过来就行 -->
            <div class="clearfix">
	<form class="form-horizontal" action="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/'.ACTION_NAME);?>" method="POST">
		<div class="form-group">
			<div class="col-xs-6 col-sm-6 col-md-4">
				<input class="pull-left form-control" name="keys" id="keys" value="<?php echo ($_REQUEST['keys']); ?>" placeholder="请输入关键字">
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 nopadding">
				<button type="submit" class="pull-left btn btn-primary">搜索</button>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-3 col-md-offset-3 text-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-action="add" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus nomargin"></i>&nbsp;添加</button>
			</div>
		</div>
	</form>
</div>
            <!-- search end -->
            <div class="panel panel-default">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-advanced tablesorter tb-sticky-header">
                        <thead>
                            <tr>
                                <th class="hidden-xs" width="40">#</th>
                                <th>县局名称</th>
                                <th class="hidden-xs" width="160">管理员</th>
                                <th class="hidden-xs">联系方式</th>
                                <th width="150">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $key = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                                    <td class="hidden-xs"><?php echo ($key); ?></td>
                                    <td><?php echo ($vo['name']); ?></td>
                                    <td class="hidden-xs"><?php echo ($vo['manage_name']); ?></td>
                                    <td class="hidden-xs"><?php echo ($vo['manage_phone']); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                        <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo ($show); ?>
        </div>
    </div>

        </div>
    </div>
</div>
<div class="foot text-center">
    <p><?php echo (C("WEB_COPYRIGHT")); ?></p>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="__PUBLIC__/common/lib/jquery/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="__PUBLIC__/common/lib/bootstrap/bootstrap/js/bootstrap.min.js"></script>

<!--表单验证-->
<script src="__PUBLIC__/common/lib/bootstrap/validate/bootstrapValidator.min.js"></script>
<script src="__PUBLIC__/common/lib/bootstrap/validate/zh_CN.js"></script>

<!--表格排序-->
<script src="__PUBLIC__/common/lib/jquery/tablesorter/jquery.tablesorter.min.js"></script>

<!--select下拉框美化-->
<script src="__PUBLIC__/common/lib/bootstrap/select/bootstrap-select.min.js"></script>
<script src="__PUBLIC__/common/lib/bootstrap/select/bootstrap-select-zh_CN.min.js"></script>

<!-- 自定义JS-->
<script src="__PUBLIC__/common/js/admin.js"></script>
<!-- ------------------being block------------------- -->

    <script>
        $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            if(action == 'add') {
                modal.find('.modal-title').html("<i class='fa fa-plus-circle'></i>添加信息");
                $('#_method_').val(action);
            } else if(action == 'edit') {
                modal.find('.modal-title').html("<i class='fa fa-edit'></i>修改信息");
                var menuList = <?php echo json_encode($list);?>;
                var obj = parseInt(button.data('obj')) - 1;
                $('.selectpicker').selectpicker('val', menuList[obj].pid);
                $('#name').val(menuList[obj].name);
                $('#pwd').val();
                $('#manage_name').val(menuList[obj].manage_name);
                $('#manage_phone').val(menuList[obj].manage_phone);
                $('#remark').val(menuList[obj].remark);
                $('#id').val(menuList[obj].id);
                $('#_method_').val(action);
            }
        })

        $(document).ready(function() {
        	$('#btnCancelHandleForm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>').bind('click', function() {
                $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator('disableSubmitButtons', false).bootstrapValidator('resetForm', true);             // Reset the form
            })
            $('#btnCloseHandleForm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>').bind('click', function() {
                $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator('disableSubmitButtons', false).bootstrapValidator('resetForm', true);             // Reset the form
            })
            $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator({
                message: '您输入的信息有误，请仔细检查！',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: '县局名称必须'
                            }
                        }
                    },
                    pwd: {
                        validators: {
                            notEmpty: {
                                message: '登录密码必须'
                            },
                            stringLength: {
                                min: 5,
                                message: '密码必须大于五个字符'
                            }
                        }
                    },
                    repwd: {
                        validators: {
                            notEmpty: {
                                message: '登录密码必须'
                            },
                            stringLength: {
                                min: 5,
                                message: '密码必须大于五个字符'
                            },
                            identical: {
                                field: 'pwd',
                                message: '两次密码必须相同'
                            }
                        }
                    },
                    manage_name: {
                        validators: {
                            notEmpty: {
                                message: '管理员姓名必须'
                            }
                        }
                    },
                    manage_phone: {
                        validators: {
                            notEmpty: {
                                message: '联系方式必须'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                e.preventDefault();
                var $form = $(e.target);    //获取表单实例
                var bv = $form.data('bootstrapValidator');  //获取bootstrap实例
                //对modal处理
                $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').find('button').attr('disabled', true);     // 禁用所有删除按钮
                $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').modal('hide');   //隐藏HandleFormModal
                confirmModalOpen('数据正在处理，请稍等...', '0', ' fa-spinner fa-spin ');     // 提示信息
                //ajax处理
                ajaxDo($form.attr('action'), $form.serialize(), "POST");
                if(ajaxReturnData.status == '200') {
                    confirmModalInfo(ajaxReturnData.info, ' fa-check ');
                    setTimeout(function() {
                    	window.location.replace(window.location.href);
                    }, 1000);
                } else if(ajaxReturnData.status == '300') {
                    confirmModalInfo(ajaxReturnData.info, '');
                    setTimeout(function() {
                        confirmModalClose();
                        $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').find('button').removeAttr('disabled');     // 恢复按钮
                        $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').modal({
                            backdrop: 'static',
                            keyboard: false,
                            show: true
                        });   //显示HandleFormModal，保持原样
                    }, 1000);
                }
            });;
        });
    </script>

<!-- ------------------ end block ------------------- -->
</body>
</html>