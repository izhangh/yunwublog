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
                        <i class="fa fa-file-text-o"></i> <?php echo ($channel_vo['name']); ?>
                    </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!-- RightContent -->
    <div class="col-md-10 col-xs-12 nopadding bordercomml" id="rightContent" style="margin-left:-1px;min-height:600px;">
        <div class="container-fluid">
            
    <div class="container-fluid">
        <div class="row block-index">
            <?php if(is_array($block)): $i = 0; $__LIST__ = $block;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$block_vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-sm-4 col-md-4">
                    <a href="<?php echo ($block_vo['url']); ?>" class="block-a <?php echo ($block_vo['class']); ?> text-center">
                        <div class="block-icon">
                            <i class="fa fa-<?php echo ($block_vo['icon']); ?>"></i><?php echo ($block_vo['num']); ?>
                        </div>
                        <h3><?php echo ($block_vo['name']); ?></h3>
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="container-fluid" style="padding-left:5px;padding-right:5px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel-group mt25" id="checkComboListAccordion" role="tablist" aria-multiselectable="true">
                    <?php if(is_array($checkComboList)): $i = 0; $__LIST__ = $checkComboList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$checkCombo_vo): $mod = ($i % 2 );++$i;?><div class="panel clearfix <?php if(($checkCombo_vo["gender"]) == "a"): ?>panel-info<?php endif; ?> <?php if(($checkCombo_vo["gender"]) == "b"): ?>panel-warning<?php endif; ?> <?php if(($checkCombo_vo["gender"]) == "c"): ?>panel-success<?php endif; ?>">
                            <div class="panel-heading" role="tab" id="head_<?php echo ($checkCombo_vo['id']); ?>">
                                <h3 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#checkComboListAccordion" href="#collapse_<?php echo ($checkCombo_vo['id']); ?>" aria-expanded="true" aria-controls="collapse_<?php echo ($checkCombo_vo['id']); ?>">
                                        <?php echo ($checkCombo_vo['name']); ?><span class="label label-success pull-right"><i class="fa fa-jpy"></i><?php echo ($checkCombo_vo['price']); ?></span>
                                    </a>
                                </h3>
                            </div>
                            <div id="collapse_<?php echo ($checkCombo_vo['id']); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head_<?php echo ($checkCombo_vo['id']); ?>">
                                <?php if(!empty($checkCombo_vo["introduce"])): ?><div class="panel-body">
                                    <p>套餐简介：<?php echo ($checkCombo_vo["introduce"]); ?></p>
                                </div><?php endif; ?>
                                <table class="table table-hover table-bordered table-advanced">
                                    <thead>
                                        <tr>
                                            <th>项目名称</th>
                                            <th>项目单价</th>
                                            <th>项目介绍</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($checkCombo_vo['itemList'])): $i = 0; $__LIST__ = $checkCombo_vo['itemList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item_vo): $mod = ($i % 2 );++$i;?><tr>
                                                <td><?php echo ($item_vo['name']); ?></td>
                                                <td><i class="fa fa-jpy"></i><?php echo ($item_vo['price']); ?></td>
                                                <td><?php echo ($item_vo['introduce']); ?></td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
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


<!-- ------------------ end block ------------------- -->
</body>
</html>