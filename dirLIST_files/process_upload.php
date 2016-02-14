<?PHP
//dirLIST v0.3.0 file upload processor file
include_once("../php/config.php");
require('config.php');
require('functions.php');
session_start();


if($file_uploads !=  1)
{
	header("Location: ../index.php");
	exit;
}
//some servers return empty $_POST and $_FILES arrays when the file size is too large
if(empty($_POST) || empty($_FILES))
{
	header("Location: ../index.php?err=".base64_encode("upload_error"));
	exit;
}

//check if file is too big
if($_FILES['file']['error'] == 1)
{
	header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("size"));
	exit;
}

//check if any file was uploaded
if($_FILES['file']['error'] == 4)
{
	header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("nofile"));
	exit;
}

$local_text = (empty($_SESSION['lang_id'])) ? set_local_text(0) : set_local_text($_SESSION['lang_id']);

if($_POST['submit'] == $local_text['upload'])
{
	$file_name = $_FILES['file']['name'];
	if(get_magic_quotes_gpc()) 
	{ 
		$file_name  = stripslashes($_FILES['file']['name']); 
	}

	$folder = base64_decode($_POST['folder']);
	(substr($folder, -1, 1) != "/" && !empty($folder) ? $folder .= "/" : $folder);
	$new_path = '../'.$dir_to_browse.$folder.$file_name;

	
	if(in_array(strtolower(strrchr($file_name, ".")), $banned_file_types))
	{
		header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("upload_banned"));
		exit;
	}

		if(isset($_SESSION['shared_folder_id']) && $_SESSION['shared_folder_id'] != "")
		{
			$result = mysql_query("SELECT * FROM fr_ins_subject  WHERE id = '".$_SESSION['shared_folder_id']."'");
			$row = mysql_fetch_array($result);

			$result2 = mysql_query("SELECT * FROM  fr_stud WHERE user_id = '".$_SESSION['user_id']."'");
			$row2 = mysql_fetch_array($result2);

			$link = 'reports.php?view=folder&&foldern='.basename($dir_to_browse.$folder);
			$message = $row2['FName'].' '.$row2['LName']. ' submit a file '.$file_name. ' in '. $row['Subject'];				
			
			$date = date ("y/m/d H:i:s");

			$path_parts = pathinfo($_FILES["file"]["name"]);
    		$extension = $path_parts['extension'];

			$new_path = '../'.$dir_to_browse.$folder.$row2['FName'].' '.$row2['LName'].".".$extension;

			if(is_dir($new_path.'/'))
				delete_directory($new_path.'/', 0);
			elseif(is_file($new_path))
				unlink($new_path);


			if(move_uploaded_file($_FILES['file']['tmp_name'], $new_path))
			{

				mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row['user_id']."','".$link."','".$message."','unread','".$date."')");

				mysql_query("INSERT INTO  project_notif(inst_id,stud_id,subject_id,folder_name,project_name,Date) VALUES('".$row['user_id']."','".$row2['user_id']."','".$row['id']."','".basename($dir_to_browse)."','".$row2['FName'].' '.$row2['LName'].'_'.$file_name."','".$date."')");

				header("Location: ../index.php?share=".$_SESSION['share']."&&folder2=".$_SESSION['folder2']);
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
			$same_file_counter = 1;

			while(is_file($new_path))
			{
				$file_ext_comp = strrchr($file_name, '.');
				$file_name_comp = substr($file_name, 0, -strlen($file_ext_comp));
				$new_path = '../'.$dir_to_browse.$folder.$file_name_comp.'['.$same_file_counter.']'.$file_ext_comp;																																										
				$same_file_counter++;
			}


			if(move_uploaded_file($_FILES['file']['tmp_name'], $new_path))
			{
				header("Location: ../index.php");
				exit;
			}	
			else
			{
				header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("upload_error"));
				exit;
			}

		}
}
else
{
	header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("upload_error"));
	exit;
}
?>