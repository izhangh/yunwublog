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
    
    <link rel="stylesheet" href="__PUBLIC__/editor.md-master/css/editormd.min.css" />

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
            
    <div class="row">
        <div class="col-md-12 p15 p25">
            <div class="page-header clearfix">
                <h3 class="pull-left nomargin"><i class='fa fa-file-text-o'></i><?php echo ($_SESSION['curMenu']['name']); ?></h3>
            </div>
            <div class="panel panel-default mt25">
                <div class="panel panel-heading text-center"><h2 class="panel-title fontsize20"><?php echo ($_SESSION['curMenu']['name']); ?></h2></div>
                <div class="panel-body">
                    <form class="form-horizontal" id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm" name="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm" action="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/handle');?>" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">所属分类:</label>
                            <div class="col-sm-9">
                                <select name="classify_id" id="classify_id" class="form-control selectpicker" data-live-search="true">
                                    <?php if(is_array($classify_list)): foreach($classify_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"]) == $currdata['classify_id']): endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" data-bv-field="name" value="<?php echo ($currdata['name']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">关键字:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="resize:vertical;" id="description" name="description" data-bv-field="description" value="" ><?php echo ($currdata['description']); ?></textarea>
                                <p class="help-block">(关键字之间用 | 分割)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上传照片:</label>
                            <div class="col-sm-9">
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
                        <div class="form-group" id="pic_div" <?php echo ($pic_display); ?>>
                            <label class="col-sm-2 control-label">已有照片:</label>
                            <div class="col-sm-10">
                                <img src="<?php echo __ROOT__.$currdata['pic'];?>" alt="" id="pic_img" width="100" height="100" />
                                <input type="hidden" name="pic_old" id="pic_old" value="<?php echo ($currdata['pic']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div id="article-editormd">
                                    <textarea name="markdown"><?php echo ($currdata['markdown']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type='hidden' name='id' id='id' value="<?php echo ($article_id); ?>" />
                                <input type='hidden' name='_method_' id='_method_' value='<?php echo ($method); ?>' />
                                <input type='hidden' name='channel_id' id='channel_id' value='<?php echo ($channel_id); ?>' />
                                <textarea name="content" id="content" style="display: none;"><?php echo ($currdata["content"]); ?></textarea>
                                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal" id="btnCancelHandleForm<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>">取消</button>
                                <button type="submit" class="btn btn-success btn-lg" autocomplete="off">提交</button>
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

    <!--editormd-->
    <script src="__PUBLIC__/editor.md-master/editormd.min.js"></script>
    <!--fileupload-->
    <script type="text/javascript" src="__PUBLIC__/common/lib/jquery/fileupload/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="__PUBLIC__/common/lib/jquery/fileupload/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="__PUBLIC__/common/lib/jquery/fileupload/jquery.fileupload.js"></script>
    <script>
        $(document).ready(function() {
            var testEditor = editormd("article-editormd", {
                width: "100%",
                height: 740,
                path : '__PUBLIC__/editor.md-master/lib/',
                theme : "dark",
                previewTheme : "default",
                editorTheme : "pastel-on-dark",
                markdown : $('#text-markdown').text(),
                codeFold : true,
                //syncScrolling : false,
                saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
                searchReplace : true,
                watch : false,                // 关闭实时预览
                htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启
                //toolbar  : false,             //关闭工具栏
                toolbarAutoFixed : false,
                //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
                emoji : true,
                taskList : true,
                tocm : false,                // Using [TOCM]
                tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart : true,             // 开启流程图支持，默认关闭
                sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
                dialogLockScreen : true,   // 设置弹出层对话框不锁屏，全局通用，默认为true
                //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
                //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
                //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
                //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
                imageUpload : true,
                imageFormats : ["jpg", "jpeg", "gif", "png"],
                imageUploadURL : "<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/uploadPic');?>",
                searchReplace : true, // default true
                fontSize : "16px",
                onload : function() {
                    this.resize("100%", 640);
                },
                toolbarIcons : function() {
                    return [
                        "undo", "redo", "|",
                        "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|",
                        "list-ul", "list-ol", "hr", "|",
                        "link", "reference-link", "image", "code", "preformatted-text", "code-block", "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                        "goto-line", "watch", "fullscreen", "||",
                        "search", "help", "info"
                    ]
                },
            });
            $('#fileupload').fileupload({
                url: "<?php echo U(MODULE_NAME.'/uploadPic');?>",
                dataType: 'json',
                autoUpload: true,
                done: function (e, data) {
                    $('#pic_tip_info').html(data.result.message).show();
                    if(data.result.status == '0') {
                        $('#fileupload').fileupload('enable');
                        $('#fileupload').removeAttr('disabled');
                    } else if(data.result.status == '1') {
                        var path = data.result.url;
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
                            notEmpty: {
                                message: '标题不能为空'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: '简介不能为空'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                e.preventDefault();
                var $form = $(e.target);    //获取表单实例
                var bv = $form.data('bootstrapValidator');  //获取bootstrap实例
                if(testEditor.getMarkdown() == '') {
                    confirmModalOpen('请输入文章内容');     // 提示信息
                    $('#' + CurrentPage + 'ConfirmModal').find('#btnConfirm' + CurrentPage).click(function() {
                        confirmModalClose();
                    })
                    $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator('disableSubmitButtons', false);
                } else {
                    //对modal处理
                    confirmModalOpen('数据正在处理，请稍等...', '0', ' fa-spinner fa-spin ');     // 提示信息
                    //ajax处理
                    $('#content').text(testEditor.getHTML());
                    ajaxDo($form.attr('action'), $form.serialize(), "POST");
                    if(ajaxReturnData.status == '200') {
                        confirmModalInfo(ajaxReturnData.info, ' fa-check ');
                        setTimeout(function() {
                            window.location.replace("<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/index' ,array('channel_id' => $channel_id));?>");
                        }, 1000);
                    } else if(ajaxReturnData.status == '300') {
                        confirmModalInfo(ajaxReturnData.info, '');
                        setTimeout(function() {
                            $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>HandleForm').bootstrapValidator('disableSubmitButtons', false);
                            confirmModalClose();
                        }, 1000);
                    }
                }
            });
        });
    </script>

<!-- ------------------ end block ------------------- -->
</body>
</html>