<?php
include_once "../../frame.php";
/*
 * only handle ajax method
 */
class Company{
	var $id;
	var $value;
}

if(is_ajax()){
	$limit = $_REQUEST['limit'] ? $_REQUEST['limit'] : 6;
	if(!$_REQUEST['name']){
		return "";	
	}
	$db = get_db();
	$sql = "select id, name from fb_mr where name like '%{$_REQUEST['name']}%' limit $limit";
	$famous = $db->query($sql);
	if(empty($famous)){
		return "";
	}
	$a = Array();
	foreach ($famous as $v) {
		$c = new Company();
		$c->id = $v->id;
		$c->value= $v->name;
		array_push($a, $c);

	}
	$result = Array("results" => $a);
	echo json_encode($result);;
	//var_dump($company);	
	$db->close();
}