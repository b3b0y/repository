<?php date_default_timezone_set("Asia/Hong_kong");
	session_start();

	include_once("../php/config.php");

	$result = mysql_query("SELECT * FROM  fr_stud WHERE user_id = '".$_SESSION['user_id']."'");
	if(mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);

		$rowCount = count($_POST['subject']);
			
		for($i=0; $i<$rowCount; $i++)
		{
			$result1 = mysql_query("SELECT * FROM  fr_ins_subject WHERE id = '".$_POST['subject'][$i]."'");
			if(mysql_num_rows($result1) > 0)
			{
				$row1 = mysql_fetch_array($result1);

				$FolderName = $row['ControlNo']."-".$row['LName']."-".$row1['Subject'];
				$path = $row1['SubPath']."/".$FolderName;
				
				mysql_query("INSERT INTO fr_stud_subject(user_id,subject,url,subject_id,status) VALUES('".$_SESSION['user_id']."','".$row1['Subject']."','".$path."','".$row1['id']."','DISAPPROVED')");
			}
		}
	}
	echo '<script> alert("Successfully Enrolled"); window.location.href="../enroll_subject.php?subject=subject"; </script>';

?>