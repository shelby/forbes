<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php 
		include_once('../../frame.php');
	?>
</head>
<?php
    include_once('../../frame.php');
    #var_dump($_POST);
   
    $magazine = new table_class("fb_old_magazine");
	$id = intval($_POST['id']);
    if($id!=''){
   		$magazine->find($id);
    }
	
	$magazine->update_attributes($_POST['post']);
	
	redirect('old_magazine_index.php');
?>