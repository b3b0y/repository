<div class="box-content">
	<a href="subjectmanagement.php?subject=student"><button>Back</button></a>
</div>
							

<div class="box-header" data-original-title>
	<h2><i class="halflings-icon calendar"></i><span class="break"></span><b><?php echo $_GET['subcode']; ?></b></h2>
</div>
<div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
	  <thead>
		  <tr>
		  	<th >Control No.</th>
				<th >Name of Students</th>
				<th >Year level</th>
				<th >Date Enrolled</th>
				<th>Status</th>
				<th >Action</th>

		  </tr>
	  </thead>   
	  <tbody>
	  	<?php
	  		$result = mysql_query("SELECT stud.ControlNo,stud.FName,stud.LName,stud.Year,studsub.* FROM fr_ins_subject as sub,fr_stud as stud,fr_stud_subject as studsub , fr_subject WHERE fr_subject.SubCode = sub.Subject AND studsub.subject_id = sub.id AND studsub.user_id = stud.user_id AND sub.Subject = '".$_GET['subcode']."'")or die(mysql_error());
	  		if(mysql_num_rows($result) > 0)
		 	{
		 		while ($row = mysql_fetch_array($result)) 
		 		{								 			
		 ?>
		 		<tr>
		 			<td><?php echo $row['ControlNo']?></td>  
		            <td><?php echo $row['FName']." ".$row['LName']; ?></td>
		            <td><?php echo $row['Year']; ?></td>
		            <td><?php echo $row['Date_Created']; ?></td>
		            <td><?php echo  $row['status'] == 'APPROVED' ? '<span class="btn btn-mini btn-success">Enrolled</span>' : '<span class="btn btn-mini btn-danger">'.$row['status'].'</span>' ; ?> </td>
		            <td><a onclick="return confirm('Are you sure you want to Drop?');" href="php/delete.php?delete=drop&&id=<?php echo $row['id']; ?>"><button><i class="halflings-icon trash"></i> Drop</button></a></td>
			    </tr>   
		<?php
				}
			}

			?>
	  </tbody>
  </table>  
</div>