<?php session_start();

	date_default_timezone_set("Asia/Hong_kong");

	include_once("php/config.php");

	if(!isset($_SESSION['login'])) 
	{
	      header("Location: login.php");
	} 

	if (isset($_POST['submit'])) 
	{
		$date = date ("y/m/d H:i:s");

		
		$result = mysql_query("SELECT * FROM fr_stud_subject WHERE subject_id = '".$_POST['subject']."'");
		if(mysql_num_rows($result) > 0)
		{
			mysql_query("INSERT INTO fr_news(subject_id,ins_id,message,date) VALUES('".$_POST['subject']."','".$_SESSION['user_id']."','".$_POST['message']."','".$date."')");

			$result1 = mysql_query("SELECT * FROM fr_staff WHERE user_id = '".$_SESSION['user_id']."'");
			$row1 = mysql_fetch_array($result1);

			$name = $row1['FirstN']." ".$row1['LastN'];

			$link = 'newsfeed.php?';

	        $message = $name.' is set a New Announcement ';                

			while ($row = mysql_fetch_array($result)) 
			{
				mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row['user_id']."','".$link."','".$message."','unread','".$date."')");
			}

			echo "<script> window.location.href='newsfeed.php'; </script>";
		}
	}

	if(isset($_GET['notid']) && !empty($_GET['notid']))
	{
		mysql_query("UPDATE fr_notification SET status = 'read' WHERE id = '".$_GET['notid']."'");
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
					<li><a href="">News feed</a></li>
				</ul>

				<?php
					if($_SESSION['UserLvl'] >= 3)
					{
				?>
    			<div class="row-fluid">
					<div class="content">
	            		<form role="form" action="newsfeed.php" method="post" class="registration-form">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="selectError">Select Subject</label>
									<div class="controls">
									  <select name="subject" id="selectError" data-rel="chosen" required>
									  	<option value="" ></option>
										<?php
										$result = mysql_query("SELECT fr_ins_subject.*,fr_subject.* FROM fr_ins_subject,fr_subject WHERE fr_subject.SubCode = fr_ins_subject.Subject AND fr_ins_subject.user_id = '".$_SESSION['user_id']."'");
										 	if(mysql_num_rows($result) > 0)
										 	{
										 		while ($row = mysql_fetch_array($result)) 
										 		{								 			
										 ?>
										 			<option value="<?php echo $row['id']; ?>"> <?php echo $row['Subject']; ?> </option>  
										<?php
												}
											}
										?>
									  </select><font style="color:red;"> *</font>
									</div>
								</div>

								<textarea class="input-xlarge span12" id="message" name="message" rows="3" placeholder="Click here to write a message" required></textarea>

							</fieldset>
			    			<div class="">
			    				<button type="submit" name="submit" class="btn btn-primary">Send message </button>
							</div>
	    				</form>
	    			</div> 
    			</div>
				<?php
					}
				?>

				<div class="row-fluid">
					<div class="content">
						<br>
						<div class="span12" style="overflow-y: scroll; height:1000px;">

							<?php 
							$bol = true;
							if($_SESSION['UserLvl'] == 1)
							{
								$result1 = mysql_query("SELECT * FROM fr_stud_subject WHERE user_id = '".$_SESSION['user_id']."'  ORDER BY Date_Created DESC");
								$bol = false;
							}
							else
							{
								$result1 = mysql_query("SELECT * FROM fr_ins_subject WHERE user_id = '".$_SESSION['user_id']."' ORDER BY Date_Created DESC");
							
							}

								while ($row = mysql_fetch_array($result1)) 
								{
									
									if($bol == false)
									{
										$subject_id = $row['subject_id'];
									}
									else
									{
										$subject_id = $row['id'];
									}
									
									$result = mysql_query("SELECT DISTINCT news.id,news.message,news.date,staff.FirstN,staff.LastN,studsub.subject FROM  fr_news as news , fr_staff as staff, fr_stud_subject as studsub WHERE staff.user_id = news.ins_id AND studsub.subject_id = news.subject_id AND news.subject_id = '".$subject_id."' ORDER BY news.date DESC");
									if(mysql_num_rows($result) > 0)
									{

										while ($row = mysql_fetch_array($result)) 
										{ 	
										   	$date = new DateTime($row['date']);
							?>		
										<div class="task low">
											<div class="desc">
												<div class="title">
													<?php 
														if($_SESSION['UserLvl'] >= 3)
														{
													?>
															<a onclick="return confirm('Are you sure you want to delete?');" href="php/delete.php?id=<?php echo $row['id']; ?>&&delete=message"> <i class="icon-trash"> </i> </a> 
													<?php 
														}
													?>
												</div>
												<div class="title">
													Subject : <b> <?php echo $row['subject']; ?> </b>
												</div>
												<div class="title">
														Instructor : <b><?php echo  $row['FirstN']." ".$row['LastN']; ?> </b>
												</div>
												<div class="title">
													Message:
												</div>
											</div>
											<div class="time">
												<div class="date"><?php echo date_format($date,"M d, Y"); ?></div>
												<div> <?php  echo time_elapsed_string($row['date']); ?></div>
											</div>

													<div style="padding: 0px 30px 10px;background-color: ">
														<?php echo $row['message']; ?>
													</div>
										</div>
										<br>
										<div class="clearfix"></div>	
								<?php
										}
									}	
								}
							?>	
							
						</div>
					</div>
				<!-- end: Content -->
				</div><!--/#content.span10-->

			</div><!--/fluid-row-->
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
