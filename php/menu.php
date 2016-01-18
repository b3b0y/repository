<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="index.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager </span></a></li>	
			<?php 
					$result = mysql_query("SELECT * FROM fr_notification WHERE user_id = '".$_SESSION['user_id']."' AND status = 'unread'");
					$cnt =  mysql_num_rows($result);
				if($_SESSION['UserLvl'] == '1')
				{
			?>
					<li><a href="enroll_subject.php?subject=enroll"><i class="icon-book"></i><span class="hidden-tablet"> Enroll subject </span></a></li>
					<li><a href="enroll_subject.php?subject=subject"><i class="icon-book"></i><span class="hidden-tablet"> My subject </span></a></li>		
					<li><a href="messages.php"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span> 
					<?php
					if($cnt != 0)
					{
					?>
							<span class="label label-important"> <?php echo $cnt; ?> </span>
					<?php
						}
					?>
					</a></li>

			<?php
				}
				else
				{
			?>
					<li><a href="dashboard.php"><i class="icon-cog"></i><span class="hidden-tablet"> Dashboard </span></a></li>	
					<li><a href="messages.php"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span> 
						<?php
						if($cnt != 0)
						{
						?>
								<span class="label label-important"> <?php echo $cnt; ?> </span>
						<?php
							}
						?>
					</a></li>
			<?php
				}
			?>
		</ul>
	</div>
</div>
<!-- end: Main Menu -->