<?php 
	

	if(isset($_GET['readall']) && $_GET['readall'] == '1')
	{
		mysql_query("UPDATE fr_notification SET status = 'read' WHERE user_id = '".$_GET['user_id']."'");
	

	}
	
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
						<?php
							$result = mysql_query("SELECT * FROM fr_notification WHERE user_id = '".$_SESSION['user_id']."' AND status = 'unread' ORDER BY id DESC");
							$cnt =  mysql_num_rows($result);
						?>
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="icon-globe"></i>
								<?php
									if($cnt != 0)
									{
								?>
										<span class="label label-important"> <?php echo $cnt; ?> </span>
								<?php
									}
								?>
								</a>
						<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have <?php echo $cnt; ?> notifications</span>
									<a href="<?php echo $_SERVER["PHP_SELF"]?>?readall=1&&user_id=<?php echo $_SESSION['user_id']; ?>"><i class="icon-repeat"></i></a>
								</li>
								<?php
									while ($row = mysql_fetch_array($result)) 
									{
								?>	
		                            	<li>
		                                    <a href="<?php echo $row['link']; ?>&&notid=<?php echo $row['id']; ?>">
		                                    	<span class="avatar"><img src="" alt=""></span>
		                                    	<span class="header">
													<span class="from">
														&nbsp
												    </span>
													<span class="time">
												    	<?php  echo time_elapsed_string($row['Date']); ?>
												    </span>
												</span>
												<span class="message">
												<?php echo $row['message']; ?>
												</span>
		                                    </a>
		                                </li>
                                <?php
                                	}
                                ?>
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
