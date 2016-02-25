<?php 
		if($_SESSION['UserLvl'] == 1)
		{
			$result1 = mysql_query("SELECT * FROM fr_stud WHERE user_id = '".$_SESSION['user_id']."'");
			$row1 = mysql_fetch_array($result1);

			$name = $row1['FName'];
			$lname = $row1['LName'];
		}
		else  if($_SESSION['UserLvl'] >= 3)
		{
			$result1 = mysql_query("SELECT * FROM fr_staff WHERE user_id = '".$_SESSION['user_id']."'");
			$row1 = mysql_fetch_array($result1);

			$name = $row1['FirstN'];
			$lname = $row1['LName'];
		}	
?>

<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">

			<a class="brand" href=""><span>CICTE WLC WEB-BASE FILE REPOSITORY</span></a>
					

			<!-- start: Header Menu -->
			<div class="nav-no-collapse header-nav">
				<ul class="nav pull-right">
					<li class="dropdown hidden-phone">
						<a  class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-globe" id="notifcount"></i>
						</a>
						<ul class="dropdown-menu messages" id="msg">
	
						</ul>
					</li>
					<!-- start: User Dropdown -->
				
					<li class="dropdown">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="halflings-icon white user"></i> <?php echo $name; ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu-title">
									<span>Account Settings</span>
							</li>
							<!--<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>-->
							<li><a href="php/logout.php"><i class="halflings-icon off"></i> Logout</a></li>
						</ul>
					</li>
					<!-- end: User Dropdown -->
				</ul>
			</div>
			<!-- end: Header Menu -->
			
		</div>
	</div>
</div>
