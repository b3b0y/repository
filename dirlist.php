<?php 
	//Open FTP connection -done
	$folder_exists = true;
	//Check if directory exists
	if($listing_mode == 0)
		$folder_exists = (!is_dir($dir_to_browse)) ? false : true; //HTTP
	elseif($listing_mode == 1 && PHP_VERSION >= 5)
		$folder_exists = (!is_dir('ftp://'.$ftp_username.':'.$ftp_password.'@'.$ftp_host.$dir_to_browse)) ? false : true; //FTP

	if($folder_exists == false)
	{
		echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'><strong> Folder specified does not exist. This could be because you manually entered the folder name in the URL or you don't have permission to access this folder! Please Contact your Administrator</div></div>");

	}
	//Chcek if directory exists -done
	if($folder_exists == true)
	{

			//Open FTP connection
	if($listing_mode == 1)
	{
		$ftp_stream = ftp_connect($ftp_host) or die(display_error_message("<b>Could not connect to FTP host</b>"));
		@ftp_login($ftp_stream, $ftp_username, $ftp_password) or die(display_error_message("<b>Could not login to FTP host</b>"));
	}

	

	//This is a VERY important security feature. It prevents people from browsing directories above $dir_to_browse and any excluded folders. Edit this part at your own risk
	if(count(explode("../",$folder)) > 1 || in_array(basename($url_folder), $exclude))
	{
		echo display_error_message("<b>Access Denied</b>");
		exit;
	}

	if(strlen($url_folder) == 2 && $url_folder == "..")
	{
		echo display_error_message("<b>Access Denied</b>");
		exit;
	}
	//Seurity feature -done

	//Calculate table dimensions
	$table_width = 50+$width_of_files_column+$width_of_sizes_column+$width_of_dates_column;

	

	//Any upload error is displayed here
	switch(base64_decode($_GET['err']))
	{
		case "archive_file_error": echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>×</button><strong>Archived failed, cannot archive file!</div></div>")."<br />";break;
		case "archive_error": echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>×</button><strong>Archived failed, cannot archive this folder!</div></div>")."<br />";break;
		case "upload_banned": echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>×</button><strong>Upload failed, banned file type</div></div>")."<br />";break;
		case "upload_error": echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>×</button><strong>Upload failed, an unknown error occured</div></div>")."<br />";break;
		case "size": echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>×</button><strong>File size exceeded limit</b></div></div>")."<br />";break;
		case "nofile": echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>×</button><strong>Please select a file to upload!</div></div>")."<br />";break;
		case 'link' : echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <b>Error:</b> Folder specified does not exist. This could be because you manually entered the folder name in the URL or you don't have permission to access this folder</div></div>"); break;
		case "rename_archive": echo display_error_message("<div class='box-content alerts'> <div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>×</button><strong>Cant rename Archive folder!</div></div>")."<br />";break;
	
	}
	//Any upload error is displayed here -done

	//Change excluded extensions to lowercase if $case_sensative_ext is disabled
	if($case_sensative_ext == 0)
		foreach($exclude_ext as $key => $val)
			$exclude_ext[$key] = strtolower($val);

	//Initialize arrays
	$folders = array();
	$files = array();
	//initialize arrays -done

	//Get directory content seperatiung files and folders into 2 arrays and filtering them to remove those exlcluded
	//$dir_content = get_dir_content($dir_to_browse);

	$dir_content = get_dir_content($dir_to_browse);

	$folders['name'] = $dir_content['folders']['name'];
	$folders['date'] = $dir_content['folders']['date'];
	$folders['link'] = $dir_content['folders']['link'];
	$files['name'] = $dir_content['files']['name'];
	$files['size'] = $dir_content['files']['size'];
	$files['date'] = $dir_content['files']['date'];
	$files['link'] = $dir_content['files']['link'];
	$images_detected = $dir_content['images_detected'];
	$media_detected = $dir_content['media_detected'];

	//The folder size calculation has not been placed inside the get_dir_content function so as not to affect it's speed. This is important becasue folder_size calls upon get_dir_content
	if($view_mode == 1)
	{
		if($show_folder_size_http == 1 && $listing_mode == 0)
			foreach($folders['name'] as $key => $val)
				$folders['size'][$key] = folder_size($dir_to_browse.$folders['name'][$key]);
		elseif($show_folder_size_ftp == 1 && $listing_mode == 1)
			foreach($folders['name'] as $key => $val)
				$folders['size'][$key] = folder_size($dir_to_browse.$folders['name'][$key]);
		else
			$folders['size'][$key] = array();
	}
	//Get directory content -done

	//Sort the folders and files array
	//User sorted
	if(isset($_SESSION['sort']))
	{
		$sort_by = $_SESSION['sort']['by'];
		$sort_order = $_SESSION['sort']['order'];
	}

	if(!empty($folders['name']))
	{
		if($sort_by == 0)
		{
			natcasesort($folders['name']);
			$folders_sorted = $folders['name'];
		}
		elseif($sort_by == 1 && $listing_mode == 0 && $show_folder_size_http == 1)//Sort by size for HTTP listing
		{
			asort($folders['size'], SORT_NUMERIC);
			$folders_sorted = $folders['size'];
		}
		elseif($sort_by == 1 && $listing_mode == 1 && $show_folder_size_ftp == 1)//Sort by size for FTP listing
		{
			asort($folders['size'], SORT_NUMERIC);
			$folders_sorted = $folders['size'];
		}
		else
			$folders_sorted = sort_by_date($folders['date']);
		
		if($sort_order == 1)
			$folders_sorted = array_reverse($folders_sorted, TRUE);
			
	}
	else
		$folders_sorted = array();//if there are no folders in the current directory
		
	if(!empty($files['name']))
	{
		if($sort_by == 0)
		{
			natcasesort($files['name']);//natcasesort preserves the array keys
			$files_sorted = $files['name'];
		}
		elseif($sort_by == 1)
		{
			asort($files['size'], SORT_NUMERIC);
			$files_sorted = $files['size'];
		}
		else
			$files_sorted = sort_by_date($files['date'], $sort_order);	
		
		if($sort_order == 1)
			$files_sorted = array_reverse($files_sorted, TRUE);
	}
	else
		$files_sorted = array();//if there are no files in the current directory
	//Sort the folders and files array -done

	//Icons
	if($view_mode == 0)
	{
		$files_icons_array = icons($files['name'], $view_mode);
		$folder_icon = ($view_mode == 0) ? '<img border="0" src="dirLIST_files/icons_large/folder.png">':'<img src="dirLIST_files/icons/folder.gif"> ';
	}
	elseif($view_mode == 1 && $file_icons)
	{
		$files_icons_array = icons($files['name'], $view_mode);
		$folder_icon = ($view_mode == 0) ? '<img border="0" src="dirLIST_files/icons_large/folder.png">':'<img src="dirLIST_files/icons/folder.gif"> ';
	}
	//Icons -done

	//Hide file extensions if enabled
	$files['name_with_ext'] = $files['name'];
	if($hide_file_ext == 1)
	{
		foreach($files['name'] as $key => $val)
		{
			$files['name'][$key] = remove_ext($val);
		}
	}
	//Hide file extensions if enabled -done
?>
	<div class="row-fluid">	
		<div class="box-content">
		<?php 

			$dir = $_SESSION['dir_to_browse'];

			function filesize_r($dir)
		    {
		      @$dh = opendir($dir);
		      $size = 0;
		      while ($file = @readdir($dh))
		      {
		        if ($file != "." and $file != "..") 
		        {
		          $path = $dir."/".$file;
		          if (is_dir($path))
		          {
		            $size += filesize_r($path); // recursive in sub-folders
		          }
		          elseif (is_file($path))
		          {
		            $size += filesize($path); // add file
		          }
		        }
		      }
		      @closedir($dh);
		      return $size;
		    }

		    	$total_size = filesize_r($dir);
		    	

				$file_size =  $total_size / 1024;
				if($file_size >=  1048576)
					$file_size = sprintf("%01.2f", $file_size/1048576)." GB";
				elseif ($file_size >=  1024)
					$file_size = sprintf("%01.2f", $file_size/1024)." MB";
				else
					$file_size = sprintf("%01.1f", $file_size)." KB";

				$free = ($_SESSION['size_limit'] * 1024) - ($total_size / 1024);
				if($free >=  1048576)
					$free = sprintf("%01.2f", $free/1048576)." GB";
				elseif ($free >=  1024)
					$free = sprintf("%01.2f", $free/1024)." MB";
				else
					$storage = sprintf("%01.1f", $free)." KB";

				$storage = $_SESSION['size_limit'] * 1024;
				if($storage >=  1048576)
					$storage = sprintf("%01.2f", $storage/1048576)." GB";
				elseif ($storage >=  1024)
					$storage = sprintf("%01.2f", $storage/1024)." MB";
				else
					$storage = sprintf("%01.1f", $storage)." KB";

				$bar = (($file_size / $_SESSION['size_limit']) * 100 ) * 1;

		 ?>
			<h5>Space used : <?php 	echo $file_size .' / '. $storage; ?>  | Space free: <?php echo $free; ?> </h5>
			<div class="meter <?php if($bar >= 70) { echo 'red'; } else { echo 'blue'; } ?>"><span style="width: <?php echo $bar; ?>%"></span></div>
		</div>
	</div>
	<div class="row-fluid">	
		<div class="box-content">
			<div class="box defualt span12">
				<?php 
				
					if($_SESSION['upload'] == 1)
					{
				?>
					<a class="quick-button-small span2  btn-link-1 launch-modal" href="#" data-modal-id="modal-register2">
					 	<i class="icon-upload-alt"></i>
					 	<p>Upload</p>
					 </a>
				<?php
					}
					if($_SESSION['create_folders'] == 1)
					{
				?>
					 <a class="quick-button-small span2  btn-link-1 launch-modal" href="#" data-modal-id="modal-register">
					 	<i class="icon-folder-close"></i>
					 	<p>New folder</p>
					 </a>

				<?PHP 
					}
					if($view_mode_user_selectable == 1) 
					{ 
				?>
				<a class="quick-button-small span2" href="dirLIST_files/change_view.php?folder=<?PHP echo $_GET['folder']; ?>"><?PHP echo ($view_mode == 0) ? '<i class="icon-th-list"></i>' : '<i class="icon-th-large"></i>'; ?>
						<p>Thumbnail</p>
	        	</a>
				<?PHP 
					} 
				?>
			<div class="clearfix"></div>
		</div>
		</div>	
	</div><!--/row-->
          	
	<!-- Output basic HTML code -done -->
	<?PHP
	}

	if(!empty($folders['name']) || !empty($files['name'])) { ?>

	<table class="table table-striped table-bordered bootstrap-datatable datatable"  width="725" border="0" cellspacing="5" cellpadding="5">
	    <tr>
	    	<td width="<?PHP echo ($view_mode == 0) ? '414':$width_of_files_column; ?>" class="top_row"><a class="sort" href="dirLIST_files/sort.php?by=name&folder=<?PHP echo $_GET['folder']; ?>"><?PHP echo $local_text['name']; ?></a></td>
	    	<td width="<?PHP echo ($view_mode == 0) ? '128':$width_of_sizes_column; ?>" class="top_row"><a class="sort" href="dirLIST_files/sort.php?by=size&folder=<?PHP echo $_GET['folder']; ?>"><?PHP echo $local_text['size']; ?></a></td>
	    	<td width="<?PHP echo ($view_mode == 0) ? '128':$width_of_dates_column; ?>" class="top_row"><a class="sort" href="dirLIST_files/sort.php?by=date&folder=<?PHP echo $_GET['folder']; ?>"><?PHP echo $local_text['date_uploaded']; ?></a></td>
	 </tr>
	</table>
	<?PHP 
	if($view_mode == 0) //thumbnail mode
	{
		$cells_thumbs = array();
		$cells_names = array();
		$folders_counter = 0;
		$files_counter = 0;
		$img_thumbs_counter = 0;
		
		foreach($folders_sorted as $key => $val)//This part is for the folders
		{
			$cells_thumbs[] = '<td class=" folder_bg table_border" width="100" height="100" align="center" valign="middle"><a href="'.$this_file_name.'?folder='.base64_encode($folders['link'][$key]).'"><img width="100" height="100" border="0" src="dirLIST_files/icons_large/folder.png"></a></td>'."\n";
			
			$cell_name = '';
			
			$cell_name .= '<td height="30" align="center" valign="top">';
			
			if($_SESSION['logged_in'])
			$cell_name .= '<div style="float:left">';
			
			$cell_name .= '<a href="'.$this_file_name.'?folder='.base64_encode($folders['link'][$key]).'">'.chunk_split($folders['name'][$key], 15, "<br />").'</a>';
			
			if($_SESSION['logged_in'])
				$cell_name .= '</div><div style="float:right"><img border="0" src="dirLIST_files/edit_files/edit.png" onclick="show_div(0, \''.$folders_counter.'\');" style="cursor:pointer"></div>';
			

			
			$cells_names[] = $cell_name.'</td>'."\n";
			
			$folders_counter++;
		}
		
		foreach($files_sorted as $key => $val)//This part is for the files
		{
			$file_class = ($files_counter%2 == 0) ? "file_bg1" : "file_bg2";
			$file_link = ($limit_download_speed == 1 || $listing_mode == 1) ? 'dirLIST_files/download.php?file='.base64_encode($files['link'][$key]):$files['link'][$key];
			
			if(in_array(strtolower(strrchr($files['name'][$key], '.')), $thumb_types) && $display_image_thumbs == 1)
			{	
				//signifies it's an image and a thumbnail is to be displayed
				$cells_thumbs[] = '<td class="'.$file_class.' table_border" width="128" height="140" align="center" valign="middle"><a href="'.$file_link.'" target="_blank" ><img id="img_thumb_'.$img_thumbs_counter.'" link_att="'.rawurlencode($files['link'][$key]).'" src="dirLIST_files/icons_large/loading'.$color_scheme_code.'.gif" border="0" /></a></td>'."\n";
				$img_thumbs_counter++;
			}
			else
			{
				$cells_thumbs[] = '<td class="'.$file_class.' table_border" width="128" height="140" align="center" valign="middle"><img width="128" height="140" border="0" src="dirLIST_files/icons_large/'.$files_icons_array[$key].'" /></td>'."\n";
			}
			
			$cell_name = '';
			$cell_name .= '<td height="30" align="center" valign="top">';
			
			if($_SESSION['logged_in'])
				$cell_name .= '<div style="float:left">';
			
			$cell_name .= chunk_split($files['name'][$key], 15, "<br />").'';
			
			if($_SESSION['logged_in'])
				$cell_name .= '</div><div style="float:right"><img border="0" src="dirLIST_files/edit_files/edit.png" onclick="show_div(1, \''.$files_counter.'\');" style="cursor:pointer"></div>';
			
			$cells_names[] = $cell_name.'</td>'."\n";
			
			$files_counter++;
		}
	?>
		
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
	<?php	
		$items = 0;
		
		$total_items = count($cells_names);
		$number_of_rows = ceil($total_items/5);
		
		for($i=0;$i<$number_of_rows;$i++)
		{
			echo '<tr>';
			for($j=(5*$i);$j<(5*($i+1));$j++)
			{
				echo (!empty($cells_thumbs[$j])) ? $cells_thumbs[$j] : '<td></td>';
			}
				
			echo '</tr><tr>';
			
			for($j=(5*$i);$j<(5*($i+1));$j++)
				echo (!empty($cells_names[$j])) ? $cells_names[$j] : '<td></td>';
			echo '</tr>';
		}
	?>
				</table>
		
	<?php
	}
	else //list mode
	{
	?>
	
				<table class="table table-striped" width="725" border="0" cellspacing="5" cellpadding="5">
		
	<?php
		$count = 0;
		foreach($folders_sorted as $key => $val)
		{
			echo '<tr class="folder_bg"><td width="'.$width_of_files_column.'">';
			echo '<div style="float:left;width:'.($width_of_files_column-40).'px">';
			if($file_icons == 1)
				echo '<img width="30" height="30" src="dirLIST_files/icons/folder.gif">';

			echo ' <a href="'.$this_file_name.'?folder='.base64_encode($folders['link'][$key]).'">'.$folders['name'][$key].'</a></div>';
			if($_SESSION['logged_in'])
				echo '<div style="float:right"><img border="0" src="dirLIST_files/edit_files/edit.png" onclick="show_div(0, \''.$count.'\');" style="cursor:pointer"></div>';
			
			echo '</td>';
			echo '<td width="'.$width_of_sizes_column.'">';
			
			if($listing_mode == 0 && $show_folder_size_http == 1)
				echo letter_size($folders['size'][$key]);
			elseif($listing_mode == 1 && $show_folder_size_ftp == 1)
				echo letter_size($folders['size'][$key]);
			else
				echo '-';
			
			echo '</td>
			<td width="'.$width_of_dates_column.'">'.$folders['date'][$key].'</td></tr>';
			$count++;
		}
		$count = 0;
		foreach($files_sorted as $key => $val)
		{
			if($count%2 == 0) $file_class = "file_bg1"; else $file_class = "file_bg2";
				echo '<tr class="'.$file_class.'">
			<td width="'.$width_of_files_column.'">';
			echo '<div style="float:left;width:'.($width_of_files_column-40).'px">';
			if($file_icons == 1)
				echo '<img width="30" height="30" src="dirLIST_files/icons/'.$files_icons_array[$key].'">';
			
			$file_link = ($limit_download_speed == 1 || $listing_mode == 1) ? 'dirLIST_files/download.php?file='.base64_encode($files['link'][$key]) :$files['link'][$key];
			
			echo $files['name'][$key].'</div>';

			if($_SESSION['logged_in'])
				echo '<div style="float:right"><img border="0" src="dirLIST_files/edit_files/edit.png" onclick="show_div(1, \''.$count.'\');" style="cursor:pointer"></div>';
				
			echo '</td>';
			
			echo '<td width="'.$width_of_sizes_column.'">'.letter_size($files['size'][$key]).'</td>
			<td width="'.$width_of_dates_column.'">'.$files['date'][$key].'</td></tr>';
			$count++;
			echo '';

		}
	?>
			</table>
	<?php

		}
	//Palce the content into a table -done
	}


			//Output if the directory is empty
		if(empty($folders['name']) && empty($files['name'])) 
		echo display_error_message('This folder is empty');
		//Output if the directory is empty -done
	?>

