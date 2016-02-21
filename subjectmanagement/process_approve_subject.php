<?php date_default_timezone_set("Asia/Hong_kong");
	session_start();

	include_once("../php/config.php");

	if(isset($_POST['approve']) && $_POST['approve'] == "APPROVE")
	{


		$rowCount = count($_POST['subject']);
			
		for($i=0; $i<$rowCount; $i++)
		{
			$result = mysql_query("SELECT * FROM  fr_stud_subject WHERE subject_id = '".$_POST['subject'][$i]."' AND user_id ='".$_POST['user_id'][$i]."'");
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				$path = $row['url'];
				$date = date ("y/m/d");
				$time = date ("H:i:s");

				mysql_query("UPDATE fr_stud_subject SET Date_Created = '".$date."', Time_Created = '".$time."', status = 'APPROVED' WHERE subject_id = '".$_POST['subject'][$i]."' AND user_id ='".$_POST['user_id'][$i]."'");


				$result0 = mysql_query("SELECT * FROM  fr_stud_subject WHERE subject_id = '".$_POST['subject'][$i]."'");
				$count = mysql_num_rows($result0);

				$result1 = mysql_query("SELECT * FROM  fr_ins_subject WHERE id = '".$_POST['subject'][$i]."'");
				if(mysql_num_rows($result1) > 0)
				{
					$row1 = mysql_fetch_array($result1);

					$storage = $row1['size_limit'] / $count;

					mysql_query("UPDATE fr_stud_subject SET size_limit = '".$storage."' WHERE subject_id = '".$_POST['subject'][$i]."'");
				}
				if(!file_exists(".".$path))
    			{
    				mkdir (".".$path, 0700);
    			}		

				$link = 'enroll_subject.php?subject=subject';
				$message = 'You are now enrolled in '. $row['subject'];			
				
				$date = date ("y/m/d H:i:s");

				mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row['user_id']."','".$link."','".$message."','unread','".$date."')");
			
			}
		}
		echo '<script> alert("Successfully APPROVED"); window.location.href="../subjectmanagement.php?subject=student"; </script>';
	
	}
	else if(isset($_POST['disapprove']) && $_POST['disapprove'] == "DISAPPROVE")
	{
		$rowCount = count($_POST['subject']);
		for($i=0; $i<$rowCount; $i++)
		{
			$result = mysql_query("SELECT * FROM  fr_stud_subject WHERE subject_id = '".$_POST['subject'][$i]."' AND user_id ='".$_POST['user_id'][$i]."'");
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				$path = $row['url'];
				$date = date ("y/m/d");
				$time = date ("H:i:s");

			mysql_query("DELETE FROM fr_stud_subject WHERE subject_id = '".$_POST['subject'][$i]."' AND user_id ='".$_POST['user_id'][$i]."'");
			
				$link = 'enroll_subject.php?subject=subject';
				$message = 'Your subject "'. $row['subject'].'" has been rejeced';			
				
				$date = date ("y/m/d H:i:s");

				mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row['user_id']."','".$link."','".$message."','unread','".$date."')");
			}
		}
		echo '<script> alert("Successfully DISAPPROVE"); window.location.href="../subjectmanagement.php?subject=approve"; </script>';
	
	}
	
?>