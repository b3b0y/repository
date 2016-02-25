<?php session_start();

	include_once("../php/config.php");

	if($_SESSION['Ulvl'] >= 4)
	{
		$rows = mysql_query("SELECT * FROM fr_db_backup");
		$data = array('backupdb' => array()); // Multidim array.
		
		while ($row = mysql_fetch_object($rows)) {
		 $data['backupdb'][] = $row; // add the row to the notification list.
		}
		$data['cnt'] = count($data['backupdb']); // Gets the count of the rows added to our list to send.
		echo json_encode($data);
		exit();
	}
	

?>
