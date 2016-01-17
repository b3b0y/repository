<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">

			<a class="brand" href="index.php"><span>CICTE WLC WEB-BASE FILE REPOSITORY</span></a>
							
			<!-- start: Header Menu -->
			<div class="nav-no-collapse header-nav">
				<ul class="nav pull-right">
					<li class="dropdown">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							<span class="label label-important"> 3 </span>
						</a>
						<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">1 min</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	
							</ul>
					</li>
					<!-- start: User Dropdown -->
					<?php 
						$result1 = mysql_query("SELECT * FROM fr_user WHERE id = '".$_SESSION['user_id']."'");
						$row1 = mysql_fetch_array($result1);
					?>
					<li class="dropdown">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="halflings-icon white user"></i> <?php echo $row1['username']; ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu-title">
									<span>Account Settings</span>
							</li>
							<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
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
