<?php
		$result1 = mysql_query("SELECT * FROM fr_subject WHERE subID ='".$_GET['id']."'");
		$row1 = mysql_fetch_array($result1);
?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>FACULTY</h2>
		</div>		
		<div class="box-content">
			<form method="post" action="subjectmanagement/process_subject.php?edit=true" class="form-horizontal">
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<fieldset>
				   <div class="control-group">
					<label class="control-label" for="focusedInput">Subject Code:</label>
					<div class="controls">
					  <input name="Subject" placeholder="Subject Code" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row1['SubCode']; ?>"  required><font style="color:red;" > *</font>
					</div>
				  </div>
				<div class="control-group">
					<label class="control-label" for="focusedInput">Description:</label>
					<div class="controls">
					  <input name="desc" placeholder="Description" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row1['Description']; ?>" required><font style="color:red;" > *</font>
					</div>
				  </div>
				<div class="control-group">
					<label class="control-label" for="selectError2">Semester:</label>
					<div class="controls">
					  <select name="SemID" id="selectError2" data-rel="chosen" required>
					  	<option value=""> </option>
						<?php
		                    $result = mysql_query("SELECT sem.*,sy.* FROM fr_semester as sem, fr_sy as sy WHERE sy.SYID = sem.SYID ORDER BY sem.Semester ASC");

		                    while ($row = mysql_fetch_array($result)) 
		                    {
		                 ?>
		                       <option value='<?php echo $row['SemID']; ?>' <?php  if($row['SemID'] == $row1['SemID']) { echo "SELECTED"; } else { echo ""; } ?> > <?php echo $row['Semester'].' / '.$row['SYstart'].'-'.$row['SYend']; ?>
		                <?php 
		                    }
		                ?>    
					  </select><font style="color:red;"> *</font>
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Save changes</button>
					<a class="btn" href="subjectmanagement.php?subject=subject">Cancel</a>
				  </div>
				</fieldset>
			  </form>
		</div>
	</div><!--/span-->
</div><!--/row-->		
