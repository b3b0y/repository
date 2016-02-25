<?php session_start();

	include_once("../php/config.php");

	$rows = mysql_query("SELECT * FROM fr_notification WHERE user_id = '".$_SESSION['user_id']."' AND status = 'unread' ORDER BY id DESC");
	$data = array('notifications' => array()); // Multidim array.
	
	while ($row = mysql_fetch_object($rows)) {
	 $data['notifications'][] = $row; // add the row to the notification list.
	}
	$data['new'] = count($data['notifications']); // Gets the count of the rows added to our list to send.
	echo json_encode($data);
	exit();

	

?>
