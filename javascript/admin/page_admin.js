$(function(){
	$('*[pos]').each(function(){
		$(this).hover(function(){
			if($(this).find('#admin_edit_div').length > 0) return;
			var top =  parseInt($(this).offset().top);
			var right =  $(this).offset().left;
			$('#admin_edit_div').remove();
			var str = "<div id='admin_edit_div' pos_tag='" + $(this).attr('pos_tag') + "' pos_name='" + $(this).attr('pos') +"' style='z-index: 100; position: absolute;left:" +right +"px;top:" +top+"px;' title='编辑位置内容'><img style='cursor: pointer;width:16px;height:16px;' width=16 height=16 src='/images/admin/btn_edit.png' ></div>";
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
	
});