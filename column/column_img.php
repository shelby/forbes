<?php include_once(dirname(__FILE__).'/../frame.php');
	$db=get_db();
	$img=$db->query('select src from fb_images where id='.$_REQUEST['id']);
	echo '<img width=754 src="'.$img[0]->src.'" />';
?>