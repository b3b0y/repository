<?php session_start();
	include_once("../php/config.php");

	if(isset($_POST['subject']))
	{
		mysql_query("INSERT INTO  fr_subject(SubCode,Description,SemID) VALUES('".$_POST['Subject']."','".$_POST['desc']."','".$_POST['SemID']."')") or die("Error:". mysql_error());

		echo '<script> alert("Successfully Added"); window.location.href="../subjectmanagement.php?subject=subject"; </script>';
	}
	
?>