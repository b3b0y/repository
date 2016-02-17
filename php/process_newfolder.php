<?php
include_once("config.php");
require('../dirLIST_files/config.php');
require('../dirLIST_files/functions.php');



	if($_POST['submit'] == $local_text['upload'])
	{
	$file_name =  $_POST['file'];
	if(get_magic_quotes_gpc()) 
	{ 
		$file_name  = stripslashes( $_POST['file']); 
	}

	$folder = base64_decode($_POST['folder']);
	(substr($folder, -1, 1) != "/" && !empty($folder) ? $folder .= "/" : $folder);
	$new_path = '../'.$dir_to_browse.$folder.$file_name;
	
	if(in_array(strtolower(strrchr($file_name, ".")), $banned_file_types))
	{
		header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("upload_banned"));
		exit;
	}

	$same_file_counter = 1;
	
	while(is_dir($new_path))
	{
		 $new_path = '../'.$dir_to_browse.$folder.$file_name.'['.$same_file_counter.']';																																										
		$same_file_counter++;
	}

	if(mkdir($new_path, 0700))
	{
		if(isset($_POST['folder']) && $_POST['folder'] != "")
		{
			header("Location: ../index.php?folder=".$_POST['folder']);
			exit;
		}
		else if(isset($_SESSION['subf']) && isset($_SESSION['folder1']))
		{
			$subf = $_SESSION['subf'];
			$folder1 = $_SESSION['folder1'];

			unset($_SESSION['subf']);
			unset($_SESSION['folder1']);

			header("Location: ../index.php?subf=".$subf.'&&folder1='.$folder1);
		}
		else if(isset($_SESSION['studsub']))
		{
			$studsub =  $_SESSION['studsub'];
			unset($_SESSION['studsub']);

			header("Location: ../index.php?studsub=".$studsub);
		}
		else
		{
			header("Location: ../index.php");
		}
		
	}	
	else
	{
		header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("upload_error"));
		exit;
	}
}
else
{
	header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("upload_error"));
	exit;
}
?>
