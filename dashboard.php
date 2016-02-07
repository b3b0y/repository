<?php session_start();

	include_once("php/config.php");

	if(!isset($_SESSION['login'])) 
	{
	      header("Location: login.php");
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

<body >
	
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
					<li><a href="">Dashboard</a></li>
				</ul>

				<div class="row-fluid">	

					<div class="box defualt span12">
						<div class="box-header">
							<h2><i class="halflings-icon hand-top"></i><span class="break"></span>Dashboard</h2>
						</div>
						<div class="box-content">	
						<?php 
							if($_SESSION['UserLvl'] >= 4)
							{
						?>
								<a href="user.php" class="quick-button span2">
									<i class="icon-group"></i>
									<p>Users</p>
									<?php 
										$result = mysql_query("SELECT * FROM fr_user");

									?>
									<span class="notification blue"><?php echo mysql_num_rows($result); ?></span>
								</a>
								<a href="termmanagement.php" class="quick-button span2">
									<i class="icon-calendar"></i>
									<p>Semester</p>
								</a>
						<?php								
							}
						?>
							<a href="subjectmanagement.php" class="quick-button span2">
								<i class="icon-book"></i>
								<p>Subjects</p>
							</a>
							<a href="reports.php"  class="quick-button span2">
								<i class="icon-table"></i>
								<p>Reports</p>
							</a>
						<?php 
							if($_SESSION['UserLvl'] >= 4)
							{
						?>
								<!--<a onclick="return confirm('Are you sure you want to backup your Files and Database?')" href="backup/db_backup.php" class="quick-button span2">
									-->
									<a class="quick-button span2  btn-link-1 launch-modal" href="#" data-modal-id="modal-register">
									<i class="icon-hdd"></i>
									<p>Backup</p>
								</a>
						<?php								
							}
						?>
							<div class="clearfix"></div>
						</div>	
					</div><!--/span-->
					
				</div><!--/row-->
		
			<!-- end: Content -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	</div>
	 <div class="modal fade" id="modal-register" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3>Upload file</h3>
				</div>
	    			<div class="modal-body"> 
	            		<div class="control-group">
		            		<form action="backup/db_backup.php" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
						         <label>Database to Restore from: </label>
						         <input type="file" name="rfile" required/>  
						         <input onclick="return confirm('Are you sure you want to Restore your Database?');" class="btn btn-primary" name="restore" type="submit" id="submit" value="Restore" />
						  	</form>
					  	</div>
					  	<div class="control-group">
					  	</div>
					  	<div class="control-group">
					  	<form action="backup/db_backup.php" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
					          <label>Backup Database: </label>
					       	<input onclick="return confirm('Are you sure you want to backup your Database?');" class="btn btn-primary" name="backup" type="submit" id="submit" value="Backup Database" />
					  	</form>
					  	</div>
					  	<div class="control-group">
					          <label>Backup Data: </label>
					       		<a onclick="return confirm('Are you sure you want to backup your Files and Database?')" href="backup/data_backup.php"><button class="btn btn-primary"> Backup Data</button> </a>		
					  	</div>
					</div>
	    			<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Close</a>
					</div>
    			</form> 
				
    		</div>
    	</div>
    </div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
	
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
	
</body>
</html>
