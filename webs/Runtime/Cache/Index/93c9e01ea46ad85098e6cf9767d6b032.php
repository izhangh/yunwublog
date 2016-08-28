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
<script src="__PUBLIC__/common/lib/html5shiv.min.js"></script>
<script src="__PUBLIC__/common/lib/respond.min.js"></script>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/bootstrap/bootstrap/css/bootstrap.min.css">
<!-- font-awesome字体 -->
<link rel="stylesheet" href="__PUBLIC__/common/lib/font-awesome/css/font-awesome.min.css">
<!-- 自定义样式 -->
<link rel="stylesheet" href="__PUBLIC__/common/css/common.css">
    <title><?php echo ($articleData['name']); ?>—<?php echo ($channelData['name']); ?>—<?php echo (C("WEB_NAME")); ?></title>
    <link rel="stylesheet" href="__PUBLIC__/common/css/article.css">
    <link rel="stylesheet" href="__PUBLIC__/editor.md-master/css/editormd.preview.css" />
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
<!--content begin-->
<div class="container mt20">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 bgfff">
            <?php echo ($articleData['content']); ?>
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
<script>
    $(function() {
        $('img').click(function(even) {
            even.preventDefault();
            $('#imgInModalID').prop('src', $(this).attr('src'));
            $('#imgModal').modal({
                show: true
            })
        })
    })
</script>
</body>
</html>