<?PHP session_start();
include_once("php/config.php");
require("dirLIST_files/config.php");
require("dirLIST_files/functions.php");

error_reporting(0);
set_time_limit(0);



if(!isset($_SESSION['login'])) 
{
        header("Location: login.php");
} 


if(isset($_GET['id']))
{
		$result1 = mysql_query("SELECT * FROM fr_path  WHERE id = '".$_GET['id']."'")or die(mysql_error());
		if(mysql_num_rows($result1) > 0)
		{
			$row = mysql_fetch_array($result1);
			$dir_to_browse = $row['url']."/";
		}
}
else
{
	$url_folder = base64_decode(trim($_GET['folder']));
	if(!empty($_GET['folder']))
		$dir_to_browse .= $url_folder."/";
}



//Load time
if($load_time == 1)
	$start_time = array_sum(explode(" ",microtime()));

//Set the view mode: thumbnails or list
if(isset($_SESSION['view_mode_session']))
	$view_mode = $_SESSION['view_mode_session'];
	

$local_text = set_local_text($default_language);
$lang_id = $default_language;

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>WLC Web-Base File Repository - <?PHP if(empty($url_folder)) echo "Index of: home/"; else echo "Index of: home/".$url_folder.""; ?></title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
	<style type="text/css">
		<!--

		.path_font {font-family: "Courier New", Courier, monospace;}
		.banned_font {font-size: 9px;}
		.error {border-top-width: 2px;border-bottom-width: 2px;border-top-style: solid;border-bottom-style: solid;border-top-color: #FF666A;border-bottom-color: #FF666A;}
		#color_scheme {cursor:pointer;}
		.option_style {font-family: Verdana, Tahoma;font-size: 11px;}
		.language_selection {height: 22px;	width: 182px;background-color:<?PHP echo $color_scheme['main_table']['file_bg1']; ?>;	border: 1px dashed #666666;}
		.selected_lang {background-color:<?PHP echo $color_scheme['main_table']['file_bg2']; ?>;}
		#file_edit_box {position:absolute;width: 180px;display:none; z-index:50}
		-->
	</style>
	<?PHP if($view_mode == 0) { //enable the javascript required for thumbnail view?>
	<script type="text/javascript">
		var images_paths = [];
		var thumb_counter = 0;

		function display_thumbs() {
			more_thumbs = true;
			
			while(more_thumbs){
				thumb = document.getElementById('img_thumb_'+thumb_counter);
				if(document.getElementById('img_thumb_'+thumb_counter) != null){
					images_paths.push(thumb.getAttribute('link_att'));
					get_thumb(thumb_counter);
					thumb_counter++;
				}
				else
					more_thumbs = false;
			}
		}

		function get_thumb(id) 
		{
			var xhr;
			try	{ xhr = new XMLHttpRequest();}
			catch(e)
			{
				try
				{
					xhr = new ActiveXObject("Msxml12.XMLHTTP");
				}
				catch(e)
				{
					try
					{
						xhr = new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e)
					{
						alert("Your browser does not support AJAX!");
						return false;
					}
				}
			}
			xhr.onreadystatechange = function()
			{
				if(xhr.readyState == 4)
				{
					document.getElementById('img_thumb_'+id).setAttribute('src', 'dirLIST_files/thumb_gen.php?image_path='+document.getElementById('img_thumb_'+id).getAttribute('link_att'));
				}
			}
			xhr.open("GET", "dirLIST_files/thumb_gen.php?image_path="+images_paths[id], true);
			xhr.send(null);
		}
		</script>
		<?PHP } ?>
		
		<?PHP if($_SESSION['logged_in']) { ?>
		<script type="text/javascript">
		var selected_item_type;
		var selected_item_id;
		var mouse_x;
		var mouse_y;

		var ms_ie = document.all?true:false;

		if (!ms_ie) document.captureEvents(Event.MOUSEMOVE)

		document.onmousemove = update_mouse_xy;

		function update_mouse_xy(e)
		{
			if(ms_ie)
			{
				mouse_x = event.clientX + document.body.scrollLeft;
				mouse_y = event.clientY + document.body.scrollTop;
			}
			else
			{
				mouse_x = e.pageX;
				mouse_y = e.pageY;
			}
			
			return true
		}

		function show_div(item_type, item_id)
		{
			selected_item_type = item_type;
			selected_item_id = item_id;
			
			x = mouse_x;
			y = mouse_y;
			
			//some browsers may return negative values
			if(x < 0) x = 0;
			if(y < 0) y = 0;
			
			document.getElementById('file_edit_box').style.display = 'block';
			document.getElementById('file_edit_box').style.left = x-19+'px';
			document.getElementById('file_edit_box').style.top = y-19+'px';
		}

		function mouse_out_handler(event)
		{
			var toElement = null;
			
			if(event.relatedTarget)
				toElement = event.relatedTarget;
			else if(event.toElement)
				toElement = event.toElement;
			
			while (toElement && toElement.tagName != "DIV") 
				toElement = toElement.parentNode;
			
			if(!toElement)
				document.getElementById('file_edit_box').style.display = 'none';
		}

		function check_for_update() 
		{
			var xhr;
			try	{ xhr = new XMLHttpRequest();}
			catch(e)
			{
				try
				{
					xhr = new ActiveXObject("Msxml12.XMLHTTP");
				}
				catch(e)
				{
					try
					{
						xhr = new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e)
					{
						return false;
					}
				}
			}
			xhr.onreadystatechange = function()
			{
				document.getElementById('checking_gif').style.display = 'block';
				document.getElementById('update_link_container').innerHTML = '';
				if(xhr.readyState == 4)
				{
					document.getElementById('checking_gif').style.display = 'none';
					if(xhr.responseText == 1)
					{
						document.getElementById('update_link_container').innerHTML = '<a href="http://dir-list.sourceforge.net/process/redir_to_update.php" target="_blank"><?PHP echo $local_text['update_available']; ?>!</a>';
					}
					else
					{
						document.getElementById('update_link_container').innerHTML = '<?PHP echo $local_text['no_update_found']; ?>'
					}
				}
			}
			xhr.open("GET", "dirLIST_files/version_check.php?version=0.3.0", true);
			xhr.send(null);
		}
	</script>
	<?PHP } ?>
	
</head>

<body <?PHP if($view_mode == 0) echo 'onload="display_thumbs();"';?>>
	<!-- start: Header -->
	<?php include('php/header.php'); ?>
	<!-- start: Header -->
		
<!-- start: Header -->
	
	<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php include('php/menu.php'); ?>
			<!-- end: Main Menu -->
			
			<!-- start: Content -->
			<div id="content" class="span10">
				
				<ul class="breadcrumb">
					<?php
					//Breadcrumbs and admin logout link
					
					$this_file_name = basename($_SERVER['PHP_SELF']);
					$this_file_size = filesize($this_file_name);
					echo '<li> <i class="icon-home"></i> <a href="'.$this_file_name.'">Home</a><i class="icon-angle-right"> </i> </li>';
					if(!empty($url_folder))
					{
						$folders_in_url = explode("/", $url_folder);
						$folders_in_url_count = count($folders_in_url);
						for($i=0;$i<$folders_in_url_count;$i++)
						{
							$temp = "";
							for($j=0;$j<$i+1;$j++)
							{
								$temp .= "/".$folders_in_url[$j];
							}
							$temp = substr($temp, 1);
							echo '<li> <a href="'.$this_file_name.'?folder='.base64_encode($temp).'">'.$folders_in_url[$i].'</a><i class="icon-angle-right"> </i></li>';
						}
					}

					?>
				</ul>
				
				<div class="row-fluid">	
					<div class="box span3">
						<div class="box-header">
							<h2><i class="halflings-icon eye-open"></i><span class="break"></span>Folders</h2>
						</div>
						<div class="box-content">
							<table class="table  table-striped">
								<thead>
									<th><i class="halflings-icon folder-close"></i> My Folder</th>
								</thead>
								<tbody>
								<?php 
									$result = mysql_query("SELECT * FROM  fr_path WHERE user_id = '".$_SESSION['user_id']."'") or die('Error share: '. mysql_error());
								 	if(mysql_num_rows($result) > 0)
								 	{
								 		while ($row = mysql_fetch_array($result)) 
								 		{								 			
								 ?>
								 		<tr> <td><a href="index.php?id=<?php echo $row['id']; ?>"><i class="halflings-icon folder-open"></i> <?php echo basename($row['url']); ?></a> </td> </tr>
								 <?php
								 		}
								 	}
								 ?>
								</tbody>
							 </table>
							<table class="table table-striped">
								<thead>
									<th><i class="halflings-icon folder-close"></i> Shared </th>
								</thead>
								<tbody>
								<?php 
									$result = mysql_query("SELECT fp.* FROM  fr_path as fp ,fr_share_folder as fsf WHERE fp.id = fsf.path_id AND  fsf.user_id = '".$_SESSION['user_id']."'") or die('Error share: '. mysql_error());
								 	if(mysql_num_rows($result) > 0)
								 	{
								 		while ($row = mysql_fetch_array($result)) 
								 		{								 			
								 ?>
								 		<tr> <td> <a href="index.php?folder=<?php echo  basename(base64_encode($row['url'])); ?>"><i class="halflings-icon folder-open"></i> <?php echo basename($row['url']); ?></a> </td> </tr>
								 <?php
								 		}
								 	}
								 ?>
								</tbody>
						  	</table>
						  	<table class="table table-striped">
								<thead>
									<th><i class="halflings-icon folder-close"></i> Subject </th>
								</thead>
								<tbody>
								<?php 
									$result = mysql_query("SELECT fp.* FROM  fr_path as fp ,fr_share_folder as fsf WHERE fp.id = fsf.path_id AND  fsf.user_id = '".$_SESSION['user_id']."'") or die('Error share: '. mysql_error());
								 	if(mysql_num_rows($result) > 0)
								 	{
								 		while ($row = mysql_fetch_array($result)) 
								 		{								 			
								 ?>
								 		<tr> <td> <a href="index.php?folder=<?php echo  basename(base64_encode($row['url'])); ?>"><i class="halflings-icon folder-open"></i> <?php echo basename($row['url']); ?></a> </td> </tr>
								 <?php
								 		}
								 	}
								 ?>
								</tbody>
						  	</table>
						</div>
					</div><!--/span-->
					
					<div class="box span9">
						<div class="box-header">
							<h2><i class="halflings-icon list"></i><span class="break"></span>Buttons</h2>
						</div>
						<div class="box-content files">
							 <?php require('dirlist.php'); ?>
						</div>
					</div><!--/span-->
					
				</div><!--/row-->
							
			</div><!--/.fluid-container-->
				<!-- end: Content -->
		</div><!--/#content.span10-->
	</div><!--/fluid-row-->
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; <a href="index.php" alt="Bootstrap_Metro_Dashboard">CICTE WLC WEB-BASE FILE REPOSITORY</a></span>
			
		</p>

	</footer>

	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	
		<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->

	<style type="text/css">

		td
		{
			display: table-cell;
			vertical-align: inherit;
			z-index:99999;
		}

		.file_bg2
		{
			background-color: #dcff99;
			
		}

		.file_bg2 img
		{
			
		
		}

		.file_bg2 ul 
		{
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		    background-color: #dcff99;
		}


		.file_bg2 li
		{
			float: left;
			display: block;
		    text-align: center;
		    text-decoration: none;
		    padding: 5px;
		    margin-left: 5px;
		}

		.file_bg2 ul:hover
		{
			 background: #e5ffb3;
		}
		
	</style>


	<div id="file_edit_box" onmouseout="mouse_out_handler(event);">
	  <table width="100%" border="0" class="table_border" >
	    <tr>
	    	<td align="" class="file_bg2" onclick="ren();" style="cursor:pointer">
	    	<ul>
	    		<li>
	    			<img src="dirLIST_files/edit_files/rename.png" alt="rename" name="rename" width="20px" height="20px" id="rename" style="cursor:pointer" />
	    		</li>
		    	<li>
		    		Rename
		    	</li>
	    	</ul>
	    	</td>
	    </tr>
	    <tr>
	    	<td align="" class="file_bg2" onclick="delete_item();" style="cursor:pointer">
		    	<ul>
		    		<li>
		    			<img src="dirLIST_files/edit_files/delete.png" alt="delete" name="detele" width="20px" height="20px" border="0" id="detele"/>
		    		</li>
			    	<li>
			    		Delete
			    	</li>
		    	</ul>
	      	</td>
	    </tr>
	    <tr>
	    	<td align="" class="file_bg2" onclick="download();" style="cursor:pointer">
		    	<ul>
		    		<li>
		    			<img src="dirLIST_files/edit_files/down.png" width="20px" height="20px">
		    		</li>
			    	<li>
			    		Download
			    	</li>
		    	</ul>
	      	</td>
	    </tr>
	    <tr>
	    	 <td align="" class="file_bg2" onclick="set_deadline();" style="cursor:pointer">
	    	 <ul>
	    		<li>
	    			<img src="dirLIST_files/edit_files/folderopened.png" width="20px" height="20px">
	    		</li>
		    	<li>
		    		Set Deadline
		    	</li>
	    	</ul>
	      	</td>
	    </tr>
	    <tr>
	    	 <td align="" class="file_bg2" onclick="share_folder();" style="cursor:pointer">
	    	 <ul>
	    		<li>
	    			<img src="dirLIST_files/edit_files/folderopened.png" width="20px" height="20px">
	    		</li>
		    	<li>
		    		share
		    	</li>
	    	</ul>
	      	</td>
	    </tr>
	    <tr>
	    	<td align="" class="file_bg2" onclick="archive();" style="cursor:pointer">
		    	<ul>
		    		<li>
		    			<img src="dirLIST_files/edit_files/rar.png" width="20px" height="20px">
		    		</li>
			    	<li>
			    		Archive folder
			    	</li>
		    	</ul>
	      	</td>
	    </tr>
	    <tr>
	    	<td align="" class="file_bg2" onclick="backup();" style="cursor:pointer">
		    	<ul>
		    		<li>
		    			<img src="dirLIST_files/edit_files/backup.jpg" width="20px" height="20px">
		    		</li>
			    	<li>
			    		Backup folder
			    	</li>
		    	</ul>
	      	</td>
	    </tr>
	  </table>
	</div>
	<script type="text/javascript">
	var js_files_and_folders_base64 = [
		[<?PHP 
		 foreach($folders_sorted as $key => $val)
		 	$folders_string_base64 .= '\''.base64_encode($folders['name'][$key]).'\',';
		echo substr($folders_string_base64, 0, -1);
		 ?>],
		[<?PHP 
		 foreach($files_sorted as $key => $val)
		 	$files_string_base64 .= '\''.base64_encode($files['name'][$key]).'\',';
		echo substr($files_string_base64, 0, -1);
		 ?>]
	];

	var js_files_and_folders = [
		[<?PHP 
		 foreach($folders_sorted as $key => $val)
		 	$folders_string .= '\''.$folders['name'][$key].'\',';
		echo substr($folders_string, 0, -1);
		 ?>],
		[<?PHP 
		 foreach($files_sorted as $key => $val)
		 	$files_string .= '\''.$files['name'][$key].'\',';
		echo substr($files_string, 0, -1);
		 ?>]
	];

	function delete_item()
	{
		item_name = js_files_and_folders[selected_item_type][selected_item_id];
		item_name_base64 = js_files_and_folders_base64[selected_item_type][selected_item_id];
		if(confirm("********<?PHP echo $local_text['warning']; ?>!********\n\n<?PHP echo $local_text['no_go_back']; ?>\n\n"+'<?PHP echo $local_text['sure_to_del']; ?> ` '+item_name+' ` ?')) window.location = 'dirLIST_files/edit_files/delete.php?folder=<?PHP echo $_GET['folder']; ?>&item_name='+item_name_base64;
	}

	function ren()
	{
		item_name_base64 = js_files_and_folders_base64[selected_item_type][selected_item_id];
		window.open('dirLIST_files/edit_files/rename.php?folder=<?PHP echo $_GET['folder']; ?>&item_name='+item_name_base64, null, 'scrollbars = 0, status = 1, height = 135, width = 470, resizable = 1, location = 0');
	}

	function download()
	{
		item_name_base64 = js_files_and_folders_base64[selected_item_type][selected_item_id];
		location.href='dirLIST_files/download.php?folder=<?PHP echo $_GET['folder']; ?>&item_name='+item_name_base64;
	}	

	</script>


</body>
</html>	
	
	


