<?
	
	include "util/dbconn.php";

	$id = $_POST['userid'];
	$pw = $_POST['userpwd'];
	$name = $_POST['username'];

	$sql = "insert into ab_user(userid,passwd,name) values('$id', PASSWORD('$pw'), '$name')";

	iconv('EUC-KR', 'UTF-8', $sql);
	mysql_query($sql,$connect);	
	include "util/dbclose.php";

	session_start();
	$_SESSION["sid"] = $id;
	$_SESSION["sname"] = $name;
	session_register('sid');
	session_register('sname');

	echo "<script>document.location.href='./mypage.php';</script>";

?>		