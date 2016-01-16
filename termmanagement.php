<?php session_start();
	
	include_once("php/config.php");
	if(!isset($_SESSION['login'])) 
	{
	      header("Location: ../login.php");
	} 

	if(isset($_POST['sy']) && $_POST['sy'] == 'Generate S.Y.')
	{
		$result = mysql_query("SELECT * FRom fr_sy");
		if(mysql_num_rows($result) == 0)
		{
		    $SYstart =  date('Y');
		    $SYend = $SYstart + 1;

		    mysql_query("INSERT INTO fr_sy(SYstart,SYend) VALUES('".$SYstart."','".$SYend."')");
		}
		else
		{
		  $result1 = mysql_query("SELECT * FROM fr_sy ORDER BY SYID DESC LIMIT 1");
		  $row = mysql_fetch_array($result1);

		  $SYstart = $row['SYend'];
		  $SYend = $SYstart + 1;

		  if($SYstart == date('Y'))
		  {
		    mysql_query("INSERT INTO fr_sy(SYstart,SYend) VALUES('".$SYstart."','".$SYend."')");
		  }
		  else
		  {
		     echo '<script> alert("Sorry you cant Generate School Year"); </script>';
		  }
		  
		} 
 	 }
 	if(isset($_POST['semester']) &&  $_POST['semester'] == 'Save changes')
	{
	    mysql_query("INSERT INTO  fr_semester(Semester,SYID) VALUES('".$_POST['sem']."','".$_POST['sy']."')") or die("Error Semester:". mysql_error());
		echo '<script> window.location.href="termmanagement.php?sem=true"; </script>';
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
					<li><a href="">Term Management</a></li>
				</ul>

				<div class="row-fluid">	

					<div class="box defualt span12">
						<div class="box-header">
							<h2><i class="halflings-icon hand-top"></i><span class="break"></span>Accounts</h2>
						</div>
						<div class="box-content">
							
							<a href="termmanagement.php?sy=true" class="quick-button span2">
								<i class="icon-calendar"></i>
								<p>School Year</p>
								<span class="notification blue">1.367</span>
							</a>
							<a href="termmanagement.php?sem=true" class="quick-button span2">
								<i class="icon-calendar"></i>
								<p>Semester</p>
								<span class="notification blue">1.367</span>
							</a>
							<div class="clearfix"></div>
						</div>	
					</div><!--/span-->
					
				</div><!--/row-->
				
				<div class="row-fluid sortable">		
				<div class="box span12">
					<?php 
						if(isset($_GET['sy'])) 
						{
					?>
							<div class="box-header" data-original-title>
						<h2><i class="halflings-icon calendar"></i><span class="break"></span>School Year</h2>
					</div>
					<div class="box-content buttons">
						<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" name="form1">
							<input type="submit" name="sy" class="btn btn-large btn-success" value="Generate S.Y.">
						</form>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>#</th>
							  	  <th>School Year</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  			$result = mysql_query("SELECT * FROM fr_sy");
								 	if(mysql_num_rows($result) > 0)
								 	{
								 		while ($row = mysql_fetch_array($result)) 
								 		{								 			
								 ?>
								 		<tr>
								 		  <td><?php echo $row['SYID']; ?></td>
									      <td><?php echo $row['SYstart'].'-'.$row['SYend']; ?></td>
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
						else if(isset($_GET['sem']))
						{
					?>
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon calendar"></i><span class="break"></span>Semester</h2>
					</div>
					<div class="box-content buttons">
						<button class="btn btn-large btn-success btn-setting">ADD SEMESTER</button>
						<button class="btn btn-large btn-success">Edit Selected</button>
						<button class="btn btn-large btn-success">Delete Selected</button>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	    <th>Semester</th>
              						<th>School Year</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  		
									$result = mysql_query("SELECT sem.*,sy.* FROM fr_semester as sem , fr_sy as sy WHERE sem.SYID = sy.SYID");
									
								 	if(mysql_num_rows($result) > 0)
								 	{
								 		while ($row = mysql_fetch_array($result)) 
								 		{								 			
								 ?>
								 		<tr>
											<td><?php echo $row['Semester']; ?></td>
              								<td><?php echo $row['SYstart'].'-'.$row['SYend']; ?></td>
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
		<form method="post" action="termmanagement.php">  
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>SEMESTER</h3>
			</div>
			<div class="modal-body">
				<div class="control-group">
					<label class="control-label" for="selectError">Select SEMESTER</label>
					<div class="controls">
					  <select name="sem" id="selectError" data-rel="chosen" required>
					  	<option value=""> </option>
						<option value="1st Semester">1st Semester</option> 
	                    <option value="2nd Semester">2nd Semester</option>    
	                    <option value="Summer">Summer</option>  
					  </select><font style="color:red;"> *</font>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selectError2">Select School Year</label>
					<div class="controls">
					  <select name="sy" id="selectError2" data-rel="chosen" required>
					  	<option value=""> </option>
						<?php 
	                        $result = mysql_query("SELECT * FROM fr_sy");
	                        if(mysql_num_rows($result) > 0)
	                        {   
	                            while ($row = mysql_fetch_array($result)) {
	                                echo ' <option value="'.$row["SYID"].'">'.$row['SYstart'].'-'.$row['SYend'].'</option> ';
	                            }
	                        }

	                    ?> 
					  </select><font style="color:red;"> *</font>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				</button>
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<input name="semester" type="submit" value="Save changes" class="btn btn-primary">
			</div>
		</form>
	</div>
	
	<div class="clearfix"></div>
	
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
</body>
</html>
