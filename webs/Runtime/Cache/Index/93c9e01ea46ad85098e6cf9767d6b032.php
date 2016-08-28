<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="__PUBLIC__/common/css/article.css" />
    <link rel="stylesheet" href="__PUBLIC__/editor.md-master/css/editormd.preview.css" />
</head>
<body>
<div id="layout">
    <div id="sidebar">
        <h1>本文目录</h1>
        <div class="markdown-body editormd-preview-container" id="custom-toc-container">#custom-toc-container</div>
    </div>
    <div id="editormd-view">
        <textarea id="append-test" style="display:none;"><?php echo ($articleData['markdown']); ?></textarea>
    </div>
</div>
<script src="__PUBLIC__/common/lib/jquery/jquery.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/marked.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/prettify.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/raphael.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/underscore.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/sequence-diagram.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/flowchart.min.js"></script>
<script src="__PUBLIC__/editor.md-master/lib/jquery.flowchart.min.js"></script>
<script src="__PUBLIC__/editor.md-master/editormd.js"></script>
<script type="text/javascript">
    $(function() {
        editormd.markdownToHTML("editormd-view", {
                markdown        : $("#append-test").text(),
                //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                //toc             : false,
                tocm            : true,    // Using [TOCM]
                tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                //gfm             : false,
                //tocDropdown     : true,
                // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });
    });
</script>
</body>
</html>