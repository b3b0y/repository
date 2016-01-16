
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>STUDENT</h2>
	</div>		
	<div class="box-content">
				<fieldset>
					<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" name="myform">
						<div class="control-group">
						<label class="control-label" for="selectError">SELECT INSTRUCTOR</label>
						<div class="controls">
						  <select id="category" name="inst" id="selectError" data-rel="chosen" required>
							<option value=""></option> 
			                <?php
			                    $result = mysql_query("SELECT fr_user.*,fr_staff.* FROM fr_staff, fr_user WHERE fr_staff.user_id = fr_user.id AND fr_user.UserLvl BETWEEN 3 AND 4");

			                    while ($row = mysql_fetch_array($result)) 
			                    {
			                ?>
			                        <option value="<?php echo $row['uid']; ?>"><?php echo $row['FirstN']." ".$row['midN']." ".$row['LastN']; ?></option>
			                <?php
			                    }
			                ?>  
						  </select> <input name="subject" type="submit" value="Search" class="btn btn-primary"><font style="color:red;"> *</font>
						</div>

					  </div>
					</form>
					<?php
						if(isset($_POST['inst']))
						{
							$_SESSION['inst'] = $_POST['inst'];
							$result = mysql_query("SELECT * FROM fr_staff WHERE user_id = '".$_POST['inst']."'");
							$row = mysql_fetch_array($result);
					?>

					<?php
					?>
					<div class="box-header" data-original-title>
						<h2><span class="break"></span>Name: <?php echo $row['FirstN']." ".$row['midN']." ".$row['LastN']; ?></h2>
					</div>
					<div class="box-content buttons">
						<a href="#"><button class="btn btn-large btn-success">ADD SUBJECT</button></a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	<th ></th>      
			                    <th >Subject Code</th>
			                    <th >Description</th>
			                    <th >Semester / S.Y.</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
								$result = mysql_query("SELECT fr_subject.*,sem.*,sy.* FROM fr_subject , fr_semester as sem , fr_sy as  sy WHERE sem.SYID = sy.SYID AND fr_subject.SemID = sem.SemID AND NOT EXISTS (SELECT * FROM fr_ins_subject WHERE fr_subject.SubCode =  fr_ins_subject.Subject AND fr_ins_subject.user_id = '".$_POST['inst']."') AND status ='NOT ASSIGNED'");
								
							 	if(mysql_num_rows($result) > 0)
							 	{
							 		while ($row = mysql_fetch_array($result)) 
							 		{								 			
							 ?>
							 		<tr>
							 			<td><input type="checkbox" name="subject[]" value="<?php echo $row['SubCode']; ?>" required></td>       
			                          	<td><?php echo $row['SubCode']; ?></td>
			                          	<td><?php echo $row['Description']; ?></td>
			                          	<td><input type="hidden" name="sem[]" value="<?php echo $row['Semester'] ?>"><input type="hidden" name="sy[]" value="<?php echo $row['SYstart'].'-'.$row['SYend'] ?>"><?php echo $row['Semester']." / ".$row['SYstart'].'-'.$row['SYend']; ?></td>

									</tr>  
							<?php
									}
							?>
								
							<?php	
								}	
								else
								{
									echo "<tr > <td colspan='4'><center> File Records  Empty! </center></td><td> </td><td> </td><td> </td><td> </td></tr>";
								}
							?>
						  </tbody>
					  </table>
					  <?php
				          }
				       ?>
					</div>
				</fieldset>
		</div>
	</div><!--/span-->
</div><!--/row-->		
