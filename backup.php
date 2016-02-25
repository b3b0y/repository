<?php session_start();
	
	require("php/config.php");

	if(!isset($_SESSION['login'])) 
	{
	      header("Location: login.php");
	} 

	if(isset($_GET['data'])  && $_GET['data'] == 'backup')
	{
		$result = mysql_query("SELECT  * FROM fr_data_backup");
		if(mysql_num_rows($result) == 0)
		{
			mysql_query("INSERT INTO fr_data_backup(backup_date) VALUES('".$_POST['date']."')");
		}
		else
		{
			mysql_query("UPDATE fr_data_backup SET \backup_date = '".$_POST['date']."'");
		}

		echo "<script> alert('Sucessfully save'); window.location.href='backup.php?backup=data' </script>";

	}

	if(isset($_GET['db'])  && $_GET['db'] == 'backup')
	{
		$result = mysql_query("SELECT  * FROM fr_db_backup");
		if(mysql_num_rows($result) == 0)
		{
			mysql_query("INSERT INTO fr_db_backup(Date) VALUES('".$_POST['date']."')");
		}
		else
		{
			mysql_query("UPDATE fr_db_backup SET Date = '".$_POST['date']."'");
		}

		echo "<script> alert('Sucessfully save'); window.location.href='backup.php?backup=database' </script>";

	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>WLC Web-Base File Repository</title>
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
	

    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
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
	
		
		
		
</head>

<body>
	
	<!-- start: Header -->
	<?php include('php/header.php'); ?>
	<!-- start: Header -->
	
	<div class="container-fluid-full">
		<div class="row-fluid">
				
			<?php include('php/menu.php'); ?>
			
			<!-- start: Content -->
			<div id="content" class="span10">
					
				<ul class="breadcrumb">
					<li>
						<i class="icon-home"></i>
						<a href="index.php">Home</a> 
						<i class="icon-angle-right"></i>
					</li>
					<li><a href="dashboard.php">Dashboard</a></li>
					<i class="icon-angle-right"></i>
					<li><a href="">User</a></li>
				</ul>

				<div class="row-fluid">	
					<div class="box defualt span12">
						<div class="box-header">
							<h2><i class="halflings-icon hand-top"></i><span class="break"></span>Dashboard</h2>
						</div>
						<div class="box-content">	
							<a href="backup.php?backup=data"  class="quick-button span2">	
								<i class="icon-hdd"></i>
								<p>Backup Data</p>
							</a>

							<a href="backup.php?backup=database"  class="quick-button span2">
								<i class="icon-hdd"></i>
								<p>Backup Database</p>
							</a>
						</div>
					</div>
				</div><!--/row-->
				<div class="row-fluid sortable">	
					<div class="box defualt span12">
							<?php
								if(isset($_GET['backup']) && $_GET['backup'] == 'database')
								{
							 ?>
							 	<div class="box-header">
									<h2><i class="halflings-icon hand-top"></i><span class="break"></span>BACKUP DATABASE</h2>
								</div>
								<div class="box-content">
									<form action="backup/data_restore.php" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
									     <label>Database to Restore from: </label>
									     	<input type="file" name="rzip" required/>  
									     <input onclick="return confirm('Are you sure you want to Restore your Data?');" class="btn btn-primary" name="restore" type="submit" id="submit" value="Restore" />
									</form>

									<form action="backup/db_backup.php" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
								          <label>Backup Database: </label>
								       	<input onclick="return confirm('Are you sure you want to backup your Database?');" class="btn btn-primary" name="backup" type="submit" id="submit" value="Backup Database" />
								  	</form>

								  	<br><br><br>

					  				<div class="box-content" >
										<div id='backupdb'>
											
										</div>
									</div>

								  	<label>Set Date time Database Backup:</label>
								  	<form  action="backup.php?db=backup" method='post' accept-charset='UTF-8'> 
							            <div class="well">
							            	<label>Select Date:</label>
							            	<div id="datetimepicker4" class="input-append">
								                <input name="date" data-format="yyyy-MM-dd" type="text" />
								                <span class="add-on">
								                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
								                  </i>
								                </span>
							            	</div>
							             	<br>
								        	<input class="btn btn-primary" type='submit' name='Submit' value='Save' />
							            </div>
							            
							        </form>

							        <br><br>
								</div>	
						  	<?php 
						  		}	
						  		if(isset($_GET['backup']) && $_GET['backup'] == 'data')
								{
							 ?>

							 	<div class="box-header">
									<h2><i class="halflings-icon hand-top"></i><span class="break"></span>BACKUP DATA</h2>
								</div>
								<div class="box-content">
									<form action="backup/data_restore.php" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
								         <label>Data to Restore from: </label>
								         <input type="file" name="rzip" required/>  
								         <input onclick="return confirm('Are you sure you want to Restore your Data?');" class="btn btn-primary" name="restore" type="submit" id="submit" value="Restore" />
								  	</form>

									<label>Backup Data: </label>
					       			<a onclick="return confirm('Are you sure you want to backup your Files?')" href="backup/data_backup.php"><button class="btn btn-primary"> Backup Data</button> </a>		
					  			
					  				<br><br><br>

					  				<div class="box-content" >
										<div id='backupdata'>
											
										</div>
									</div>
					       			<label>Set Date time Data Backup:</label>
								  	<form  action="backup.php?data=backup" method='post' accept-charset='UTF-8'> 
							            <div class="well">
							            	<label>Select Date:</label>
							            	<div id="datetimepicker4" class="input-append">
								                <input name="date" data-format="yyyy-MM-dd" type="text" />
								                <span class="add-on">
								                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
								                  </i>
								                </span>
							            	</div>
							             	<br>
								        	<input class="btn btn-primary" type='submit' name='Submit' value='Save' />
							            </div>
							            
							        </form>

					  			</div>
						  	<?php 
						  		}
						  	?>
							<div class="clearfix"></div>
						
					</div><!--/span-->
					</div>
			</div><!--/row-->
		
			<!-- end: Content -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="notification.js"></script>

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

		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script> 
	    <script type="text/javascript" src="js/bootstrap-datetimepicker.pt-BR.js">
	    </script>

	    <script type="text/javascript">
	      $(function() {
	        $('#datetimepicker4').datetimepicker({
	          pickTime: false
	        });
	      });
	    </script>
	    <script type="text/javascript">
	      $(function() {
	        $('#datetimepicker3').datetimepicker({
	          pickDate: false
	        });
	      });
	    </script>
	<!-- end: JavaScript-->
</body>
</html>
