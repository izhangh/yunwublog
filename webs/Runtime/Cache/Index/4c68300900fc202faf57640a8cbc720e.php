<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<link rel="icon" href="__ROOT__/favicon.ico" type="image/x-icon" />
<title><?php echo (C("WEB_NAME")); ?></title>
<meta name="Keywords" content="<?php echo (C("WEB_KEYWORD")); ?>" >
<meta name="Description" content="<?php echo (C("WEB_DESCRIBE")); ?>" >
<script src="__PUBLIC__/common/lib/html5shiv.min.js"></script>
<script src="__PUBLIC__/common/lib/respond.min.js"></script>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/bootstrap/css/bootstrap.min.css">
<!-- font-awesome字体 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/font-awesome/css/font-awesome.min.css">
<!-- 自定义样式 -->
<link rel="stylesheet" href="__PUBLIC__/common/css/common.css">
    <!--bootstrap表单验证-->
    <link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/validate/bootstrapValidator.min.css">
</head>
<body ondrag="return false" ondragstart="return false;">
<form id="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>LoginForm" name="<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>LoginForm" action="<?php echo U('Index/Index/signin');?>" method="post">
    <driv class="form-group">
        <div class="input-group input-group-lg">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" data-bv-field="username" id="username" name="username" placeholder="请输入用户名">
        </div>
    </driv>
    <div class="form-group">
        <div class="input-group input-group-lg">
            <span class="input-group-addon"><i class="fa fa-lock" style="font-size: 19px;"></i></span>
            <input type="password" class="form-control" data-bv-field="password" id="password" name="password" placeholder="请输入密码">
        </div>
    </div>
    <div class="form-group text-right mt20 mb5">
        <button type="submit" id="submitLogin" class="btn btn-info width40 ml10">登录</button>
        <button type="reset" class="btn btn-default width40">重置</button>
    </div>
</form>
<!-- footer begin -->
<div class="container-fluid hdb_footer text-center bggrey">
    <?php echo (C("WEB_COPYRIGHT")); ?>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="__PUBLIC__/common/lib/jquery/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="__PUBLIC__/common/lib/bootstrap/bootstrap/js/bootstrap.min.js"></script>
<!-- footer end -->
<!--表单验证-->
<script src="__PUBLIC__/common/lib/bootstrap/validate/bootstrapValidator.min.js"></script>
<script src="__PUBLIC__/common/lib/bootstrap/validate/zh_CN.js"></script>
<script>
    $('#<?php echo GROUP_NAME; echo MODULE_NAME; echo ACTION_NAME;?>LoginForm').bootstrapValidator({
        message: '您输入的信息有误，请仔细检查！',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: '用户名必须'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: '登录密码必须'
                    },
                    stringLength: {
                        min: 1,
                        max: 20,
                        message: '密码必须位多于一个字符'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
        e.preventDefault();
        var $form = $(e.target);    //获取表单实例
        $.ajax({
            async: false,
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            dataType:"json",
            timeout: 5000,
            context: $('body'),
            success:function(data) {
                ajaxReturnData = data;
                if(ajaxReturnData.status == '300') {
                    $('#loginTip').html(ajaxReturnData.info);
                    $('#loginTip').show();
                    $('#submitLogin').removeAttr('disabled');
                } else if(ajaxReturnData.status == '200') {
                    $('#loginTip').html(ajaxReturnData.info);
                    $('#loginTip').show();
                    window.location.href = "<?php echo U('Admin/Index/index');?>";
                }
            },
            error:function(xhr) {
                alert("ajax错误提示： " + xhr.status + " " + xhr.statusText);
            }
        });
    });
</script>
</body>
</html>