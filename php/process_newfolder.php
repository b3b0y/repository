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
		header("Location: ../index.php?folder=".$_POST['folder']);
		exit;
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
