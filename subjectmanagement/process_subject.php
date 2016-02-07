<?php session_start();
	include_once("../php/config.php");

	if(isset($_POST['subject']))
	{
		mysql_query("INSERT INTO  fr_subject(SubCode,Description,SemID) VALUES('".$_POST['Subject']."','".$_POST['desc']."','".$_POST['SemID']."')") or die("Error:". mysql_error());

		echo '<script> alert("Successfully Added"); window.location.href="../subjectmanagement.php?subject=subject"; </script>';
	}
	
	if(isset($_GET['edit']) && $_GET['edit'] == true)
	{
		mysql_query("UPDATE fr_subject SET SubCode = '".$_POST['Subject']."' ,Description = '".$_POST['desc']."',SemID = '".$_POST['SemID']."' WHERE subID = '".$_POST['id']."'") or die("Error:". mysql_error());

		echo '<script> alert("Successfully Update"); window.location.href="../subjectmanagement.php?subject=subject"; </script>';
	}
?>
