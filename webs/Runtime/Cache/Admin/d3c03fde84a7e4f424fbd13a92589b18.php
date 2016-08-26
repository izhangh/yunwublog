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
            <div class="panel-body mt25">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="color:#0095CA;">基础信息修改</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="color:#0095CA;">密码修改</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="panel panel-body mt20">
                            <form class="form-horizontal" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormBaseInfor" name="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormBaseInfor" action="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/handle');?>" method="post">
                                <div class="form-group">
                                    <label class="col-sm-2 col-md-offset-1 control-label">姓名:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="manage_name" name="manage_name" data-bv-field="manage_name" value="<?php echo ($data['manage_name']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-md-offset-1 control-label">电话:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="manage_phone" name="manage_phone" data-bv-field="manage_phone" value="<?php echo ($data['manage_phone']); ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-md-offset-1 control-label">管理员微信号:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="manage_weixin" name="manage_weixin" data-bv-field="manage_weixin" value="<?php echo ($data['manage_weixin']); ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-md-offset-1 control-label">备注简介:</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" style="resize:vertical;" id="remark" name="remark"><?php echo ($data['remark']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-md-offset-1 control-label">选择头像:</label>
                                    <div class="col-sm-2">
                                        <div class="checkbox">
                                            <label class="nopadding">
                                                <input type="radio" name="img" value="default-user.jpg" <?php if(($data["img"]) == "default-user.jpg"): ?>checked<?php endif; ?>> 默认头像
                                            </label>
                                            <img src="__PUBLIC__/common/image/default-user.jpg" class="img-thumbnail" width="100%" alt="默认头像">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="checkbox">
                                            <label class="nopadding">
                                                <input type="radio" name="img" value="default-male.jpg" <?php if(($data["img"]) == "default-male.jpg"): ?>checked<?php endif; ?>> 我是帅哥
                                            </label>
                                            <img src="__PUBLIC__/common/image/default-male.jpg" class="img-thumbnail" width="100%" alt="默认头像">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="checkbox">
                                            <label class="nopadding">
                                                <input type="radio" name="img" value="default-female.jpg" <?php if(($data["img"]) == "default-female.jpg"): ?>checked<?php endif; ?>> 我是美女
                                            </label>
                                            <img src="__PUBLIC__/common/image/default-female.jpg" class="img-thumbnail" width="100%" alt="默认头像">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-sm-8">
                                        <input type='hidden' name='id' id='base_infor_id' value="<?php echo ($id); ?>" />
                                        <input type='hidden' name='_method_' id='base_info_id_method_' value='edit' />
                                        <button type="submit" class="btn btn-success" data-loading-text="正在提交..." autocomplete="off">确认修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="panel panel-body mt20">
                            <form class="form-horizontal" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormPwdModify" name="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormPwdModify" action="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/handle');?>" method="post">
                                <div class="form-group">
                                    <label class="col-sm-2 col-md-offset-1 control-label">请输入新密码:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="pwd" name="pwd" data-bv-field="pwd" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-md-offset-1 control-label">再次输入新密码:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="re_pwd" name="re_pwd" data-bv-field="re_pwd" value="<?php echo ($data['end_date']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-sm-8">
                                        <input type='hidden' name='id' id='pwd_id' value="<?php echo ($id); ?>" />
                                        <input type='hidden' name='_method_' id='_method_' value='edit' />
                                        <button type="submit" class="btn btn-success" data-loading-text="正在提交..." autocomplete="off">确认修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
        $(document).ready(function() {
            $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormBaseInfor').bootstrapValidator({
                message: '您输入的信息有误，请仔细检查！',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    manage_name: {
                        validators: {
                            notEmpty: {
                                message: '名字不能为空'
                            }
                        }
                    },
                    manage_phone: {
                        validators: {
                            notEmpty: {
                                message: '电话不能为空'
                            }
                        }
                    },
                    manage_weixin: {
                        validators: {
                            notEmpty: {
                                message: '微信不能为空'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                e.preventDefault();
                var $form = $(e.target);    //获取表单实例
                var bv = $form.data('bootstrapValidator');  //获取bootstrap实例
                //对modal处理
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
                    }, 1000);
                }
            });
            $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormPwdModify').bootstrapValidator({
                message: '您输入的信息有误，请仔细检查！',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    pwd: {
                        validators: {
                            notEmpty: {
                                message: '新密码不能为空'
                            }
                        }
                    },
                    re_pwd: {
                        validators: {
                            notEmpty: {
                                message: '请再次输入新密码'
                            },
                            identical: {
                                field: 'pwd',
                                message: '两次输入的新密码不相同'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                e.preventDefault();
                var $form = $(e.target);    //获取表单实例
                var bv = $form.data('bootstrapValidator');  //获取bootstrap实例
                //对modal处理
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
                    }, 1000);
                }
            });
        });
    </script>

<!-- ------------------ end block ------------------- -->
</body>
</html>