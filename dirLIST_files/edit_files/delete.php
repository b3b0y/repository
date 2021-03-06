<?PHP
//dirLIST v0.3.0 file/folder deletion file
session_start();
include_once("../../php/config.php");

if(!$_SESSION['logged_in'] || empty($_GET['item_name']))
	die('Access Denied');

require('../config.php');
require('../functions.php');

if($listing_mode == 0) //http deletion
{
	if(!empty($_GET['folder']))
	{
		$item_path = '../../'.$dir_to_browse;
	}
	else
	{
		$item_path = '../../'.$dir_to_browse.base64_decode($_GET['folder']);
	}	
	 	$item_path .= (empty($_GET['folder'])) ? base64_decode($_GET['item_name']) : base64_decode($_GET['item_name']);
	

	
	if(is_dir($item_path.'/'))
		delete_directory($item_path.'/', 0);
	elseif(is_file($item_path))
		unlink($item_path);
		
	if(isset($_SESSION['studsub']) && $_SESSION['studsub'] != '')
	{
		header("Location: ../../index.php?studsub=".$_SESSION['studsub']);
		exit;
	}
	else if(isset($_SESSION['subf']) && $_SESSION['subf'] != '')
	{
		header("Location: ../../index.php?subf=".$_SESSION['subf']."&&folder1=".$_SESSION['folder1']);
		exit;
	}
	else
	{
		header("Location: ../../index.php?folder=".$_GET['folder']);
		exit;
	}	


}
elseif($listing_mode == 1) //ftp deletion
{
	$item_path = $dir_to_browse.base64_decode($_GET['folder']);
	
	$item_path .= (empty($_GET['folder'])) ? base64_decode($_GET['item_name']) : '/'.base64_decode($_GET['item_name']);
	
	$ftp_stream = ftp_connect($ftp_host);
	ftp_login($ftp_stream, $ftp_username, $ftp_password);
	
	if(ftp_size($ftp_stream, $item_path) != '-1')
		@ftp_delete($ftp_stream, $item_path);
	else
		delete_directory($item_path.'/', 1);
	
	if(isset($_SESSION['subf']) && $_SESSION['subf'] != '')
	{
		header("Location: ../index.php?subf=".$_SESSION['subf']."&&folder1=".$_SESSION['folder1']);
		exit;
	}
	else
	{
		header("Location: ../../index.php?folder=".$_GET['folder']);
	exit;
	}	

}
?>