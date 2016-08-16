<?
	session_start();
	
	session_destroy();

	$_SESSION = array();

	echo "<script>document.location.href='./index.php';</script>"; 
	

?>