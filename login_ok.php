<?
	$command = $_POST['command'];

	if($command == "login"){
		include "util/dbconn.php";

		$id = $_POST['userid'];
		$pw = $_POST['userpwd'];

		if($id == '' || $pw == ''){
			echo "<script>document.location.href='./index.php?flag=blank';</script>";
		}

		$sql = "SELECT userid, name, regdate FROM `ab_user` WHERE userid='$id' and passwd=PASSWORD('$pw')";
		
		$result = mysql_query($sql,$connect);
		$row = mysql_fetch_array($result);

		
		include "util/dbclose.php";
		session_start();
		
		if($row[0] == $id){
			$name = $row[1];
			$regdate = $row[2];
			$_SESSION["sid"] = $id;
			$_SESSION["sname"] = $name;
			$_SESSION["sregdt"] = $regdate;
			session_register('sid');
			session_register('sname');
			session_register('sregdt');
			echo "<script>document.location.href='./mypage.php';</script>";
		} else{
			$_SESSION["flag"] = 'no';
			session_register('flag');
			echo "<script>document.location.href='./index.php?flag=no';</script>";
		}
		

	} else if($command == "find"){
		echo "<script>document.location.href='./find.html';</script>"; 
	} else if($command == "join"){
		echo "<script>document.location.href='./join.html';</script>"; 
	} else{
		echo "<script>document.location.href='./error.html';</script>"; 
	}

?>