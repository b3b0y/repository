<?php date_default_timezone_set("Asia/Hong_kong");
	session_start();

	include_once("../php/config.php");

	if(isset($_POST['approve']) && $_POST['approve'] == "APPROVE")
	{


		$rowCount = count($_POST['subject']);
			
		for($i=0; $i<$rowCount; $i++)
		{
			$result = mysql_query("SELECT * FROM  fr_stud_subject WHERE subject_id = '".$_POST['subject'][$i]."'");
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				$path = $row['url'];
				$date = date ("y/m/d");
				$time = date ("H:i:s");


				mysql_query("UPDATE fr_stud_subject SET Date_Created = '".$date."', Time_Created = '".$time."', status = 'APPROVED' WHERE subject_id = '".$_POST['subject'][$i]."'");

				if(!file_exists(".".$path))
    			{
    				mkdir (".".$path, 0700);
    			}
			}
		}
		echo '<script> alert("Successfully APPROVED"); window.location.href="../subjectmanagement.php?subject=student"; </script>';
	
	}
	else if(isset($_POST['disapprove']) && $_POST['disapprove'] == "DISAPPROVE")
	{
		$rowCount = count($_POST['subject']);
		for($i=0; $i<$rowCount; $i++)
		{
			mysql_query("DELETE FROM fr_stud_subject WHERE subject_id = '".$_POST['subject'][$i]."'");
		}
		echo '<script> alert("Successfully DISAPPROVE"); window.location.href="../subjectmanagement.php?subject=approve"; </script>';
	
	}
	
?>