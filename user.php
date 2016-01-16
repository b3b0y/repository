<?php session_start();
	
		require("php/config.php");
	if(!isset($_SESSION['login'])) 
	{
	      header("Location: ../login.php");
	} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
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
							<h2><i class="halflings-icon hand-top"></i><span class="break"></span>Accounts</h2>
						</div>
						<div class="box-content">
							
							<a href="user.php?faculty=true" class="quick-button span2">
								<i class="icon-group"></i>
								<p>Faculty</p>
								<span class="notification blue">1.367</span>
							</a>
							<a href="user.php?student=true" class="quick-button span2">
								<i class="icon-group"></i>
								<p>Student</p>
								<span class="notification blue">1.367</span>
							</a>
							<div class="clearfix"></div>
						</div>	
					</div><!--/span-->
					
				</div><!--/row-->
				
				<div class="row-fluid sortable">		
				<div class="box span12">
					<?php 
						if(isset($_GET['faculty'])) 
						{
					?>
							<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Faculty</h2>
					</div>
					<div class="box-content buttons">
						<a href="user.php?user=faculty"> <button class="btn btn-large btn-success">ADD FACULTY</button> </a>
						<button class="btn btn-large btn-success">Edit Selected</button>
						<button class="btn btn-large btn-success">Delete Selected</button>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>#</th>
								  <th>Name</th>
								  <th>Username</th>
								  <th>Last Login</th>
								  <th>Last Log-Out</th>
								  <th>User Level</th>
								  <th>Status</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  			if($_SESSION['Ulvl'] == "5")
									{

										$result = mysql_query("SELECT fr_user.*,position.*,fr_staff.* FROM fr_user,position,fr_staff WHERE fr_user.UserLvl > 1 AND fr_user.UserLvl = position.UserLvl AND fr_user.id = fr_staff.user_id ") or die ("Admin :". mysql_error());
									}
									else if($_SESSION['Ulvl'] == "4")
									{
										$result = mysql_query("SELECT fr_user.*,position.*,fr_staff.* FROM fr_user,position,fr_staff WHERE fr_user.UserLvl < 4 AND fr_user.UserLvl = position.UserLvl AND fr_user.id = fr_staff.user_id ") or die ("DEAN :". mysql_error());

									}
									else if($_SESSION['Ulvl'] == "3")
									{
										$result = mysql_query("SELECT fr_user.*,position.*,fr_staff.* FROM fr_user,position,fr_staff WHERE fr_user.UserLvl < 3 AND fr_user.UserLvl = position.UserLvl AND fr_user.id = fr_staff.user_id ") or die ("Instructor :". mysql_error());
									}

								 	if(mysql_num_rows($result) > 0)
								 	{
								 		while ($row = mysql_fetch_array($result)) 
								 		{								 			
								 ?>
								 		<tr>
											<td><input class="check" type="checkbox" name="users[]" value="<?php echo $row['username']; ?>"></td>      
											<td><?php echo $row['FirstN'].' &nbsp'.$row['LastN'] ; ?></td>
											<td><?php echo $row['username']; ?></td>
										
											<td><?php echo $row['last_login_date']; ?></td>
											<td><?php echo $row['last_logout_date']; ?></td>
											<td><?php echo $row['Position']; ?></td>
											<td><?php echo $row['status']; ?></td>
										</tr>  
								<?php
										}
								?>
									
								<?php	
									}	
									else
									{
										echo "<tr > <td colspan='9'> File Records  Empty! </td></tr>";
									}
								?>
							
						  </tbody>
					  </table>            
					</div>
					<?php 
						}
						else if(isset($_GET['student']))
						{
					?>
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Student</h2>
					</div>
					<div class="box-content buttons">
						<a href="user.php?user=student"> <button class="btn btn-large btn-success">ADD STUDENT</button> </a>
						<button class="btn btn-large btn-success btn-setting">UPLOAD CSV FILE</button>
						<button class="btn btn-large btn-success">Edit Selected</button>
						<button class="btn btn-large btn-success">Delete Selected</button>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>    
								<th>Name</th>
								<th>Username</th>
								<th>Course/Year</th>
								<th>Last Login</th>
								<th>Last Log-Out</th>
								<th>Status</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  		
									$result = mysql_query("SELECT fr_user.*,fr_stud.* FROM fr_user,fr_stud WHERE fr_user.UserLvl = 1  AND fr_user.id = fr_stud.user_id ") or die ("Instructor :". mysql_error());
									

								 	if(mysql_num_rows($result) > 0)
								 	{
								 		while ($row = mysql_fetch_array($result)) 
								 		{								 			
								 ?>
								 		<tr>
											<td><?php echo $row['FName'].' &nbsp'.$row['LName'] ; ?></td>
											<td><?php echo $row['username']; ?></td>
											<td><?php echo $row['Course'].' - '.$row['Year']; ?></td>
											<td><?php echo $row['last_login_date']; ?></td>
											<td><?php echo $row['last_logout_date']; ?></td>
											<td><?php echo $row['status']; ?></td>
										</tr>  
								<?php
										}
								?>
									
								<?php	
									}	
									else
									{
										echo "<tr> <td colspan='6'><center> File Records  Empty!</center> </td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>";
									}
								?>
							
						  </tbody>
					  </table>  
					</div>
					<?php
						}
						else if(isset($_GET['user']) && $_GET['user'] == 'faculty')
						{
							require('Forms/faculty_form.php');
						}
						else if(isset($_GET['user']) && $_GET['user'] == 'student')
						{
							require('Forms/student_form.php');
						}
					?>
				</div><!--/span-->
			</div><!--/row-->
		
			<!-- end: Content -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	</div>
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>UPLOAD CSV</h3>
		</div>
		<div class="modal-body">
			<?php require('Forms/csv.php');; ?>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
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
