<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
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

    <title><?php echo ($articleData['name']); ?>—<?php echo ($channelData['name']); ?>—<?php echo (C("WEB_NAME")); ?></title>
    <link rel="stylesheet" href="__PUBLIC__/common/css/article.css">
    <link rel="stylesheet" href="__PUBLIC__/editor.md-master/css/editormd.preview.css" />
    <style>
        #custom-toc-container {
            padding-left: 0;
        }
    </style>
</head>
<body ondrag="return false" ondragstart="return false;" style="background: #ebebeb;">
<?php if(!empty($articleData['pic'])): ?><!--放大图的imgModal-->
    <div class="modal fade bs-example-modal-lg text-center" id="imgModal"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
        <div class="modal-dialog modal-lg" style="display: inline-block; width: auto;max-width:100%;">
            <div class="modal-content">
                <img id="imgInModalID" src="__ROOT__<?php echo ($articleData['pic']); ?>" style="display: inline-block; width: auto;max-width:100%;" >
            </div>
        </div>
    </div><?php endif; ?>
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

<!--content begin-->
<div class="container mt20">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-sm-12 line_height30 mb5">
            <i class="fa fa-home"></i>
            当前位置：
            <a href="<?php echo U('Index/Index/index');?>">首页</a> >
            <?php if(($channelData['type']) == "b"): ?><a href="<?php echo U(GROUP_NAME.'/'.MODULE_NAME.'/listArticle', array('id' => $channelData['id']));?>"><?php echo ($channelData['name']); ?></a> >
                正文<?php endif; ?>
            <?php if(($channelData['type']) == "a"): echo ($channelData['name']); endif; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="article" style="min-height: 537px;">
                <div class="article-head">
                    <h1 class="article-title"><?php echo ($articleData['name']); ?></h1>
                    <section class="article-meta">
                        <span class="author">浏览数：<?php echo ($articleData['view_num']); ?></span> •
                        <time class="article-date">发布时间：<?php echo ($articleData['update_date']); ?></time>
                    </section>
                </div>
                <div class="article-content" id="editormd-view">
                    <textarea id="markdown-content" style="display:none;"><?php echo ($articleData['markdown']); ?></textarea>
                </div>
            </div>
        </div>
        <div class="hidden-xs col-sm-12 col-md-4">
            <div data-spy="affix" data-offset-top="10" data-offset-bottom="200" id="myAffix">
                <div class="markdown-body editormd-preview-container" id="custom-toc-container">#custom-toc-container</div>
            </div>
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
<script src="__PUBLIC__/editor.md-master/lib/marked.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/prettify.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/raphael.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/underscore.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/sequence-diagram.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/flowchart.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/jquery.flowchart.min.js"></script>
<script src="__PUBLIC__/editor.md-master/editormd.js"></script>
<script>
    $(function() {
        $('img').click(function(even) {
            even.preventDefault();
            $('#imgInModalID').prop('src', $(this).attr('src'));
            $('#imgModal').modal({
                show: true
            })
        })
        $('#myAffix').affix({
            offset: {
                top: 10,
                bottom: function () {
                    return (this.bottom = $('.footer').outerHeight(true))
                }
            }
        })
        editormd.markdownToHTML("editormd-view", {
            markdown        : $('#markdown-content').text(),
            //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            //toc             : false,
            tocm            : true,    // Using [TOCM]
            tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
            //gfm             : false,
//            tocDropdown     : true,
            markdownSourceCode : false, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });
    })
</script>
</body>
</html>