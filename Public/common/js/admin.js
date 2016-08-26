/**
 * Created by zhangh on 2016/8/9.
 */
var ajaxReturnData = '';
$(function() {
    var height = ($('#leftNav').height() > $('#rightContent').height())?$('#leftNav').height():$('#rightContent').height();
    $('#leftNav').css("minHeight", height);
    $('#rightContent').css("minHeight", height);
    if ($('html').hasClass('lt-ie8')) {
        var message = '<div class="alert alert-warning center-block text-center">';
        message += '由于您的浏览器版本太低，将无法正常使用本站点，请使用最新的';
        message += '<a href="http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie" target="_blank">IE浏览器</a>、';
        message += '<a href="http://www.baidu.com/s?wd=%E8%B0%B7%E6%AD%8C%E6%B5%8F%E8%A7%88%E5%99%A8" target="_blank">谷歌浏览器</a><strong>(推荐)</strong>、';
        message += '<a href="http://firefox.com.cn/download/" target="_blank">Firefox浏览器</a>，访问本站。';
        message += '</div>';
        $('body').prepend(message);
    }
    $(".tablesorter").tablesorter({
        headers: {
            0: {
                sorter: false
            }
        }
    });
    confirmModalClose();    //页面加载后初始化提示信息弹出框
    //监听删除按钮点击事件
    $('.' + CurrentPage + 'DelBtn').click(function(even) {
        even.preventDefault();
        var delBtn = $(this);
        $('.' + CurrentPage + 'DelBtn').attr('disabled', true);     // 禁用所有删除按钮
        confirmModalOpen($(this).data('info'));     // 提示信息
        $('#' + CurrentPage + 'ConfirmModal').find('#btnConfirm' + CurrentPage).click(function() {
            var modal = $('#' + CurrentPage + 'ConfirmModal');  // 获取modal对象
            modal.find('button').attr('disabled', true);    // 禁用modal按钮
            confirmModalInfo('正在处理，请稍后...', ' fa-spinner fa-spin ');
            //进行ajax处理
            ajaxDo($(delBtn).data('objurl'), '', 'GET'); // 提交至ajax处理
            if(ajaxReturnData['status'] == '200') {
                confirmModalInfo(ajaxReturnData['info'], ' fa-check ');
            } else if(ajaxReturnData['status'] == '300') {
                confirmModalInfo(ajaxReturnData['info'], '');
            }
            setTimeout(function() {
                window.location.replace(window.location.href);
            }, 1000);
            $('.' + CurrentPage + 'DelBtn').removeAttr('disabled').show();
        })
        $('#' + CurrentPage + 'ConfirmModal').on('hidden.bs.modal', function(e) {
            $('.' + CurrentPage + 'DelBtn').removeAttr('disabled').show();
            confirmModalClose();
        })
    })
})

/**
 * 提示信息弹出框打开
 * @param info      提示信息
 * @param showBtn   是否显示确认取消按钮
 * @param icon      提示信息图标
 */
function confirmModalOpen(info, showBtn, icon) {
    if(!showBtn) showBtn = '1';
    if(!icon) icon = 'fa-exclamation-triangle';
    $('#' + CurrentPage + 'ConfirmModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        confirmModalInfo(info, icon);
        if(showBtn !== '1') {
            modal.find('button').hide();
        }
    })
    $('#' + CurrentPage + 'ConfirmModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: true
    })
    return ;
}

function confirmModalInfo(info, icon) {
    if(!icon) icon = 'fa-exclamation-triangle';
    $('#' + CurrentPage + 'ConfirmModal').find('.modal-body').html("<i class='fa " + icon + " fontsize30 colorf00'></i>" + info);
}

/**
 * 提示信息弹出框关闭
 */
function confirmModalClose() {
    modal = $('#' + CurrentPage + 'ConfirmModal');
    modal.find('.modal-body').html('');
    modal.find('button').removeAttr('disabled').show();
    modal.modal('hide');
}

function ajaxDo(url, data, method) {
    if(!method) {
        method = 'POST';
    }
    ajaxReturnData = '';
    $.ajax({
        async: false,
        type: method,
        url: url,
        data: data,
        dataType:"json",
        timeout: 5000,
        context: $('body'),
        success:function(data) {
            ajaxReturnData = data;
            return ;
        },
        error:function(xhr) {
            alert("ajax错误提示： " + xhr.status + " " + xhr.statusText);
        }
    });
}