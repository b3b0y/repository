<?php date_default_timezone_set("Asia/Hong_Kong");
	session_start();
	include_once("config.php");

		$result = mysql_query("UPDATE fr_user SET status = 'offline' , last_logout_date  = '".date ("y/m/d g:i:s")."' WHERE UserName = '".$_SESSION['user']."'");
	
		unset($_SESSION['login']); 
		unset($_SESSION['required']); 
		session_destroy();
		header("Location: ../index.php");


?>