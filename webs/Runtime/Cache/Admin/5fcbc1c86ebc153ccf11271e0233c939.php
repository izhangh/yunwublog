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
            <a class="hidden-xs" href="<?php echo U('User/index');?>"><i class="fa fa-user"></i>欢迎您<span class="hidden-xs hidden-sm">，<?php echo (session('userRealName')); ?></span></a>
            <a class="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要清除缓存嘛?" data-objurl="<?php echo U(GROUP_NAME.'/Index/delRuntime');?>"><i class="fa fa-times-circle"></i>清除缓存</a>
            <a class="hidden-xs" href="<?php echo U('Public/logout');?>"><i class="fa fa-power-off"></i>退出</a>
            <a class="visible-xs-inline" href="javascript:" id="toggleLeftNav"><i class="fa fa-list"></i>功能菜单</a>
        </div>
    </div>
</div>

<div class="container bordercomm nopadding bgfff clearfix">
    <!-- LeftNav-->
    <div class="col-md-2 hidden-xs nopadding hidden-xs" id="leftNav">
        <a class="hidden-xs thumbnail noborder nomargin mt25" href="<?php echo U('User/index');?>">
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
    <div class="container-fluid" style="margin-top:20px;padding-left:5px;padding-right:5px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-advanced tablesorter tb-sticky-header">
                            <thead>
                            <tr>
                                <th class="hidden-xs" width="40">#</th>
                                <th>展示表格表格</th>
                                <th width="150">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden-xs"><?php echo ($vo['sort']); ?></td>
                                <td>展示表格表格</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal" data-obj="<?php echo ($key); ?>" data-whatever="@edit_<?php echo ($vo['id']); ?>" data-action="edit" data-backdrop="static" data-keyboard="false">修改</button>
                                    <button class="btn btn-danger <?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>DelBtn" data-info="您确定要删除嘛?" data-objurl="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/del', array('id' => $vo['id']));?>">删除</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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


<!-- ------------------ end block ------------------- -->
</body>
</html>