<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="index.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager </span></a></li>	
			<?php 
				if($_SESSION['UserLvl'] == '1')
				{
			?>
					<li><a href="enroll_subject.php?subject=enroll"><i class=""></i><span class="hidden-tablet"> Enroll subject </span></a></li>
					<li><a href="enroll_subject.php?subject=subject"><i class=""></i><span class="hidden-tablet"> My subject </span></a></li>		
			<?php
				}
				else
				{
			?>
					<li><a href="dashboard.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard </span></a></li>	
			<?php
				}
			?>
		</ul>
	</div>
</div>
<!-- end: Main Menu -->