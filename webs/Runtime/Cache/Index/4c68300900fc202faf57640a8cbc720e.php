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
<style>
    @-webkit-viewport   { width: device-width; }
    @-moz-viewport      { width: device-width; }
    @-ms-viewport       { width: device-width; }
    @-o-viewport        { width: device-width; }
    @viewport           { width: device-width; }
</style>
<script>
    // Copyright 2014-2015 Twitter, Inc.
    // Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
                document.createTextNode(
                        '@-ms-viewport{width:auto!important}'
                )
        )
        document.querySelector('head').appendChild(msViewportStyle)
    }
</script>
<!--[if lt IE 9]>
<script src="__PUBLIC__/common/lib/html5shiv.min.js"></script>
<script src="__PUBLIC__/common/lib/respond.min.js"></script>
<![endif]-->

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/bootstrap/css/bootstrap.min.css">

<!-- font-awesome字体 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/font-awesome/css/font-awesome.min.css">

<!-- 自定义样式 -->
<link rel="stylesheet" href="__PUBLIC__/common/css/common.css">
<link rel="stylesheet" href="__PUBLIC__/common/css/index.css">
<!--[if lt IE 9]>
<style>
    .container {
        width: 1050px;
    }
</style>
<![endif]-->

    <!--bootstrap表单验证-->
    <link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/validate/bootstrapValidator.min.css">
</head>
<body ondrag="return false" ondragstart="return false;">
<!-- top begin -->
<div class="container-fluid clearfix header">
    <div class="container nopadding center-block">
        <div class="pull-left">
            <a href="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/index');?>" class="logo"></a>
        </div>
        <div class="pull-right hidden-xs">
            <div class="phone"></div>
        </div>
    </div>
</div>
<nav class="navbar navbar-blue nomargin">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if(is_array($channel_list)): $i = 0; $__LIST__ = $channel_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$channel_vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($channel_vo['alink']); ?>"><?php echo ($channel_vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- top end -->
<div class="container mt30 pb20">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <h4 class="content-header"><a href="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/listArticle', array('id' => $dongtaiChannel['id']));?>"><?php echo ($dongtaiChannel['name']); ?></a></h4>
            <div class="mt20 width95 center-block">
                <?php if(is_array($dongtailist)): $i = 0; $__LIST__ = $dongtailist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dongtai_vo): $mod = ($i % 2 );++$i;?><div class="media">
                        <div class="media-left media-middle">
                            <a href="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/article', array('id' => $dongtai_vo['id'], 'channel_id' => $dongtai_vo['channel_id']));?>">
                                <div class="media-object con_news_list_date">
                                    <span class="day"><?php echo ($dongtai_vo['D']); ?></span>
                                    <span class="year"><?php echo ($dongtai_vo['YM']); ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/article', array('id' => $dongtai_vo['id'], 'channel_id' => $dongtai_vo['channel_id']));?>">
                                <div class="con_news_list_title"><?php echo ($dongtai_vo['name']); ?></div>
                                <div class="con_news_list_des"><?php echo ($dongtai_vo['description']); ?></div>
                            </a>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <?php if(empty($_SESSION['userId'])): ?><div class="mt10 panel panel-info" style="margin-bottom:10px;border-radius: 0;">
                    <div class="panel-heading" style="border-radius: 0;">
                        <h4 class="panel-title" style="font-size: 21px;">用户登录 <small class="colorf00 ml10" id="loginTip" style="display: none;">提示信息</small></h4>
                    </div>
                    <div class="panel-body">
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
                    </div>
                </div>
                <?php else: ?>
                <div class="mt10 panel panel-info" style="margin-bottom:10px;border-radius: 0;">
                    <div class="panel-heading" style="border-radius: 0;">
                        <h4 class="panel-title" style="font-size: 21px;">登录成功</h4>
                    </div>
                    <div class="panel-body">
                        <div class="thumbnail noborder nomargin">
                            <img src="__PUBLIC__/common/image/<?php echo (session('userImg')); ?>" alt="<?php echo (session('userRealName')); ?>" class="img-thumbnail img-circle" width="125">
                            <div class="caption text-center">
                                <h3 class="mt5">欢迎您，<?php echo (session('userRealName')); ?></h3>
                                <hr class="mt15 mb15">
                                <p class="text-right">
                                    <a href="<?php echo U('Admin/Index/index');?>" class="btn btn-info" role="button">进入后台</a>
                                    <a href="<?php echo U('Index/Index/signup');?>" class="btn btn-default ml10" role="button">退出</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><?php endif; ?>
        </div>
    </div>
</div>
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
<script src="__PUBLIC__/common/lib/jquery/superslide/jquery.SuperSlide.2.1.2.js"></script>
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