<?php session_start();
	include_once("config.php");

	if(isset($_GET['delete']) && $_GET['delete'] == 'subject')
	{
		if(!mysql_query("DELETE FROM fr_subject WHERE subID = '".$_GET['id']."' AND status = 'NOT ASSIGNED'"))
		{
			echo '<script> alert("Successfully Delete"); window.location.href="../subjectmanagement.php?subject=subject"; </script>';
		}
		else
		{
			echo '<script> alert("ASSIGNED subject cant Delete"); window.location.href="../subjectmanagement.php?subject=subject"; </script>';
		}
	}

	if(isset($_GET['delete']) && $_GET['delete'] == 'faculty')
	{
		mysql_query("DELETE FROM fr_ins_subject WHERE id = '".$_GET['id']."'");

		echo '<script> alert("Successfully Delete"); window.location.href="../subjectmanagement.php?subject=faculty"; </script>';
	}

	if(isset($_GET['delete']) && $_GET['delete'] == 'drop')
	{
		

		$result = mysql_query("SELECT * FROM  fr_stud_subject WHERE subject_id = '".$_GET['subject_id']."'");
		if(mysql_num_rows($result) > 0)
		{
			mysql_query("DELETE FROM fr_stud_subject WHERE subject_id = '".$_GET['subject_id']."'");
			$row = mysql_fetch_array($result);

			$link = 'enroll_subject.php?subject=subject';
			$message = 'You are Droped in '. $row['subject'];			
			
			$date = date ("y/m/d H:i:s");

			mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row['user_id']."','".$link."','".$message."','unread','".$date."')");
		}

		echo '<script> alert("Successfully Drop"); window.location.href="../subjectmanagement.php?subject=student"; </script>';
	}

?>