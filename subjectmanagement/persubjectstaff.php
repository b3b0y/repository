<div class="box-content">
	<a href="subjectmanagement.php?subject=faculty"><button>Back</button></a>
</div>
							

<div class="box-header" data-original-title>
	<?php 
		$result = mysql_query("SELECT * FROM fr_staff WHERE user_id = '".$_GET['user_id']."'");
		$row = mysql_fetch_array($result);

	?>
	<h2><i class="halflings-icon calendar"></i><span class="break"></span><b><?php echo $row['FirstN']." ".$row['LastN']; ?></b></h2>
</div>
<div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
	  <thead>
		  <tr>
		  	<th>No. </th>
		  	<th>Subject code</th>
			<th>Description</th>
			<th>Semester</th>
			<th>S.Y.</th>
			<th>Action</th>

		  </tr>
	  </thead>   
	  <tbody>
	  	<?php

	  		$result = mysql_query("SELECT isub.id,isub.Subject,sub.Description,sy.*,sem.* FROM fr_ins_subject as isub,fr_subject as sub , fr_semester as sem , fr_sy as sy WHERE sem.SYID = sy.SYID AND  sem.SemID = sub.SemID AND sub.SubCode = isub.Subject AND sem.sem_status = 'Active' AND isub.user_id = '".$_GET['user_id']."'") or die("Error:".mysql_error());							
		 	if(mysql_num_rows($result) > 0)
		 	{
		 		while ($row = mysql_fetch_array($result)) 
		 		{			
		 		$C++;					 			
		 ?>
		 		<tr>    
		 			<td><?php echo $C; ?></td> 
	              	<td><?php echo $row['Subject']; ?></td>
	              	<td><?php echo $row['Description']; ?></td>
	              	<td><?php echo $row['Semester']; ?></td>
	              	<td><?php echo $row['SYstart'].'-'.$row['SYend']; ?></td>
					<td><a onclick="return confirm('Are you sure you want to delete?');" href="php/delete.php?delete=faculty&&id=<?php echo $row['id']; ?>&&subcode=<?php echo $row['Subject']; ?>"><button><i class="halflings-icon trash"></i></button></a></td>
				</tr>  
		<?php
				}
			}
		?>
	  </tbody>
  </table>  
</div>