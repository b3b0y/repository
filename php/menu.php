<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="newsfeed.php"><i class="icon-pushpin"></i><span class="hidden-tablet"> Announcement </span></a></li>
			<?php 
				$result = mysql_query("SELECT * FROM  fr_path WHERE user_id = '".$_SESSION['user_id']."'") or die('Error share: '. mysql_error());
			 	if(mysql_num_rows($result) > 0)
			 	{
			 		while ($row = mysql_fetch_array($result)) 
			 		{								 			
			?>	
						<li><a href="index.php?id=<?php echo $row['id']; ?>"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager </span></a></li>	
			<?php
			 		}
			 	}
			?>

			<?php 
				if($_SESSION['UserLvl'] == '1')
				{
			?>
					<li><a href="enroll_subject.php?subject=enroll"><i class="icon-book"></i><span class="hidden-tablet"> Enroll subject </span></a></li>
					<li><a href="enroll_subject.php?subject=subject"><i class="icon-book"></i><span class="hidden-tablet"> My subject </span></a></li>		
					<li><a href="messages.php"><i class="icon-globe"></i><span class="hidden-tablet"> Notification</span> 
					</a></li>

			<?php
				}
				else
				{
			?>
					<li><a href="dashboard.php"><i class="icon-cog"></i><span class="hidden-tablet"> Dashboard </span></a></li>	
					<li><a href="messages.php"><i class="icon-globe"></i><span class="hidden-tablet"> Notification</span> 
					</a></li>
			<?php
				}
			?>
		</ul>
	</div>
</div>
<!-- end: Main Menu -->