<?php
	header('Content-Type:text/html; charset=utf-8');
	require "../util/JSON.php";
	include "../util/dbconn.php";

	//, substring(regdate,1,10)
	$sql = "SELECT substring(regdate,1,8) FROM `ab_notice` where delete_yn='N' order by regdate desc limit 3";
	//iconv('EUC-KR', 'UTF-8', $sql);
	$result = mysql_query($sql,$connect);
	
	$json = new Services_JSON();
	$rows = array();
	while($row = mysql_fetch_row($result)){
		$rows[] = $row;
	}
	$output = $json->encode($rows);

	echo $output;
	
	include "../util/dbclose.php";



?>