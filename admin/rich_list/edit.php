<?php
	include_once('../../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	$f_id = $_REQUEST['f_id'];
	$year = $_REQUEST['year'];
	if($f_id!=''){
		$href = "/admin/rich/list.php";
	}
	if($year!=''){
		$href = "detail.php?year=$year";
	}
	if($id!=''){
		$f_bd = new table_class('fb_fhbd');
		$f_bd->find($id);
		$rich = new table_class('fb_fh');
		$rich->find($f_bd->fh_id);
		$list = new table_class('fb_fhb');
		$list->find($f_bd->bd_id);
	}else{
		if($year!=''){
			$list = new table_class('fb_fhb');
			$list->find($year);
		}
	}
	if($f_id!=''){
		$rich = new table_class('fb_fh');
		$rich->find($f_id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>编辑</title>
	<?php 
		css_include_tag('admin','autocomplete');
		use_jquery();
		validate_form("fbd_edit");
		js_include_tag('admin/rich/edit','autocomplete.jquery','../ckeditor/ckeditor.js');
	?>
</head>
<body style="background:#E1F0F7">
	<form id="fbd_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!=''){echo "编辑富豪榜单";}else{echo "添加富豪榜单";}?> <a href="<?php echo $href;?>"><img src="/images/admin/btn_back.png" border=0></a></td>
		</tr>
		<tr class=tr4>
			<td width="130">姓名</td>
			<td width="695" align="left">
				<?php if ($year == ''){ echo $rich->name; ?>
				<input type="hidden" name="bd[fh_id]" id="fh_id" value="<?php echo $rich->id;?>">
				<?php } else { ?>
				<input style="text" value="<?php echo $rich->name;?>" id="fh_id"><span id="error"></span>
				<input type="hidden" name="bd[fh_id]" value="<?php echo $f_bd->fh_id;?>" id="h_fh_id">
				<input type="hidden" id="f_type" value="1">
				<!-- 
				<select name="bd[mr_id]">
					<?php 
						$sql = "select * from fb_mr where id not in (select mr_id from fb_mrbd a,fb_mrb b where a.bd_id = b.id and year = '{$year}')";
						$record = $db->query($sql);
						$count = count($record);
						for($i=0;$i< $count;$i++){ 
					?>
					<option value="<?php echo $record[$i]->id?>"><?php echo $record[$i]->name; ?></option>
					<?php }?>
				</select>
				-->
				<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td>榜单名称</td>
			<td align="left">
				<?php if ($year == '') { ?>
				<!-- 
				<select name="bd[bd_id]" id="bd[bd_id]">
					<?php 
						if($f_id=='')
						{
							$temp = new table_class('fb_mrbd');
							$temp->find($id);
							$f_id=$temp->mr_id;
						}
						$sql = "select * from fb_mrb where id not in (select bd_id from fb_mrbd where mr_id = '{$f_id}' and id != '{$id}') order by year asc";
						$record = $db->query($sql);
						$count = count($record);
						for($i=0;$i< $count;$i++){
					?>
					<option <?php if($f_bd->bd_id==$record[$i]->id)echo 'selected="selected"';?> value="<?php echo $record[$i]->id?>"><?php echo $record[$i]->year?></option>
					<?php }?>
				</select>
				-->
				<input type="text" id="bd_id"><span id="error"></span>
				<input type="hidden" name="bd[bd_id]" id="h_bd_id">
				<input type="hidden" id="f_type" value="2">
				<?php } else { ?>
					<?php echo $list->year;?><input type="hidden" id="bd_id" name="bd[bd_id]" value="<?php echo $year;?>"> 
				<?php }?>
				
			</td>
		</tr>
		<tr class=tr4>
			<td>综合排名</td>
			<td align="left">
				<input type="text" name="bd[pm]" value="<?php echo $f_bd->pm;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">个人财富(亿人民币)</td>
			<td align="left">
				<input type="text" name="bd[sr]" value="<?php echo $f_bd->sr;?>" class="number required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">公司</td>
			<td align="left">
				<input type="text" name="bd[company]" value="<?php echo $f_bd->company;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">资产来源</td>
			<td align="left">
				<input type="text" name="bd[industry]" value="<?php echo $f_bd->industry;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">上传照片</td>
			<td align="left">
				<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
				<span id="use_mr" style="cursor:pointer;">使用富豪照片</span>
				<input type="file" name="photo" id="photo"  >（请上传小于2M的照片）<?php if($id!=''){?><a target="_blank" href="<?php echo $f_bd->zp?>">点击查看照片</a><?php }?>
				<input type="hidden" value="<?php echo $f_bd->zp;?>" id="bd_zp" name="bd[zp]">
			</td>
		</tr>
		<tr class="tr4">
			<td height=265>备注</td><td><?php show_fckeditor('bd[sbly]','Admin',true,"265",$f_bd->sbly);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="finish" type="button" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
</body>
</html>

<script>
	$(function(){
		$("#use_mr").click(function(){
			$("#bd_zp").attr('value','<?php echo $famous->mr_zp;?>');
			$(this).next().remove();
		});
	});
</script>