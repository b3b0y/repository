<?php session_start();

	include_once("../php/config.php");

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
	<link id="bootstrap-style" href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../css/style-responsive.css" rel="stylesheet">
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
	<link rel="shortcut icon" href="../img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body >
	
	<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Content -->
			<div id="content" class="span10">		
					<div class="row-fluid sortable">
						<div class="box span9">
							<div class="box-header">
								<script>
		                           //window.print();

		                            function printpage()
		                            {
		                                window.print();
		                            }
		                        </script>
		                        <style type="text/css">
		                            @media print {
		                              /* style sheet for print goes here */
		                              .hide-from-printer{  display:none; }
		                            }
		                        </style>
								<a class="hide-from-printer" href="../reports.php?view=folder&&foldern=<?php echo $_GET['foldern']; ?>&&id=<?php echo $_GET['id']; ?>"><button>Back</button></a> 
								<input class="hide-from-printer" type="button" value="Print" onclick="printpage()">
							</div>

							


							<?php 
									$result = mysql_query("SELECT pn.*,isub.Subject FROM project_notif as pn , fr_ins_subject  as isub WHERE pn.subject_id = isub.id AND pn.folder_name = '".$_GET['foldern']."' AND pn.subject_id = '".$_GET['id']."'");
									$row = mysql_fetch_array($result);
							?>
									<div class="box-content">
										<div class="page-header">
											<center>
													WESTERN LEYTE COLLEGE OF ORMOC CITY, INC.
												<br>
													Bonifacio St. Ormoc City
												<br>
													College of ICT & Engineering
												<br><br>
												<b>
													<br>List of Students Submitted
													<br>in
													<br><?php echo  $row['Subject']; ?>
												</b>
											</center>
									  	</div>

									  	<table  class="table bootstrap-datatable datatable">
									  		<thead>
									  			<th>Name</th>
				              					<th>Project</th>
				              					<th>Date Submitted</th>
									  		</thead>
									  		<tbody>
									  			<?php
									  				$result = mysql_query("SELECT stud.*,pn.* FROM project_notif as pn , fr_stud  as stud WHERE pn.stud_id = stud.user_id AND pn.folder_name = '".$_GET['foldern']."' AND pn.subject_id = '".$_GET['id']."'");
												 	if(mysql_num_rows($result) > 0)
												 	{
												 		while ($row1 = mysql_fetch_array($result)) 
												 		{								 			
												 ?>
									  			<tr>
										 			<td><?php echo $row1['FName']." ".$row1['LName']; ?></td>
		              								<td><?php echo $row1['project_name']; ?></td>
		              								<td><?php echo $row1['Date']; ?></td>
											    </tr>
									  			<?php
														}
													}
												?>
									  		</tbody>
									  	</table>
										         

									</div>
					</div><!--/span-->
				</div>
		
			<!-- end: Content -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	</div>
	
	<div class="clearfix"></div>

	<!-- start: JavaScript-->

		<script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
	
		<script src="../js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="../js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="../js/jquery.ui.touch-punch.js"></script>
	
		<script src="../js/modernizr.js"></script>
	
		<script src="../js/bootstrap.min.js"></script>
	
		<script src="../js/jquery.cookie.js"></script>
	
		<script src='../js/fullcalendar.min.js'></script>
	
		<script src='../js/jquery.dataTables.min.js'></script>

		<script src="../js/excanvas.js"></script>
	<script src="../js/jquery.flot.js"></script>
	<script src="../js/jquery.flot.pie.js"></script>
	<script src="../js/jquery.flot.stack.js"></script>
	<script src="../js/jquery.flot.resize.min.js"></script>
	
		<script src="../js/jquery.chosen.min.js"></script>
	
		<script src="../js/jquery.uniform.min.js"></script>
		
		<script src="../js/jquery.cleditor.min.js"></script>
	
		<script src="../js/jquery.noty.js"></script>
	
		<script src="../js/jquery.elfinder.min.js"></script>
	
		<script src="../js/jquery.raty.min.js"></script>
	
		<script src="../js/jquery.iphone.toggle.js"></script>
	
		<script src="j../s/jquery.uploadify-3.1.min.js"></script>
	
		<script src="../js/jquery.gritter.min.js"></script>
	
		<script src="../js/jquery.imagesloaded.js"></script>
	
		<script src="../js/jquery.masonry.min.js"></script>
	
		<script src="../js/jquery.knob.modified.js"></script>
	
		<script src="../js/jquery.sparkline.min.js"></script>
	
		<script src="../js/counter.js"></script>
	
		<script src="../js/retina.js"></script>

		<script src="../js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
