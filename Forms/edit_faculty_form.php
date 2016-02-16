<?php 

$result = mysql_query("SELECT fr_user.*,position.*,fr_staff.* FROM fr_user,position,fr_staff WHERE fr_user.UserLvl > 1 AND fr_user.UserLvl = position.UserLvl AND fr_user.id = fr_staff.user_id AND fr_user.id = '".$_GET['id']."'") or die ("Admin :". mysql_error());
$row = mysql_fetch_array($result);

?>

<div class="box-content">
 <a href="user.php?faculty=true&&cancel=true"><button class="btn">Cancel</button></a>
</div>

<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>UPDATE FACULTY</h2>
	</div>		
	<div class="box-content">
			<form method="post" action="Forms/process_edit.php?faculty=faculty" class="form-horizontal">
				<input name="id"  type="hidden" value="<?php echo $_GET['id']; ?>" > 
				
				   <div class="control-group">
					<label class="control-label" for="selectError">Select User level</label>
					<div class="controls">
					  <select name="Ulevel" id="selectError" data-rel="chosen" required>
						<option value="" ></option>
						<?php 
							$result1 = mysql_query("SELECT * FROM position WHERE UserLvl BETWEEN 3 AND 4 ");
							while ($row1 = mysql_fetch_array($result1)) 
							{
						?>
								<option value="<?php echo $row1['UserLvl']; ?>" <?php  if($row['UserLvl'] == $row1['UserLvl'] || $row1['UserLvl'] == $_SESSION['ulvl']) { echo "SELECTED"; } else { echo ""; } ?> ><?php echo $row1['Position']; ?></option>
						<?
							}
						?>
					  </select><font style="color:red;"> *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">First name:</label>
					<div class="controls">
					  <input name="Fname" placeholder="First Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['fname'])) { echo $_SESSION['fname']; } else { echo $row['FName']; }  ?>" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Middle name:</label>
					<div class="controls">
					  <input name="Mname" placeholder="Middle Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['mname'])) { echo $_SESSION['mname']; } else { echo $row['midN'];; } ?>" >
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Last name:</label>
					<div class="controls">
					  <input name="Lname" placeholder="Last Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['lname'])) { echo $_SESSION['lname']; } else { echo $row['LastN']; }  ?>" required><font style="color:red;" > *</font>
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
					  <input name="pass" placeholder="Password" class="input-xlarge focused" id="focusedInput" type="password" value="<?php if(isset($_SESSION['pass'])) { echo $_SESSION['pass']; } else { echo $row['password']; }  ?>" required><font style="color:red;" > *</font>  <font style="color:red;" ><?php  if(isset($_SESSION['pFail'])) { echo $_SESSION['pFail']; } else { echo ""; } ?> </font>  
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Confirm password:</label>
					<div class="controls">
					  <input name="repass" placeholder="Confirm password" class="input-xlarge focused" id="focusedInput" type="password" value="<?php if(isset($_SESSION['pass'])) { echo $_SESSION['pass']; } else { echo $row['password']; } ?>" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="form-actions">
					<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
				  </div>

				
			</form>
		</div>
		
		</div>
	</div><!--/span-->
</div><!--/row-->		
