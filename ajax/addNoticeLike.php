<?php
	header('Content-Type:text/html; charset=utf-8');
	include "../util/dbconn.php";

	$n = $_GET['n'];

	$sql = "UPDATE `ab_notice` SET likeNum=likeNum+1 WHERE num = $n";

	
	//iconv('EUC-KR', 'UTF-8', $sql);
	mysql_query($sql,$connect);
	
	echo "ok";
	
	include "../util/dbclose.php";



?>