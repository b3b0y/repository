
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>STUDENT</h2>
	</div>		
	<div class="box-content">
			<div class="box-content alerts">
				<?php
					if(isset($_SESSION['cfail']))
					{
				?>
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong><?php echo $_SESSION['cfail']; ?>
					</div>
				<?php
					}
				?>
			</div>
			<form method="post" action="Forms/process_account.php?student=student" class="form-horizontal">
				<fieldset>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Control number:</label>
					<div class="controls">
					  <input name="Idnum" placeholder="Control number" class="input-xlarge focused" id="focusedInput" type="text" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">First name:</label>
					<div class="controls">
					  <input name="Fname" placeholder="First Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['fname'])) {echo$_SESSION['fname']; } ?>" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Middle name:</label>
					<div class="controls">
					  <input name="Mname" placeholder="Middle Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['mname'])) {echo$_SESSION['mname']; } ?>">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Last name:</label>
					<div class="controls">
					  <input name="Lname" placeholder="Last Name" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($_SESSION['lname'])) {echo$_SESSION['lname']; } ?>" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="selectError">Course</label>
					<div class="controls">
					  <select name="course" id="selectError" data-rel="chosen" required>
						<option value=""></option> 
		                <?php
		                    $result = mysql_query("SELECT * FROM fr_course");

		                    while ($row = mysql_fetch_array($result)) 
		                    {
		                ?>
		                        <option value='<?php echo $row['CCode']; ?>' <?php echo $row['CCode'] == $_SESSION['course'] ? 'SELECTED' : ''; ?>><?php echo $row['CCode']; ?>
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
		                <option value="1st Year" <?php echo '1st Year' == $_SESSION['year'] ? 'SELECTED' : ''; ?>>1st</option>
		                <option value="2nd Year" <?php echo '2nd Year' == $_SESSION['year'] ? 'SELECTED' : ''; ?>>2nd</option>
		                <option value="3rd Year" <?php echo '3rd Year' == $_SESSION['year'] ? 'SELECTED' : ''; ?>>3rd</option>
		                <option value="4th Year" <?php echo '4th Year' == $_SESSION['year'] ? 'SELECTED' : ''; ?>>4th</option>
		                <option value="5th Year" <?php echo '5th Year' == $_SESSION['year'] ? 'SELECTED' : ''; ?>>5th</option>
					  </select><font style="color:red;"> *</font>
					</div>
				  </div>
				  <?php
				            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
				        $cpass = array(); //remember to declare $pass as an array
				        $cuname = array();
				        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache]
				        
				        
				        for($c = 0; $c < 1; $c++)
				        {
				            //password
				            for ($i = 0; $i < 8; $i++) {
				                $n = rand(0, $alphaLength);
				                
				                $cpass[$i] = $alphabet[$n];
				            }   
				            
				            $pass[] = implode($cpass);
				        }
				        for($a = 0; $a < count($pass); $a++)
				        {
				            $pass = $pass[$a]; //turn the array into a string
				            
				        }

        			?>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Password:</label>
					<div class="controls">
					  <input name="pass" placeholder="Password" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $pass; ?>" readonly><font style="color:red;" > *</font>
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
