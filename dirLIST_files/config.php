<?PHP session_start();

//Listing mode. 0:HTTP directory Listing 1:FTP directory listing
$listing_mode = 0;

//Directory to browse ***INCLUDING TRAILING SLASH***. Leave it as "./" if you want to browse the directory this file is in for HTTP listing or leave it blank for browsing the root directory for FTP listing.  This can be an absolute or relative path (relative to the index.php file). CAUTION: Listing a directory above your web root will cause errors.
//$dir_to_browse = "./Data/"; //default[HTTP] = "./" or default[FTP] = "/"
	
	
	if( !isset($_GET['id']) || !isset($_GET['subf']) || !isset($_GET['studsub']) || !isset($_GET['share']) || !isset($_GET['archive']))
	{
		$result1 = mysql_query("SELECT fr_path.* FROM fr_path  WHERE user_id = '".$_SESSION['user_id']."'")or die(mysql_error());
		if(mysql_num_rows($result1) > 0)
		{
			$row = mysql_fetch_array($result1);
			$dir_to_browse = $row['url']."/";
		}
	}
	
	if(isset($_GET['notid']) && !empty($_GET['notid']))
	{
		mysql_query("UPDATE fr_notification SET status = 'read' WHERE id = '".$_GET['notid']."'");
	}
	
	
	if(isset($_GET['id']) && $_GET['id'] != "")
	{
		$result1 = mysql_query("SELECT * FROM fr_path  WHERE id = '".$_GET['id']."' AND user_id = '".$_SESSION['user_id']."'")or die(mysql_error());
		if(mysql_num_rows($result1) > 0)
		{
			$row = mysql_fetch_array($result1);
			 $_SESSION['dir_to_browse'] =  $row['url']."/";
			$dir_to_browse = $row['url']."/";
		
			$result1 = mysql_query("SELECT * FROM fr_user_permissions WHERE user_id = '".$_SESSION['user_id']."'");
			$row1 = mysql_fetch_array($result1);

			$_SESSION['upload'] = $row1['upload'];
			$_SESSION['download'] = $row1['download'];
			$_SESSION['create_folders'] = $row1['create_folders'];
			$_SESSION['rename'] = $row1['rename_F'];
			$_SESSION['delete'] = $row1['delete_F'];

			if($_SESSION['UserLvl'] >= 3)
			{
				$result2 = mysql_query("SELECT * FROM fr_staff WHERE user_id = '".$_SESSION['user_id']."'");
				if (mysql_num_rows($result2)) 
				{
					$row2 = mysql_fetch_array($result2);

					$_SESSION['size_limit'] = $row2['size_limit'] * 1024;
				}
			}
			else if($_SESSION['UserLvl'] == 1)
			{
				$result2 = mysql_query("SELECT * FROM fr_stud");

				$row2 = mysql_fetch_array($result2);

				$_SESSION['size_limit'] = $row2['size_limit'] * 1024;
			}

			unset($_SESSION['share']);
			unset($_SESSION['folder2']);
			unset($_SESSION['shared_folder_id']);		
		}
		else
		{
			header("Location: index.php?folder=".$_POST['folder']."&err=".base64_encode("link"));
        	exit;
			
		}
	}
	else if(isset($_GET['subf']) && $_GET['subf'] != "") 
	{
		$result1 = mysql_query("SELECT * FROM fr_ins_subject  WHERE id = '".$_GET['subf']."' AND user_id = '".$_SESSION['user_id']."'")or die(mysql_error());
		if(mysql_num_rows($result1) > 0)
		{
			$row = mysql_fetch_array($result1);
			 $_SESSION['dir_to_browse'] = $row['SubPath']."/";
			 $dir_to_browse = $row['SubPath']."/";

			$result1 = mysql_query("SELECT * FROM fr_user_permissions WHERE user_id = '".$_SESSION['user_id']."'");
			$row1 = mysql_fetch_array($result1);

			$_SESSION['size_limit'] = $row['size_limit'] * 1024;

			$_SESSION['subf'] = $_GET['subf'];
			$_SESSION['folder1'] = $_GET['folder1'];

			$_SESSION['upload'] = $row1['upload'];
			$_SESSION['download'] = $row1['download'];
			$_SESSION['create_folders'] = $row1['create_folders'];
			$_SESSION['rename'] = $row1['rename_F'];
			$_SESSION['delete'] = $row1['delete_F'];

			unset($_SESSION['share']);
			unset($_SESSION['folder2']);
			unset($_SESSION['shared_folder_id']);
		}
		else
		{
			header("Location: index.php?folder=".$_POST['folder']."&err=".base64_encode("link"));
        	exit;
			
		}

	}
	else if(isset($_GET['studsub']) && $_GET['studsub'] != "") 
	{
		$result1 = mysql_query("SELECT * FROM fr_stud_subject  WHERE subject_id = '".$_GET['studsub']."' AND user_id = '".$_SESSION['user_id']."'")or die(mysql_error());
		if(mysql_num_rows($result1) > 0)
		{
			$row = mysql_fetch_array($result1);
			 $_SESSION['dir_to_browse'] = $row['url']."/";
			 $dir_to_browse = $row['url']."/";

			$result1 = mysql_query("SELECT * FROM fr_user_permissions WHERE user_id = '".$_SESSION['user_id']."'");
			$row1 = mysql_fetch_array($result1);

			$_SESSION['studsub'] = $_GET['studsub'];

			$_SESSION['upload'] = $row1['upload'];
			$_SESSION['download'] = $row1['download'];
			$_SESSION['create_folders'] = $row1['create_folders'];
			$_SESSION['rename'] = $row1['rename_F'];
			$_SESSION['delete'] = $row1['delete_F'];

			$_SESSION['size_limit'] = $row['size_limit'] * 1024;

			unset($_SESSION['share']);
			unset($_SESSION['folder2']);
			unset($_SESSION['shared_folder_id']);;
		}
		else
		{
			header("Location: index.php?folder=".$_POST['folder']."&err=".base64_encode("link"));
        	exit;
			
		}
	}
	else if(isset($_GET['share']) && $_GET['share'] != "") 
	{

		$result1 = mysql_query("SELECT * FROM  fr_share_folder  WHERE id = '".$_GET['share']."' AND user_id = '".$_SESSION['user_id']."'")or die(mysql_error());
		if(mysql_num_rows($result1) > 0)
		{
			$row = mysql_fetch_array($result1);

			$_SESSION['shared_folder_id'] = $row['folder_id'];

			$_SESSION['share'] = $_GET['share'];
			$_SESSION['folder2'] = $_GET['folder2'];

			$_SESSION['Activity'] = $row['shared_name'];
			$_SESSION['download'] = $row['download'];
			$_SESSION['upload'] = $row['upload'];
			$_SESSION['rename'] = 0;
			$_SESSION['delete'] = 0;
			$_SESSION['create_folders'] = 0;

			$_SESSION['dir_to_browse'] = $row['url']."/";
			$dir_to_browse = $row['url']."/";
		}
		else
		{
			header("Location: index.php?folder=".$_POST['folder']."&err=".base64_encode("link"));
        	exit;
			
		}
	}
	else if(isset($_GET['archive']) && $_GET['archive'] != "") 
	{
		$result1 = mysql_query("SELECT * FROM  fr_archive  WHERE id = '".$_GET['archive']."' AND user_id = '".$_SESSION['user_id']."'")or die(mysql_error());
		if(mysql_num_rows($result1) > 0)
		{
			$row = mysql_fetch_array($result1);

			$result1 = mysql_query("SELECT * FROM fr_user_permissions WHERE user_id = '".$_SESSION['user_id']."'");
			$row1 = mysql_fetch_array($result1);

			$_SESSION['upload'] = $row1['upload'];
			$_SESSION['download'] = $row1['download'];
			$_SESSION['create_folders'] = $row1['create_folders'];
			$_SESSION['rename'] = $row1['rename_F'];
			$_SESSION['delete'] = $row1['delete_F'];


			$_SESSION['dir_to_browse'] = $row['current_url']."/";
			$dir_to_browse = $row['current_url']."/";

			unset($_SESSION['share']);
			unset($_SESSION['folder2']);
			unset($_SESSION['shared_folder_id']);
		}
		else
		{
			header("Location: index.php?folder=".$_POST['folder']."&err=".base64_encode("link"));
        	exit;
			
		}

	}
	else
	{
		if (!empty($_SESSION['dir_to_browse'])) 
		{
			$dir_to_browse =  $_SESSION['dir_to_browse'];
			$url_folder = base64_decode(trim($_GET['folder']));
		 	if(!empty($_GET['folder']))
			 	$dir_to_browse .= $url_folder."/";
		}
		else
		{
			$_SESSION['dir_to_browse'] = "";
		 	$url_folder = base64_decode(trim($_GET['folder']));
		 	if(!empty($_GET['folder']))
			 	 $dir_to_browse .= $url_folder."/";
		}
	}





