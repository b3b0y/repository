<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">

			<a class="brand" href="index.php"><span>CICTE WLC WEB-BASE FILE REPOSITORY</span></a>
							
			<!-- start: Header Menu -->
			<div class="nav-no-collapse header-nav">
				<ul class="nav pull-right">
					<li class="dropdown">
						<?php
							$result = mysql_query("SELECT * FROM fr_notification WHERE user_id = '".$_SESSION['user_id']."' AND status = 'unread'");
							$cnt =  mysql_num_rows($result);
						?>
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="icon-envelope"></i>
								<?php
									if($cnt != 0)
									{
								?>
										<span class="label label-important"> <?php echo $cnt; ?> </span>
								<?php
									}
								?>
								</a>
						<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have <?php echo $cnt; ?> notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<?php
									while ($row = mysql_fetch_array($result)) 
									{
								?>	
		                            	<li>
		                                    <a href="<?php echo $row['link']; ?>&&id=<?php echo $row['id']; ?>">
												<span class="icon blue"><i class="icon-user"></i></span>
												<span class="message"><?php echo $row['message']; ?></span>
		                                    </a>
		                                </li>
                                <?php
                                	}
                                ?>
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
