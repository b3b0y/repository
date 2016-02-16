<?php 

$result = mysql_query("SELECT fr_user.*,fr_stud.* FROM fr_user,fr_stud WHERE fr_user.UserLvl = 1  AND fr_user.id = fr_stud.user_id AND fr_user.id = '".$_GET['id']."'") or die ("Instructor :". mysql_error());
$row = mysql_fetch_array($result);

?>

<div class="box-content">
 <a href="user.php?student=true&&cancel=true"><button class="btn">Cancel</button></a>
</div>


<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>STUDENT</h2>
	</div>		
	<div class="box-content">
			<form method="post" action="Forms/process_edit.php?student=student" class="form-horizontal">
				<input name="id"  type="hidden" value="<?php echo $_GET['id']; ?>" > 
				<fieldset>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Control number:</label>
					<div class="controls">
					  <input name="Idnum" placeholder="Control number" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['ControlNo'])) { echo $_SESSION['ControlNo']; } else { if(isset($_SESSION['cfail'])) { echo ""; } else { echo  $row['ControlNo']; } } ?>" required><font style="color:red;" > *</font> <font style="color:red;" > <strong><?php echo $_SESSION['cfail']; ?> </font> 
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">First name:</label>
					<div class="controls">
					  <input name="Fname" placeholder="First Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['fname'])) { echo $_SESSION['fname']; } else { echo  $row['FName']; } ?>" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Middle name:</label>
					<div class="controls">
					  <input name="Mname" placeholder="Middle Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['mname'])) { echo $_SESSION['mname']; } else { echo  $row['Mname']; } ?>">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Last name:</label>
					<div class="controls">
					  <input name="Lname" placeholder="Last Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['lname'])) { echo $_SESSION['lname']; } else { echo  $row['LName']; } ?>" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="selectError">Course</label>
					<div class="controls">
					  <select name="course" id="selectError" data-rel="chosen" required>
						<option value=""></option> 
		                <?php
		                    $result1 = mysql_query("SELECT * FROM fr_course");

		                    while ($row1 = mysql_fetch_array($result1)) 
		                    {																	
		                ?>																						
		                        <option value='<?php echo $row1['CCode']; ?>' <?php  if($row['Course'] == $row1['CCode'] || $row1['CCode'] == $_SESSION['course']) { echo "SELECTED"; } else { echo ""; } ?> > <?php echo $row1['CCode']; ?>
		                <?php
		                    }
		                ?>  
					  </select><font style="color:red;"> *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="selectError2">Year</label>
					<div class="controls">
					  <select name="year" id="selectError2" data-rel="chosen" required>
						<option value=""> </option>
		                <option value="1st Year" <?php if('1st Year' == $_SESSION['year'] || '1st Year' == $row['Year'])  { echo "SELECTED"; } else { echo ""; } ?> >1st</option>
		                <option value="2nd Year" <?php if('2nd Year' == $_SESSION['year'] || '2nd Year' == $row['Year'])  { echo "SELECTED"; } else { echo ""; } ?> >2nd</option>
		                <option value="3rd Year" <?php if('3rd Year' == $_SESSION['year'] || '3rd Year' == $row['Year'])  { echo "SELECTED"; } else { echo ""; } ?> >3rd</option>
		                <option value="4th Year" <?php if('4th Year' == $_SESSION['year'] || '4th Year' == $row['Year'])  { echo "SELECTED"; } else { echo ""; } ?> >4th</option>
		                <option value="5th Year" <?php if('5th Year' == $_SESSION['year'] || '5th Year' == $row['Year'])  { echo "SELECTED"; } else { echo ""; } ?> >5th</option>
					  </select><font style="color:red;"> *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Username:</label>
					<div class="controls">
					  <input name="uname" placeholder="Username" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['uname'])) { echo $_SESSION['uname']; } else { if(isset($_SESSION['UFail'])) { echo ""; } else { echo $row['username']; } }  ?>" required><font style="color:red;" > *</font> <font style="color:red;" ><?php  if(isset($_SESSION['UFail'])) { echo $_SESSION['UFail']; } else { echo ""; } ?> </font>  
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Password:</label>
					<div class="controls">
					  <input name="pass" placeholder="Password" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['pass'])) { echo $_SESSION['pass']; } else { echo  $row['password']; } ?>" readonly><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="form-actions">
					<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
				  </div>
				</fieldset>
			  </form>
		
		</div>
	</div><!--/span-->
</div><!--/row-->		
