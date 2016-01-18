<?php date_default_timezone_set("Asia/Hong_kong");
	session_start();


	if($_SESSION['UserLvl'] < 4)
	{
	        header("Location: ../index.php");
	} 
    else
    {  

    
	$file_path = "../Data";

	if(is_dir($file_path))
	{
		$file_name = str_replace(array('+', " "), array('_','_'), basename($file_path));
		$the_folder = $file_path;
		$zip_file_name = 'CICTE-Repository-Backup-'.date("Ymd-His", time()).'.zip';


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

	
		  header('Location: ../dashboard.php');
	}


?>