//Download speed limit for files (HTTP only, FTP currently not supported). 0:Disable 1:Enable
$limit_download_speed = 0; //default = 0
$speed = 512; //Value in KB/s (KiloBytes per second). An example value: 128 (do not include "KB/s")

//File uploading (HTTP only, FTP currently not supported). ***ENABLE THIS FEATURE AT YOUR OWN RISK***. Please refer to the readme file (dirLIST_files/README.txt). For the maximum file upload size, please also refer to the readme file.
$file_uploads = 1; //default = 1;
$banned_file_types = array(); //add any other extensions you want banned (in lower-case)
$display_banned_files = 1; //Enable this to display a list of the file types banned on the main page. 0:Disable 1:Enable

//Files and/or folders to exclude from listing. dirLIST related files and folders are automatically excluded.
$exclude = array('.','..','.ftpquota','.htaccess', '.htpasswd', 'dirLIST_files');

//Files to exclude based on extension (eg: '.jpg' or '.PHP') and whether to be case sensitive. 0:Disable 1:Enable 
$exclude_ext = array('.something');
$case_sensative_ext = 0; //default = 0

//Image types to show thumbnails for (only types allowed are: .jpg .jpeg .png .gif) [Works best with HTTP listing]
$thumb_types = array('.jpg', '.jpeg', '.png', '.gif');

