function confirm_deleteall(){
    var selectFlag = false;
    $("input[id='ids']").each(function() {
        if(this.checked==true){
            selectFlag = true;
        }
    });
    if(selectFlag == false){
        art.dialog.alert("没有选中数据！");
        return;
    }
    art.dialog.confirm("您确定要删除选中的所有记录吗？", function(){ $('#myform').submit(); });
}


function confirm_delete(name){
	$("input[id='ids']").each(function() {
        if(this.checked==true){
        	this.checked==false;
        }
    });
	
	//以下语句只适用于MAdmin框架，MAdmin框架中main.js的第387行
	$('.checkall').closest('table').find('input[type=checkbox]').iCheck('uncheck');
	$("input[name='"+name+"']").iCheck('check');
    art.dialog.confirm("您确定要删除该记录吗？", function(){ 
        $('#myform').submit();
    });
}

//a链接删除确认
function confirm_link_del(url) {
    art.dialog.confirm("您确定要删除该记录吗？", function(){
    	window.location.href=url; 
    });
}

/*
 * 删除页面元素（主要与删除附件）
 */ 
function delElement(domid, delurl) {
	art.dialog({
		icon:'warning',
	    content:'您确定要删除吗？',
	    lock: true,
	    ok: function() {
	    	 $.ajax({
	    	        type:'POST',
	    	        dataType:'json',
	    	        url:delurl,
	    	        success:function(data){
	    	        	if(data.status == '1') {
	    	        		art.dialog({
		    	        	    icon: 'succeed',
		    	        	    content: '删除成功！！！',
		    	        	    time:2
		    	        	});
	    	        		$("#"+domid).remove();
	    	        	} else {
	    	        		art.dialog({
		    	        	    icon: 'error',
		    	        	    content: '删除失败！！！',
		    	        	    time:2
		    	        	});
	    	        	}
	    	        },
	    	        error:function(data){
	    	        	art.dialog({
	    	        	    icon: 'error',
	    	        	    content:'删除失败！！！',
	    	        	    time:2
	    	        	});
	    	        }
	    	    });
	    	 return true;
	    },
	    cancelVal: '取消',
	    cancel: true
	});
};