<?php session_start();

	include_once("../php/config.php");

	$result = mysql_query("SELECT * FROM fr_notification WHERE user_id = '".$_SESSION['user_id']."' AND status = 'unread' ORDER BY id DESC");
	$record_count = mysql_num_rows($result);

	echo $record_count;

	
?>
