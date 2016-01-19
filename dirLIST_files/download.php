<?PHP
//dirLIST v0.3.0 file download script
error_reporting(0);
set_time_limit(0);
require("../php/config.php");
require("config.php");

$_GET['item_name'] = base64_encode(rawurldecode(base64_decode($_GET['item_name']))); //this is messy i know, will fix it up

		if(!empty($_GET['folder']))
		{
			$file_path = '../'.$dir_to_browse;	
		}
		else
		{
			$file_path = '../'.$dir_to_browse.base64_decode($_GET['folder']);
		}	
			$file_path .= (empty($_GET['folder'])) ? base64_decode($_GET['item_name']) : '/'.base64_decode($_GET['item_name']);

	
//Security feature to prevent downloading of files above $dir_to_browse
if(count(explode('../', base64_decode($_GET['item_name']))) > count(explode('../',$dir_to_browse)))
	die('Access Denied');

//Deny access to files and folders that have been excluded
foreach($exclude as $val)
{
	if($val != '.' && $val != '..')
	{
		if(count(explode($val, base64_decode($_GET['item_name']))) > 1)
			die('Access Denied');			  
	}
}

//Check if valid file
$file_valid = FALSE;
if($listing_mode == 0 && is_file($file_path))
{
	$file_valid = TRUE;
	$file_size = filesize($file_path);
}
elseif($listing_mode == 1)
{
	$ftp_stream = ftp_connect($ftp_host);
	$ftp_login = ftp_login($ftp_stream, $ftp_username, $ftp_password);
	$file_size = ftp_size($ftp_stream, $file_path);
	
	if($file_size != -1)
		$file_valid = TRUE;
}
if(is_file($file_path))
{
	if(!$file_valid)
		die('Error: The file <b>'.basename($file_path).'</b> does not exist. Please go back and select a file');


	//Check if valid file -done

	//At this stage, it is assumed that the file is valid and to proceed with prompting the user to download it

	$file_name = str_replace(array('+', " "), array('_','_'), basename($file_path));


	if(isset($_SESSION['shared_folder_id']) && $_SESSION['shared_folder_id'] != "")
	{
		$result = mysql_query("SELECT * FROM fr_ins_subject  WHERE id = '".$_SESSION['shared_folder_id']."'");
		$row = mysql_fetch_array($result);

		$result2 = mysql_query("SELECT * FROM  fr_stud WHERE user_id = '".$_SESSION['user_id']."'");
		$row2 = mysql_fetch_array($result2);

		$link = './index.php?folder=MjAxNi0yMDE3LzFzdCBTZW1lc3Rlci9JVDgvQWN0aXZpdHk=';
		$message = $row2['FName'].' '.$row2['LName']. ' download a file '.$file_name. ' from '. $row['Subject'];				
		
		$date = date ("y/m/d H:i:s");

		mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row['user_id']."','".$link."','".$message."','unread','".$date."')");

	}

	header('Cache-control: private');
	header('Content-Type: application/octet-stream'); 
	header('Content-Length: '.filesize($file_path));
	header('Content-Disposition: attachment; filename='.$file_name);
	ob_flush();

	$fh = ($listing_mode == 0) ? fopen($file_path, "r") : fopen('ftp://'.$ftp_username.':'.$ftp_password.'@'.$ftp_host.'/'.$file_path, "r");

	while(!feof($fh))
	{
		echo ($listing_mode == 0) ?  fread($fh, round($speed*1024, 0)) : fread($fh, 1048576);
		ob_flush();
		if($listing_mode == 0) sleep(1);
	}
	fclose($fh);
	exit;
}
else
{

		$file_name = str_replace(array('+', " "), array('_','_'), basename($file_path));
		$the_folder = $file_path;
		$zip_file_name = $file_name.'.zip';


		$result = mysql_query("SELECT * FROM fr_ins_subject  WHERE id = '".$_SESSION['shared_folder_id']."'");
		$row = mysql_fetch_array($result);

		$result2 = mysql_query("SELECT * FROM  fr_stud WHERE user_id = '".$_SESSION['user_id']."'");
		$row2 = mysql_fetch_array($result2);

		$link = './index.php?folder=MjAxNi0yMDE3LzFzdCBTZW1lc3Rlci9JVDgvQWN0aXZpdHk=';
		$message = $row2['FName'].' '.$row2['LName']. ' download a file '.$file_name. ' from '. $row['Subject'];				
		
		$date = date ("y/m/d H:i:s");

		mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row['user_id']."','".$link."','".$message."','unread','".$date."')");


		$download_file= true;

		class FlxZipArchive extends ZipArchive {
		    /** Add a Dir with Files and Subdirs to the archive;;;;; @param string $location Real Location;;;;  @param string $name Name in Archive;;; @author Nicolas Heimann;;;; @access private  **/

		    public function addDir($location, $name) {
		        $this->addEmptyDir($name);

		        $this->addDirDo($location, $name);
		     } // EO addDir;

		    /**  Add Files & Dirs to archive;;;; @param string $location Real Location;  @param string $name Name in Archive;;;;;; @author Nicolas Heimann
		     * @access private   **/
		    private function addDirDo($location, $name) {
		        $name .= '/';
		        $location .= '/';

		        // Read all Files in Dir
		        $dir = opendir ($location);
		        while ($file = readdir($dir))
		        {
		            if ($file == '.' || $file == '..') continue;
		            // Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
		            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
		            $this->$do($location . $file, $name . $file);
		        }
		    } // EO addDirDo();
		}

		$za = new FlxZipArchive;
		$res = $za->open($zip_file_name, ZipArchive::CREATE);
		if($res === TRUE) 
		{
		    $za->addDir($the_folder, basename($the_folder));
		    $za->close();
		}
		else  { echo 'Could not create a zip archive';}

		if ($download_file)
		{
		    ob_get_clean();
		    header("Pragma: public");
		    header("Expires: 0");
		    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		    header("Cache-Control: private", false);
		    header("Content-Type: application/zip");
		    header("Content-Disposition: attachment; filename=" . basename($zip_file_name) . ";" );
		    header("Content-Transfer-Encoding: binary");
		    header("Content-Length: " . filesize($zip_file_name));
		    readfile($zip_file_name);
		    ob_flush();

		    if(is_dir($zip_file_name.'/'))
			delete_directory($zip_file_name.'/', 0);
			elseif(is_file($zip_file_name))
				unlink($zip_file_name);
			exit;
		}	
}


?>