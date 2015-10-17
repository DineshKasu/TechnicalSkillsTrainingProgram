<?php 
	include ('menu_mentor.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
<?php	
	if (isset($_POST['submit']))
	{
		if (($_POST['s_id'] == '')or($_POST['s_name'] == '')or($_POST['s_cellno'] == '')or($_POST['s_email'] == '')or($_POST['s_gender'] == '')or($_POST['p_name'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{ 
		$a = addslashes("$_POST[s_id]");
		$b = addslashes("$_POST[s_name]");
		$c = addslashes("$_POST[s_email]");
		$d = addslashes("$_POST[s_cellno]");
		$e = addslashes("$_POST[s_gender]");
		$f = addslashes("$_POST[s_address]");
		$g = addslashes("$_POST[s_age]");
		$h = addslashes("$_POST[p_name]");
					
		$sql = "INSERT INTO STUDENT(s_id,s_name,s_email,s_cellno,s_gender,s_address,s_age) VALUES ('$a','$b','$c','$d','$e','$f','$g')";
		$qry = mysql_query($sql);
			if ($qry){
				
					 $sql2 = "SELECT * FROM PROGRAM WHERE p_name = '$h'";
				     $qry2 = mysql_query($sql2);
				     $rec2 = mysql_fetch_array($qry2);
				     $p_id1 = $rec2['p_id'];
				     $sql3 = "INSERT INTO ATTENDS VALUES ('$a','$p_id1',2000,100)";
				     $qry3 =mysql_query($sql3);
				
				echo '<div style="position:absolute; left:450px; top:200px; width: 450px">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
									<hr class="message-inner-separator">
									<p><strong>Success!</strong> STUDENT Information added!
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a href="admin_mentor.php"><button type="button" class="btn btn-success">Continue</button></a>
									</p>
								</div>
							</div>';
					exit();
				}
			else {
				echo "not posted!";
				}
		}
	}
?>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1><font color ="red">Add Student</font></h1>
					</div>
				</div>
			</div>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
					<form enctype="multipart/form-data" method="post" class="form-horizontal">
						<fieldset>
							<div class = "col-md-9 col-md-offset-2">
								<h3>Student Information</h3>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="s_id">Student ID</label>
							  <div class="col-md-2">
							  <input id="s_id" name="s_id" type="text" placeholder="Student ID" class="form-control input-md">
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="s_name">Student Name</label>  
							  <div class="col-md-2">
							  <input id="s_name" name="s_name" type="text" placeholder="Student Name" class="form-control input-md" required="">
							  </div>
							</div>
						
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_email">Email</label>  
							  <div class="col-md-2">
							  <input id="s_email" name="s_email" type="text" placeholder="Email" class="form-control input-md" required="">	
							  </div>
							  
							  <label class="col-md-1 control-label" for="s_gender">Gender</label>
							  <div class="col-md-1">
								<select id="s_gender" name="s_gender" class="form-control">
								  <option> </option>
								  <option>Male</option>
								  <option>Female</option>
								</select>
							  </div>
							</div>

														<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="s_cellno">Cell No</label>  
							  <div class="col-md-2">
							  <input id="s_cellno" name="s_cellno" type="text" placeholder="Cell No" class="form-control input-md" required="">
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="s_age">Age</label>  
							  <div class="col-md-1">
							  <input id="s_age" name="s_age" type="text" placeholder="Age" class="form-control input-md" required="">
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="s_address">Address</label>  
							  <div class="col-md-2">
							  <input id="s_address" name="s_address" type="text" placeholder="Address" class="form-control input-md" required="">
							  </div>
							</div>

														<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="p_name">Program</label>
							  <div class="col-md-2">
								   <?php
									   $select = "SELECT * FROM PROGRAM";
									   $qry = mysql_query($select);
									   
									   echo "<select id='p_name' name='p_name' class='form-control'>";
									   echo "<option> </option>";
									   while($recs = mysql_fetch_array($qry)){
										  echo"<option value = '$recs[p_name]'>$recs[p_name]</option>";

							 
									   }
									   
										echo"</select>";
									?>
							  </div>
							</div>
		

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="addedby">Added By</label>  
							  <div class="col-md-3">
							  <input id="addedby" name="addedby" type="text" class="form-control input-md" value="<?php echo " ".$FirstName." ";?>" readonly>
							  </div>
							</div>

							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
								<a href = "admin_mentor.php"><input type = "button" value = "Cancel" class="btn btn-default"></a>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>

		</div>	