<?php
	header('Content-Type:text/html; charset=utf-8');
	require "../util/JSON.php";
	include "../util/dbconn.php";

	$n = $_GET['n'];

	//, substring(regdate,1,10)
//	$sql = "SELECT subject, content, substring(regdate,1,10), viewNum, likeNum FROM `ab_notice` where delete_yn='N' ";
	
	if($n != null){
		$sql = "SELECT subject, content, regdate, viewNum, likeNum FROM `ab_notice` where delete_yn='N' ";
		$sql .= "and num='$n'";
	} else{
		$sql = "SELECT subject, content, substring(regdate,1,10), viewNum, likeNum FROM `ab_notice` where delete_yn='N' ";
		$sql .= "order by regdate desc";
	}

	
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