//= = = = = = = = = = = = = = = = = = = = = = = = = =
//A  P  P  E  A  R  A  N  C  E   S  E  C  T  I  O  N
//= = = = = = = = = = = = = = = = = = = = = = = = = =

//Color schemes and whether to make it user selectable 0:Disable 1:Enable. 
$color_scheme_code = 0; //0:Blue 1:Red/Pink 2:Green 3:Yellow 4:Brown 5:Gray/Black
$color_scheme_user_selectable = 1; //default = 1

//Default view mode: thumbnails or list. 0:Thumbnails 1:List
$view_mode = 0; //default = 0
$view_mode_user_selectable = 1; // 0:No 1:Yes

//Display thumbnails of supported images? 0:Disable 1:Enable (please note that this feature may not work well with FTP)
$display_image_thumbs = 1;

//Enable content viewers? [HTTP LISTING ONLY]
$enable_gallery = 1; //When image file(s) are detected in the listed directory, a link is displayed to open the gallery
$enable_media_player = 1; //When mp3 file(s) are detected in the listed directory, a link is displayed to open the music player

//Language/Localisation settings. Set to a value of 0 for English, 1 for French, 2 for German and 3 for Spanish
$default_language = 0; //0:English, 1:French, 2:German, 3:Spanish
$language_user_selectable = 1; //Allow users to change the display language? 0:No, 1:Yes

//Statistics/legend/load time. 1:Enable 0:Disable
$statistics = 1; //default = 1
$legend = 1; //default = 1
$load_time = 1; //default = 1

//File icons. 0: Disabled 1:Enabled [List view only]
$file_icons = 1; //default = 1

//Sorting method. 0:By name 1:By size 2:By Date
$sort_by = 0; //default = 0
$sort_order = 0; //0:Ascending 1:Descending

//Hide file extensions from being displayed. 0:Disabled 1:Enabled
$hide_file_ext = 0; //default = 0

//Folder sizes. Disabling this will greatly improve performance if there are several hundred folders/files. However, size of folders wont show. Also note that if the listing mode is FTP, enabling folder size will very likely cause a script timeout. 1:Enable 0:Disable
$show_folder_size_http = 1; //default = 1
$show_folder_size_ftp = 0; //default = 0

//Table formatting (values in pixels)
$width_of_files_column = "450"; //default = 450
$width_of_sizes_column = "100"; //default = 100
$width_of_dates_column = "125"; //default = 125

//= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
//U  S  E  R    C  O  N  F  I  G  U  R  A  T  I  O  N    -    D  O  N  E  
//= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
?>