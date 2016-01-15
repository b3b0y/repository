
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>FACULTY</h2>
	</div>		
	<div class="box-content">
			<form method="post" action="Forms/process_account.php?faculty=faculty" class="form-horizontal">
				<fieldset>
				   <div class="control-group">
					<label class="control-label" for="selectError">Select User level</label>
					<div class="controls">
					  <select name="Ulevel" id="selectError" data-rel="chosen" required>
						<option value="" ></option>
						<option value="4" >Dean</option>
						<option value="3" >Instructor</option>
					  </select><font style="color:red;"> *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">First name:</label>
					<div class="controls">
					  <input name="Fname" placeholder="First Name" class="input-xlarge focused" id="focusedInput" type="text" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Middle name:</label>
					<div class="controls">
					  <input name="Mname" placeholder="Middle Name" class="input-xlarge focused" id="focusedInput" type="text" value="" >
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Last name:</label>
					<div class="controls">
					  <input name="Lname" placeholder="Last Name" class="input-xlarge focused" id="focusedInput" type="text" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Username:</label>
					<div class="controls">
					  <input name="uname" placeholder="Username" class="input-xlarge focused" id="focusedInput" type="text" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Password:</label>
					<div class="controls">
					  <input name="pass" placeholder="Password" class="input-xlarge focused" id="focusedInput" type="password" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Confirm password:</label>
					<div class="controls">
					  <input name="repass" placeholder="Confirm password" class="input-xlarge focused" id="focusedInput" type="password" value="" required><font style="color:red;" > *</font>
					</div>
				  </div>
				  <div class="form-actions">
					<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
					<button class="btn">Cancel</button>
				  </div>
				</fieldset>
			  </form>
		
		</div>
	</div><!--/span-->
</div><!--/row-->		
