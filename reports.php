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
					<li><a href="">Reports</a></li>
				</ul>

				<div class="row-fluid">	

					<div class="box defualt span12">
						<div class="box-header">
							<h2><i class="halflings-icon hand-top"></i><span class="break"></span>REPORTS MANAGEMENT</h2>
						</div>
						<div class="box-content">	
							<!--
							<a href="reports.php?Student=Student" class="quick-button span2">
								<i class="icon-book"></i>
								<p>Student</p>
							</a>
							-->

							<a href="reports.php?subject=Enrolled" class="quick-button span2">
								<i class="icon-book"></i>
								<p>Student</p>
							</a>

							<a href="reports.php?activity=activity" class="quick-button span2">
								<i class="icon-book"></i>
								<p>Activity</p>
							</a>
							<div class="clearfix"></div>
						</div>
					</div><!--/span-->
					
				</div><!--/row-->

				<div class="row-fluid sortable">		
					<div class="box span12">
						<?php 
							if(isset($_GET['Student']) && $_GET['Student'] == 'Student') 
							{
						?>
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon book"></i><span class="break"></span>Student</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
										  	<th class="group-word">Control No.</th>
			              					<th class="group-false">Name</th>
			              					<th class="group-false">Course</th>
			              					<th class="group-false">Action</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
									  			 $result = mysql_query("SELECT * FROM fr_stud");
											 	if(mysql_num_rows($result) > 0)
											 	{
											 		while ($row = mysql_fetch_array($result)) 
											 		{								 			
											 ?>
											 		<tr>
											 			<td><?php echo $row['ControlNo']; ?></td>
			              								<td><?php echo $row['FName'].' '.$row['Mname'].' '.$row['LName'] ; ?></td>
												    	<td><?php echo $row['Course']; ?></td>
												    	<td><a href="reports/student.php?view=student&&user_id=<?php echo $row['user_id']; ?>"><button>View</button></a></td>
												    </tr>   
											<?php
													}
												}
											?>

									  </tbody>
								  </table>            
								</div>
						<?php 
							}
							if(isset($_GET['subject']) && $_GET['subject'] == 'Enrolled') 
							{
						?>
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon book"></i><span class="break"></span>LIST OF SUBJECT</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
										  	<th class="group-word">Subject code</th>
			              					<th class="group-false">Description</th>
			              					<th class="group-false">Semester</th>
			              					<th class="group-false">S.Y.</th>
			              					<th class="group-false">Action</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php

									  			if($_SESSION['UserLvl'] == 3) 
									  			{
									  				$result = mysql_query("SELECT  fr_ins_subject.*,sub.*,sem.*,sy.* FROM  fr_ins_subject , fr_subject as sub , fr_semester as sem, fr_sy as sy WHERE sub.SubCode = fr_ins_subject.Subject AND sem.SemID = sub.SemID AND sy.SYID = sem.SYID AND sem.sem_status = 'Active' AND fr_ins_subject.user_id = '".$_SESSION['user_id']."'");
									  			}
									  			else if($_SESSION['UserLvl'] == 4) 
									  			{
									  				$result = mysql_query("SELECT sub.*,sem.*,sy.* FROM fr_subject as sub , fr_semester as sem, fr_sy as sy WHERE sem.SemID = sub.SemID AND sy.SYID = sem.SYID AND sem.sem_status = 'Active'");
									  			}
											 	

											 	if(mysql_num_rows($result) > 0)
											 	{
											 		while ($row = mysql_fetch_array($result)) 
											 		{								 			
											 ?>
											 		<tr>
											 			<td><?php echo $row['SubCode']; ?></td>
			              								<td><?php echo $row['Description']; ?></td>
												    	<td><?php echo $row['Semester']; ?></td>
												    	<td><?php echo $row['SYstart']." - ".$row['SYend'] ; ?></td>
												    	<td>
												    		<a href="reports/subject.php?view=Enrolled&&subcode=<?php echo $row['SubCode']; ?>&&sem=<?php echo $row['SemID']; ?>"><button>ENROLLED</button></a>
												    		<a href="reports/subject.php?view=Dropped&&subcode=<?php echo $row['SubCode']; ?>&&sem=<?php echo $row['SemID']; ?>"><button>DROPPED</button></a>
												    	</td>
												    		
												    </tr>   
											<?php
													}
												}
											?>

									  </tbody>
								  </table>            
								</div>
						<?php 
							}
							if(isset($_GET['activity']) && $_GET['activity'] == 'activity') 
							{
						?>
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon book"></i><span class="break"></span>LIST OF ACTIVITY</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
										  	<th class="group-word">Subject</th>
			              					<th class="group-false">Folder Name</th>
			              					<th class="group-false">Action</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php

									  			$result = mysql_query("SELECT DISTINCT pn.subject_id,pn.folder_name,isub.Subject,sem.SemID FROM project_notif as pn , fr_ins_subject  as isub , fr_subject as sub , fr_semester as sem WHERE  isub.Subject = sub.SubCode AND sem.SemID = sub.SemID AND  pn.subject_id = isub.id  AND pn.inst_id = '".$_SESSION['user_id']."' ") or die(mysql_error());

											 	if(mysql_num_rows($result) > 0)
											 	{
											 		while ($row = mysql_fetch_array($result)) 
											 		{								 			
											 ?>
											 		<tr>
											 			<td><?php echo $row['Subject']; ?></td>
			              								<td><?php echo $row['folder_name']; ?></td>
												    	<td><a href="reports/activity.php?submit=Submitted&&foldern=<?php echo $row['folder_name']; ?>&&id=<?php echo $row['subject_id']; ?>&&sem=<?php echo $row['SemID']; ?>"><button>SUBMITTED</button></a>
												    	<a href="reports/activity.php?submit=nsubmit&&foldern=<?php echo $row['folder_name']; ?>&&id=<?php echo $row['subject_id']; ?>&&sem=<?php echo $row['SemID']; ?>"><button>NOT SUBMITTED</button></a></td>
												    </tr>   
											<?php
													}
												}
											?>

									  </tbody>
								  </table>            
								</div>
						<?php 
							}
						?>
					</div><!--/span-->
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
