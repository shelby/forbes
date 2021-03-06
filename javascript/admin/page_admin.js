$(function(){
	$('*[pos]').each(function(){
		$(this).hover(function(){
			if($(this).find('#admin_edit_div').length > 0) return;
			if($(this).parent().css('position')=='absolute'||$(this).parent().parent().css('position')=='relative'){
				var top = $(this).offset().top-$(this).parent().offset().top;
				var right =  $(this).offset().left-$(this).parent().offset().left;
			}else if($(this).css('position')=='relative'){
				var top = 0;
				var right = 20;
			}else{
				var top =  parseInt($(this).offset().top);
				var right =  $(this).offset().left;
			}
			//alert($(this).offset().top);
			$('#admin_edit_div').remove();
			$('#clear_float').remove();
			var str = "<div id='clear_float' style='float:none;display:none'>clear_float</div><div id='admin_edit_div' pos_tag='" + $(this).attr('pos_tag') + "' pos_name='" + $(this).attr('pos') +"' style='z-index: 100; position: absolute;left:" +right +"px;top:" +top+"px;' title='编辑位置内容'><img style='cursor: pointer;width:16px;height:16px;' width=16 height=16 src='/images/admin/btn_edit.png' ></div>";
			$(this).append(str);
		},function(){});
	});
	
	$('#admin_edit_div img').live('click',function(e){
		e.preventDefault();
		var $this = $(this);
		parent.$.fn.colorbox({
			href: '/admin/position/edit.php?pos_name=' + $($this).parent().attr('pos_name') + '&name=' + $(this).parent().attr('pos_tag'),
			width:'800px',
			height: '630px',
			iframe: true
		});
	});
	
	$(".edit_pri").hover(function(){
		if($(this).parent().css('position')=='absolute'||$(this).parent().parent().css('position')=='relative'){
			var top = $(this).offset().top-$(this).parent().offset().top;
			var right =  $(this).offset().left-$(this).parent().offset().left;
		}else if($(this).css('position')=='relative'){
			var top = 0;
			var right = 20;
		}else{
			var top =  parseInt($(this).offset().top)+20;
			var right =  $(this).offset().left;
		}
		
		var str = "<div id='edit_priority' style='z-index: 150; position: absolute;left:" +right +"px;top:" +top+"px;' title='编辑显示优先级'><img style='cursor: pointer;width:30px;height:30px;' width=30 height=30 src='/images/admin/priority.png' ></div>";
		$(this).append(str);
	},function(){
		$("#edit_priority").remove();
	});
	
	$("#edit_priority").live('click',function(e){
		e.preventDefault();
		var type = $(this).parent().attr('id');
		var cwidth= '900px';
		var cheight = '1200px';
		if(type=='forbes_trt'){cwidth='970px'; cheight='700px';}else if(type=='qie_menu'){cwidth='600px'; cheight='700px';}
		parent.$.fn.colorbox({
			href: '/admin/position/priority.php?type=' + type,
			width:cwidth,
			height: cheight,
			iframe: true
		});
	});
});