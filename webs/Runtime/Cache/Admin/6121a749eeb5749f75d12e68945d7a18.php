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
                
    <form class="form-horizontal" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm" name="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm" action="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/handle');?>" method="post" enctype="multipart/form-data">
        <div class="form-group" id="pic_div" style="display: none;">
            <label class="col-sm-2 control-label">已有照片:</label>
            <div class="col-sm-10">
                <img src="" alt="" id="pic_img" width="100" height="100" />
                <input type="hidden" name="pic_old" id="pic_old" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">上传照片:</label>
            <div class="col-sm-10">
                <span class="btn btn-info fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>选择文件</span>
                    <input id="fileupload" type="file" name="fileupload">
                    <input type="hidden" name="pic" id="pic" value="">
                </span>
                <p style="display: inline-block;">只支持jpg、jpeg、png格式，大小不能超过2M</p>
                <div id="progress" class="progress nomargin">
                    <div class="progress-bar progress-bar-success"></div>
                </div>
                <div class="alert alert-danger nomargin" id="pic_tip_info" style="display:none;" role="alert"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">链接地址:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alink" name="alink" data-bv-field="alink" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">标题:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" data-bv-field="name" value="" />
                <p class="help-block">(选填).</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">图片描述:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="description" name="description" data-bv-field="description"></textarea>
                <p class="help-block">(选填).</p>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="col-sm-12">
                <input type='hidden' name='id' id='id' value='' />
                <input type='hidden' name='handle_method' id='handle_method' value='add' />
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
                                <th>图片</th>
                                <th class="hidden-xs">标题</th>
                                <th width="150">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $key = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                                    <td class="hidden-xs"><?php echo ($key); ?></td>
                                    <td>
                                        <a href="<?php echo ($vo['alink']); ?>" target="_blank">
                                            <img src="__ROOT__<?php echo ($vo['pic']); ?>" alt="首页滚动图" height="50">
                                        </a>
                                    </td>
                                    <td class="hidden-xs"><a href="<?php echo ($vo['alink']); ?>" target="_blank"><?php echo ($vo['name']); ?></a></td>
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

    <script src="__PUBLIC__/common/lib/jquery/fileupload/jquery.ui.widget.js"></script>
    <script src="__PUBLIC__/common/lib/jquery/fileupload/jquery.iframe-transport.js"></script>
    <script src="__PUBLIC__/common/lib/jquery/fileupload/jquery.fileupload.js"></script>
    <script>
        $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var actionMethod = button.data('action');
            var modal = $(this);
            $('#fileupload').fileupload('enable');
            $('#fileupload').removeAttr('disabled');
            if(actionMethod == 'add') {
                $('#pic_div').hide();
                $('#pic_img').attr('src', '')
                modal.find('.modal-title').html("<i class='fa fa-plus-circle'></i>添加信息");
                $('#handle_method').val(actionMethod);
            } else if(actionMethod == 'edit') {
                modal.find('.modal-title').html("<i class='fa fa-edit'></i>修改信息");
                var dataList = <?php echo json_encode($list);?>;
                var obj = parseInt(button.data('obj')) - 1;

                if(dataList[obj].pic) {
                    $('#pic_div').show();
                    $('#pic_img').attr('src', '__ROOT__' + dataList[obj].pic);
                    $('#pic_old').val(dataList[obj].pic);
                }
                $('#name').val(dataList[obj].name);
                $('#description').val(dataList[obj].description);
                $('#alink').val(dataList[obj].alink);
                $('#id').val(dataList[obj].id);
                $('#handle_method').val(actionMethod);
            }
        })

        $(document).ready(function() {
            $('#btnCancelHandleForm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>').bind('click', function() {
                $('#pic_div').hide();
                $('#pic_tip_info').hide();
                $('#pic_img').attr('src', '');
                $('#progress .progress-bar').css('width', '0%');
                $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator('disableSubmitButtons', false).bootstrapValidator('resetForm', true);             // Reset the form
            })
            $('#btnCloseHandleForm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>').bind('click', function() {
                $('#pic_div').hide();
                $('#pic_tip_info').hide();
                $('#pic_img').attr('src', '');
                $('#progress .progress-bar').css('width', '0%');
                $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator('disableSubmitButtons', false).bootstrapValidator('resetForm', true);             // Reset the form
            })
            $('#fileupload').fileupload({
                url: "<?php echo U(MODULE_NAME.'/uploadPic');?>",
                dataType: 'json',
                autoUpload: true,
                done: function (e, data) {
                    $('#pic_tip_info').html(data.result.info).show();
                    if(data.result.status == '300') {
                        $('#fileupload').fileupload('enable');
                        $('#fileupload').removeAttr('disabled');
                    } else if(data.result.status == '200') {
                        var path = data.result.data;
                        $('#pic').val(path);
                        $('#pic_img').attr('src', '__ROOT__' + path);
                        $('#pic_div').show();
                        $('#fileupload').fileupload('disable');
                        $('#fileupload').attr('disabled', 'disabled');
                    }
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                            'width',
                            progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
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
                            stringLength: {
                                min: 0,
                                max: 100,
                                message: '1-100个字符以内'
                            }
                        }
                    },
                    alink: {
                        validators: {
                            notEmpty: {
                                message: '超链接必须'
                            },
                            uri: {
                                message: '地址类型错误，参考地址：http://www.baidu.com'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                e.preventDefault();
                var $form = $(e.target);    //获取表单实例
                var bv = $form.data('bootstrapValidator');  //获取bootstrap实例
                if(($('#handle_method').val() == 'add' && $('#pic').val() == '') || ($('#handle_method').val() == 'edit' && $('#pic_old').val() == '' && $('#pic').val() == '')) {
                    $('#pic_tip_info').html("请上传图片").show();
                    $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator('disableSubmitButtons', false);
                } else {
                    //对modal处理
                    $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').find('button').attr('disabled', true);     // 禁用所有删除按钮
                    $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').modal('hide');   //隐藏HandleFormModal
                    confirmModalOpen('数据正在处理，请稍等...', '0', ' fa-spinner fa-spin ');     // 提示信息
                    //ajax处理
                    ajaxDo($form.attr('action'), $form.serialize(), "POST");
                    if (ajaxReturnData.status == '200') {
                        confirmModalInfo(ajaxReturnData.info, ' fa-check ');
                        setTimeout(function () {
                            window.location.replace(window.location.href);
                        }, 1000);
                    } else if (ajaxReturnData.status == '300') {
                        confirmModalInfo(ajaxReturnData.info, '');
                        setTimeout(function () {
                            confirmModalClose();
                            $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').find('button').removeAttr('disabled');     // 恢复按钮
                            $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleFormModal').modal({
                                backdrop: 'static',
                                keyboard: false,
                                show: true
                            });   //显示HandleFormModal，保持原样
                        }, 1000);
                    }
                }
            });;
        });
    </script>

<!-- ------------------ end block ------------------- -->
</body>
</html>