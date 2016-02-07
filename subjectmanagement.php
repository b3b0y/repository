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
		    if(!confirm('Are you sure you want to "DISAPPROVE" these subject?'))e.preventDefault();
		}

		function clicked2(e)
		{
		    if(!confirm('Are you sure you want to "APPROVE" these subject?'))e.preventDefault();
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
					<li><a href="dashboard.php">Dashboard</a></li>
					<i class="icon-angle-right"></i>
					<li><a href="">Subject Management</a></li>
				</ul>

				<div class="row-fluid">	

					<div class="box defualt span12">
						<div class="box-header">
							<h2><i class="halflings-icon hand-top"></i><span class="break"></span>Accounts</h2>
						</div>
						<div class="box-content">
						<?php
							if($_SESSION['UserLvl'] >= 4)
							{
						?>
								<a href="subjectmanagement.php?subject=mysubject" class="quick-button span2">
									<i class="icon-book"></i>
									<p>My subject</p>
								</a>
								<a href="subjectmanagement.php?subject=subject" class="quick-button span2">
									<i class="icon-book"></i>
									<p>Subject</p>
								</a>
								<a href="subjectmanagement.php?subject=faculty" class="quick-button span2">
									<i class="icon-book"></i>
									<p>Faculty Subject</p>
								</a>
						<?php
							}
						?>
							<a href="subjectmanagement.php?subject=student" class="quick-button span2">
								<i class="icon-book"></i>
								<p>Student Subject</p>
							</a>
							<a href="subjectmanagement.php?subject=approve" class="quick-button span2">
								<i class="icon-book"></i>
								<p>Approve Subject</p>
							</a>
							<a href="subjectmanagement.php?subject=deadline" class="quick-button span2">
								<i class="icon-book"></i>
								<p>Deadline </p>
							</a>
							<div class="clearfix"></div>
						</div>	
					</div><!--/span-->
					
				</div><!--/row-->
				
				<div class="row-fluid sortable">		
				<div class="box span12">
					<?php 
						if(isset($_GET['subject']) && $_GET['subject'] == 'mysubject') 
						{
					?>
							<div class="box-header" data-original-title>
								<h2><i class="halflings-icon book"></i><span class="break"></span>My SUbject</h2>
							</div>
							<div class="box-content">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
								  <thead>
									  <tr>
									  	<th class="group-word">Subject Code</th>
		              					<th class="group-false">Description</th>
									  </tr>
								  </thead>   
								  <tbody>
								  	<?php
								  			  $result = mysql_query("SELECT fr_ins_subject.*,fr_subject.* FROM fr_ins_subject,fr_subject WHERE fr_subject.SubCode = fr_ins_subject.Subject AND fr_ins_subject.user_id = '".$_SESSION['user_id']."'");
										 	if(mysql_num_rows($result) > 0)
										 	{
										 		while ($row = mysql_fetch_array($result)) 
										 		{								 			
										 ?>
										 		<tr>
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
						else if(isset($_GET['subject']) && $_GET['subject'] == 'subject')
						{
					?>
							<div class="box-header" data-original-title>
								<h2><i class="halflings-icon calendar"></i><span class="break"></span>Subject</h2>
							</div>
							<div class="box-content buttons">
								<button class="btn btn-large btn-success btn-setting">ADD SUBJECT</button>
							</div>
							<div class="box-content">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
								  <thead>
									  <tr>
									  	<th>Subject ID</th>
									  	<th>Subject Code</th>
							            <th>Description</th>
							            <th>Semester / S.Y.</th>
							            <th>Status</th>
							            <th>Action</th>
									  </tr>
								  </thead>   
								  <tbody>
								  	<?php
								  		
											$result = mysql_query("SELECT sub.*,sem.*,sy.* FROM fr_subject as sub , fr_semester as sem , fr_sy as  sy WHERE sem.SYID = sy.SYID AND sub.SemID = sem.SemID")or die("Error:". mysql_error());            
											
										 	if(mysql_num_rows($result) > 0)
										 	{
										 		while ($row = mysql_fetch_array($result)) 
										 		{								 			
										 ?>
										 		<tr>
										 			<td><?php echo $row['subID']; ?></td>
													<td><?php echo $row['SubCode']; ?></td>
									              	<td><?php echo $row['Description']; ?></td>
									               	<td><?php echo $row['Semester']." / ".$row['SYstart'].'-'.$row['SYend']; ?></td>
									              	<td><?php echo $row['status']; ?></td>
									              	<td><a href="subjectmanagement.php?subject=edit&&id=<?php echo $row['subID']; ?>"><button><i class="halflings-icon edit"></i></button></a><a onclick="return confirm('Are you sure you want to delete?');" href="php/delete.php?delete=subject&&id=<?php echo $row['subID']; ?>"><button><i class="halflings-icon trash"></i></button></a></td>
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
						else if(isset($_GET['subject']) && $_GET['subject'] == 'faculty')
						{
					?>
							<div class="box-header" data-original-title>
								<h2><i class="halflings-icon calendar"></i><span class="break"></span>Faculty Subject</h2>
							</div>
							<div class="box-content buttons">
								<a href="subjectmanagement.php?faculty=add"><button class="btn btn-large btn-success">ADD SUBJECT</button></a>
							</div>
							<div class="box-content">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
								  <thead>
									  <tr>
									  	<th >ID</th>
						                <th >Instructor</th>      
						                <th >Subject Code</th>
						                <th>Description</th>
						                <!--<th>Action</th>-->
									  </tr>
								  </thead>   
								  <tbody>
								  	<?php
											$result = mysql_query("SELECT inst.*,sub.id,sub.Subject,fr_subject.* FROM fr_ins_subject as sub,fr_staff as inst,fr_subject WHERE inst.user_id = sub.user_id AND fr_subject.SubCode = sub.Subject") or die("Error:".mysql_error());
											
										 	if(mysql_num_rows($result) > 0)
										 	{
										 		while ($row = mysql_fetch_array($result)) 
										 		{								 			
										 ?>
										 		<tr>
										 			<td><?php echo $row['id']; ?></td> 
									              	<td><?php echo $row['FirstN']." ".$row['LastN']; ?></td>       
									              	<td><?php echo $row['Subject']; ?></td>
									              	<td><?php echo $row['Description']; ?></td>
													<!--<td><a onclick="return confirm('Are you sure you want to delete?');" href="php/delete.php?delete=faculty&&id=<?php echo $row['id']; ?>"><button><i class="halflings-icon trash"></i></button></a></td>
													-->
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
						else if(isset($_GET['subject']) && $_GET['subject'] == 'student')
						{
					?>
							<div class="box-header" data-original-title>
								<h2><i class="halflings-icon calendar"></i><span class="break"></span>Student Subject</h2>
							</div>
							<div class="box-content buttons">
								<button class="btn btn-large btn-success">Delete Selected</button>
							</div>
							<div class="box-content">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
								  <thead>
									  <tr>
									  		<th>Subject Code</th>
							              	<th>ID Number</th>
							              	<th>Student</th>      
							              	<th>Description</th>
							              	<th>Action</th>
									  </tr>
								  </thead>   
								  <tbody>
								  	<?php

										    $result = mysql_query("SELECT stud.*,sub.*,studsub.*,fr_subject.* FROM fr_ins_subject as sub,fr_stud as stud,fr_stud_subject as studsub , fr_subject WHERE fr_subject.SubCode = sub.Subject AND studsub.subject_id = sub.id AND studsub.user_id = stud.user_id AND sub.user_id = '".$_SESSION['user_id']."' AND studsub.status = 'APPROVED'")or die(mysql_error()); 

											
										 	if(mysql_num_rows($result) > 0)
										 	{
										 		while ($row = mysql_fetch_array($result)) 
										 		{								 			
										 ?>
										 		<tr>
										 			<td><?php echo $row['Subject']; ?></td>
										            <td><?php echo $row['ControlNo']?></td>  
										            <td><?php echo $row['FName']." ".$row['LName']; ?></td>       
										            <td><?php echo $row['Description']; ?></td>
													<td><a onclick="return confirm('Are you sure you want to Drop?');" href="php/delete.php?delete=drop&&subject_id=<?php echo $row['subject_id']; ?>"><button><i class="halflings-icon trash"></i> Drop</button></a></td>
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
						else if(isset($_GET['subject']) && $_GET['subject'] == 'approve')
						{

							if(isset($_GET['notid']) && !empty($_GET['notid']))
							{
								mysql_query("UPDATE fr_notification SET status = 'read' WHERE id = '".$_GET['notid']."'");
							}

							$result = mysql_query("SELECT stud.user_id,stud.ControlNo,stud.FName,stud.LName,sub.Subject,studsub.subject_id,fr_subject.Description FROM fr_ins_subject as sub,fr_stud as stud,fr_stud_subject as studsub , fr_subject WHERE fr_subject.SubCode = sub.Subject AND studsub.subject_id = sub.id AND studsub.user_id = stud.user_id AND sub.user_id = '".$_SESSION['user_id']."' AND studsub.status='DISAPPROVED'") or die('Error: '.mysql_error());
											
						 	if(mysql_num_rows($result) > 0)
						 	{
					?>			
							<form method="post" action="subjectmanagement/process_approve_subject.php">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon calendar"></i><span class="break"></span>Approve Subject</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
										  		<th></th>
								              	<th >Subject Code</th>
								              	<th >ID Number</th>
								              	<th >Student</th>      
								              	<th >Description</th>
										  </tr>
									  </thead>   
									  <tbody>
								  		<?php
										 		while ($row = mysql_fetch_array($result)) 
										 		{								 			
										 ?>
										 		<tr>
										 			<td><input type="checkbox" name="subject[]" value="<?php echo $row['subject_id']; ?>"><input type="hidden" name="user_id[]" value="<?php echo $row['user_id']; ?>"> </td>
												  	<td><?php echo $row['Subject']; ?></td>
												  	<td><?php echo $row['ControlNo']?></td>  
												  	<td><?php echo $row['FName']." ".$row['LName']; ?></td>       
												  	<td><?php echo $row['Description']; ?></td>
												</tr>  
										<?php
												}
										?>
									  </tbody>
								  </table>
							  		<div class="form-actions">
									  	<input onclick="clicked2(event)" name="approve" type="submit" value="APPROVE" class="btn btn-primary">
										<input onclick="clicked(event)" name="disapprove" type="submit" value="DISAPPROVE"  class="btn btn-primary">
									</div>   
								</div>
							</form>
					<?php
							}
							else
					        {
					?>
					           <div class="alert alert-error">
									<strong>No Records found!
								</div>

					
					<?php
					        }
						}

						else if(isset($_GET['subject']) && $_GET['subject'] == 'deadline')
						{
					?>
							<div class="box-header" data-original-title>
								<h2><i class="halflings-icon calendar"></i><span class="break"></span>Deadline</h2>
							</div>
							<div class="box-content">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
								  <thead>
									  <tr>
									  	<th>Subject</th>
							            <th>Date</th>
							            <th>Time</th>
							            <th>Status</th>
									  </tr>
								  </thead>   
								  <tbody>
								  	<?php
								  		
											$result = mysql_query("SELECT dead.*,ins.* FROM fr_deadline as dead , fr_ins_subject as ins WHERE dead.folder_id = ins.id AND user_id = '".$_SESSION['user_id']."'")or die("Error:". mysql_error());            
											
										 	if(mysql_num_rows($result) > 0)
										 	{
										 		while ($row = mysql_fetch_array($result)) 
										 		{								 			
										 ?>
										 		<tr>
													<td><?php echo $row['Subject']; ?></td>
									              	<td><?php echo $row['date_deadline']; ?></td>
									               	<td><?php echo $row['time_deadline']; ?></td>
									              	<td><?php echo $row['status']; ?></td>
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
						else if(isset($_GET['faculty']) && $_GET['faculty'] == 'add')
						{
							require('subjectmanagement/faculty_subject_form.php');
						}
						else if(isset($_GET['subject']) && $_GET['subject'] == 'edit')
						{
							require('subjectmanagement/edit_subject_form.php');
						}
						else if(isset($_GET['faculty']) && $_GET['faculty'] == 'edit')
						{
							require('subjectmanagement/edit_faculty_form.php');
						}
					?>
				</div><!--/span-->
			</div><!--/row-->
		
			<!-- end: Content -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	</div>
	<div class="modal hide fade" id="myModal">
		<form method="post" action="subjectmanagement/process_subject.php">  
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>ADD SUBJECT</h3>
			</div>
			<div class="modal-body">
				<div class="control-group">
					<label class="control-label" for="focusedInput">Subject Code:</label>
					<div class="controls">
					  <input name="Subject" placeholder="Subject Code" class="input-xlarge focused" id="focusedInput" type="text" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				<div class="control-group">
					<label class="control-label" for="focusedInput">Description:</label>
					<div class="controls">
					  <input name="desc" placeholder="Description" class="input-xlarge focused" id="focusedInput" type="text" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				<div class="control-group">
					<label class="control-label" for="selectError2">Semester:</label>
					<div class="controls">
					  <select name="SemID" id="selectError2" data-rel="chosen" required>
					  	<option value=""> </option>
						<?php
		                    $result = mysql_query("SELECT sem.*,sy.* FROM fr_semester as sem, fr_sy as sy WHERE sy.SYID = sem.SYID ORDER BY sem.Semester ASC");

		                    while ($row = mysql_fetch_array($result)) 
		                    {
		                        echo "<option value='".$row['SemID']."'>".$row['Semester'].' / '.$row['SYstart'].'-'.$row['SYend'];
		                    }
		                ?>    
					  </select><font style="color:red;"> *</font>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<input name="subject" type="submit" value="Save changes" class="btn btn-primary">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
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
