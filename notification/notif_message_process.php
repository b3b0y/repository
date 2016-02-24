<?php session_start();

	include_once("../php/config.php");



	$bol = true;
	if($_SESSION['UserLvl'] == 1)
	{
		$result1 = mysql_query("SELECT * FROM fr_stud_subject WHERE user_id = '".$_SESSION['user_id']."'  ORDER BY Date_Created DESC");
		$bol = false;
	}
	else
	{
		$result1 = mysql_query("SELECT * FROM fr_ins_subject WHERE user_id = '".$_SESSION['user_id']."' ORDER BY Date_Created DESC");
	
	}

		while ($row = mysql_fetch_array($result1)) 
		{
			
			if($bol == false)
			{
				$subject_id = $row['subject_id'];
			}
			else
			{
				$subject_id = $row['id'];
			}
			
			$result = mysql_query("SELECT DISTINCT news.id,news.message,news.date,staff.FirstN,staff.LastN,studsub.subject FROM  fr_news as news , fr_staff as staff, fr_stud_subject as studsub WHERE staff.user_id = news.ins_id AND studsub.subject_id = news.subject_id AND news.subject_id = '".$subject_id."' ORDER BY news.date DESC");
			if(mysql_num_rows($result) > 0)
			{

				while ($obj = mysql_fetch_object($result)) 
				{ 	
					$var[] = $row;
				}
			}
		}

		echo json_encode($var);
	

?>
