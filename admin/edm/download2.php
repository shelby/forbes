<?php
include "../../frame.php";
$str .= file_get_contents("http://localhost:8081/admin/edm/marrow.php?page_typ=static");


Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str)); 

Header("Content-Disposition: attachment; filename=marrow_".date('Ymd').".html"); 
echo $str;
