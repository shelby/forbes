<?php
	$name=$_POST['user_name'];
	$password=$_POST['password'];
	include("../frame.php");
	$suess_url =   $_POST['last_url'] ? $_POST['last_url'] :'/user/';
	$fail_url = $_POST['last_url'] ?"index.php?last_url=" .$_POST['last_url'] :"index.php";
	if(strlen($name)>20 || strlen($password)>20){
		echo "wrong";
		die();
	}
	$password = md5($password);
	$db = get_db();
	$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}'";
	$record = $db->query($sql);
	if($db->record_count==1)
	{
		if($_POST['time']!='')
		{
			$limit=$_POST['time']*3600*24;
			setcookie("name",$name,time()+$limit,'/');
			setcookie("password",$_POST['password'],time()+$limit,'/');
		}
		$user_id = $db->field_by_name('id');
		$cache_name = sprintf('%06s',$user_id) .rand_str(24);
		setcookie("cache_name",$cache_name,0,'/');
		$db->execute("insert into fb_yh_log (yh_id,time) values ({$user_id},now())");
		echo $name;
	}
	else
	{
		echo "wrong";
		die();
	}
?>