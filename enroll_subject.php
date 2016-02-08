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
	
	<script type="text/javascript">
		function clicked(e)
		{
		    if(!confirm('Are you sure want to Enroll these subject?'))e.preventDefault();
		}
	</script>	
		
		
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
					<li><a href="">Dashboard</a></li>
				</ul>

				<div class="row-fluid sortable">		
					<div class="box span12">
						<?php
							if(isset($_GET['subject']) && $_GET['subject'] == 'enroll')
							{
						?>
							<div class="box-content">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
								  <thead>
									  <tr>
									  	<th >ID</th>
						                <th >Instructor</th>      
						                <th>Action</th>
									  </tr>
								  </thead>   
								  <tbody>
								  	<?php

								  		$result = mysql_query("SELECT * FROM fr_staff as sta , fr_user as user  WHERE user.id = sta.user_id AND user.UserLvl <= 4");
								  			
									 	if(mysql_num_rows($result) > 0)
									 	{
									 		while ($row = mysql_fetch_array($result)) 
									 		{								 			
									 ?>
									 		<tr>
									 			<td><?php echo $row['id']; ?></td> 
								              	<td><?php echo $row['FirstN']." ".$row['LastN']; ?></td>       
												<td><a href="enroll_subject.php?enroll=subject&&user_id=<?php echo $row['id']; ?>"><button>View</button></a></td>
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
							else if(isset($_GET['enroll']) && $_GET['enroll'] == 'subject')
							{
						?>
							<div class="box-content">
								<a href="enroll_subject.php?subject=enroll"><button>Back</button></a>
							</div>
								<div class="box-header" data-original-title>
									<?php 
										$result = mysql_query("SELECT * FROM fr_staff WHERE user_id = '".$_GET['user_id']."'");
										$row = mysql_fetch_array($result);

									?>
									<h2><i class="halflings-icon calendar"></i><span class="break"></span><b><?php echo $row['FirstN']." ".$row['LastN']; ?></b></h2>
								</div>
								<form method="post" action="subjectmanagement/process_enroll_subject.php">
									<div class="box-content">
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
										  <thead>
											  <tr>
											  	<th></th>
											  	<th>Subject code</th>
												<th>Description</th>
												<th>Semester</th>
												<th>S.Y.</th>
											  </tr>
										  </thead>   
										  <tbody>
										  	<?php

										  		$result = mysql_query("SELECT isub.id,isub.Subject,sub.Description,sy.*,sem.* FROM fr_ins_subject as isub,fr_subject as sub , fr_semester as sem , fr_sy as sy WHERE sem.SYID = sy.SYID AND  sem.SemID = sub.SemID AND sub.SubCode = isub.Subject AND sem.sem_status = 'Active' AND isub.user_id = '".$_GET['user_id']."' AND NOT EXISTS(SELECT * FROM  fr_stud_subject WHERE fr_stud_subject.subject_id = isub.id AND fr_stud_subject.user_id = '".$_SESSION['user_id']."')") or die("Error:". mysql_error()); 					
											 	if($count = mysql_num_rows($result) > 0)
											 	{
											 		while ($row = mysql_fetch_array($result)) 
											 		{			
											 		$C++;					 			
											 ?>
											 		<tr>    
											 			<td><input type="checkbox" name="subject[]" value="<?php echo $row['id']; ?>"></td>
										              	<td><?php echo $row['Subject']; ?></td>
										              	<td><?php echo $row['Description']; ?></td>
										              	<td><?php echo $row['Semester']; ?></td>
										              	<td><?php echo $row['SYstart'].'-'.$row['SYend']; ?></td>
													</tr>  
											<?php
													}
												}
											?>
										  </tbody>
									  </table> 
									  <div class="form-actions">
											<?php 
												if($count != 0)
												{
											?>  
										  		<button type="submit" class="btn btn-primary" onclick="clicked(event)">Enroll subject</button>
											<?php
												}
											?>
										</div>  
									</div>
								</form>
						<?php
							}
							else if(isset($_GET['subject']) && $_GET['subject'] == 'subject')
							{

								if(isset($_GET['notid']) && !empty($_GET['notid']))
								{
									mysql_query("UPDATE fr_notification SET status = 'read' WHERE id = '".$_GET['notid']."'");
								}
						?>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
										  		<th>#</th>
										  		<th>Instructor</th>
										  		<th>Subject Code</th>    
								              	<th>Description</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php

											    $result = mysql_query("SELECT stud.*,sub.*,studsub.*,fr_subject.*,fs.* FROM fr_staff as fs, fr_ins_subject as sub,fr_stud as stud,fr_stud_subject as studsub , fr_subject WHERE fs.user_id = sub.user_id AND fr_subject.SubCode = sub.Subject AND studsub.subject_id = sub.id AND studsub.user_id = stud.user_id AND studsub.user_id = '".$_SESSION['user_id']."' AND studsub.status = 'APPROVED'") or die(mysql_error());

											 	if(mysql_num_rows($result) > 0)
											 	{
											 		while ($row = mysql_fetch_array($result)) 
											 		{	
											 		$c++							 			
											 ?>
											 		<tr>
											 			<td><?php echo $c; ?></td>
											 			<td><?php echo $row['FirstN']." ".$row['LastN']; ?></td>
											 			<td><?php echo $row['Subject']; ?></td>    
											            <td><?php echo $row['Description']; ?></td>
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
					</div>
				</div>
		
			<!-- end: Content -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	</div>
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
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

<?php

/*
						?>
							<form method="post" action="subjectmanagement/process_enroll_subject.php">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon calendar"></i><span class="break"></span>Enroll Subject</h2>
								</div>
								
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
										  	<th></th>
							                <th >Instructor</th>      
							                <th >Subject Code</th>
							                <th >Description</th>
										  </tr>
									  </thead>   
									  <tbody>
								  		<?php
								  				$result = mysql_query("SELECT inst.FirstN,inst.LastN,sub.*,fr_subject.Description FROM fr_ins_subject as sub,fr_staff as inst,fr_subject , fr_semester as sem WHERE fr_subject.SemID = sem.SemID AND sem.sem_status = 'Active' AND inst.user_id = sub.user_id AND fr_subject.SubCode = sub.Subject AND NOT EXISTS(SELECT * FROM  fr_stud_subject WHERE fr_stud_subject.subject_id = sub.id AND fr_stud_subject.user_id = '".$_SESSION['user_id']."')") or die("Error:". mysql_error()); 
										 		if($count = mysql_num_rows($result) > 0)
										 		{
											 		while ($row = mysql_fetch_array($result)) 
											 		{								 			
											 ?>
											 		<tr>
											 			<td><input type="checkbox" name="subject[]" value="<?php echo $row['id']; ?>"></td>
												        <td><?php echo $row['FirstN']." ".$row['LastN']; ?></td>       
												        <td><?php echo $row['Subject']; ?></td>
												        <td><?php echo $row['Description']; ?></td>
													</tr>  
											<?php
													}
												}
										?>
									  </tbody>
								  </table> 
								  	<div class="form-actions">
										<?php 
											if($count != 0)
											{
										?>  
									  		<button type="submit" class="btn btn-primary" onclick="clicked(event)">Enroll subject</button>
										<?php
											}
										?>
									</div> 
								</div>
							</form>
						<?php 
						*/

?>