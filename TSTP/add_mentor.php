<?php 
	include ('menu_director.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
<?php	
	if (isset($_POST['submit']))
	{
		if (($_POST['m_id'] == '')or($_POST['m_name'] == '')or($_POST['m_cellno'] == '')or($_POST['m_email'] == '')or($_POST['m_gender'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{ 
		$a = addslashes("$_POST[m_id]");
		$b = addslashes("$_POST[m_name]");
		$c = addslashes("$_POST[m_email]");
		$d = addslashes("$_POST[m_cellno]");
		$e = addslashes("$_POST[m_gender]");
		$f = addslashes("$_POST[m_salary]");
					
		$sql = "INSERT INTO MENTOR(m_id,m_name,m_email,m_cellno,m_gender,m_salary) VALUES ('$a','$b','$c','$d','$e','$f')";
		$qry = mysql_query($sql);
			if ($qry){
			
			           $Mquery = "INSERT INTO MENTOR_HISTORY(m_id,m_name,m_email,m_cellno,m_gender,m_salary,m_vst,m_vet) VALUES ('$a','$b','$c','$d','$e','$f',now(),'9999-12-31')";
					   mysql_query($Mquery);
				echo '<div style="position:absolute; left:450px; top:200px; width: 450px">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
									<hr class="message-inner-separator">
									<p><strong>Success!</strong> MENTOR Information added!
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a href="admin_director.php"><button type="button" class="btn btn-success">Continue</button></a>
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
						<h1><font color ="red">Add Mentor</font></h1>
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
								<h3>Mentor Information</h3>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="m_id">Mentor ID</label>
							  <div class="col-md-2">
							  <input id="m_id" name="m_id" type="text" placeholder="Mentor ID" class="form-control input-md">
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="pm_name">Mentor Name</label>  
							  <div class="col-md-2">
							  <input id="m_name" name="m_name" type="text" placeholder="Mentor Name" class="form-control input-md" required="">
							  </div>
							</div>
						
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="m_email">Email</label>  
							  <div class="col-md-2">
							  <input id="m_email" name="m_email" type="text" placeholder="Email" class="form-control input-md" required="">	
							  </div>
							  
							  <label class="col-md-1 control-label" for="m_gender">Gender</label>
							  <div class="col-md-2">
								<select id="m_gender" name="m_gender" class="form-control">
								  <option> </option>
								  <option>Male</option>
								  <option>Female</option>
								</select>
							  </div>
							</div>

														<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="m_cellno">Cell No</label>  
							  <div class="col-md-2">
							  <input id="m_cellno" name="m_cellno" type="text" placeholder="Cell No" class="form-control input-md" required="">
							  </div>
							  
							  <label class="col-md-2 control-label" for="m_cellno">Salary $</label>  
							  <div class="col-md-2">
							  <input id="m_salary" name="m_salary" type="text" placeholder="00000000.00" class="form-control input-md" required="">
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
								<a href = "admin_director.php"><input type = "button" value = "Cancel" class="btn btn-default"></a>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>

		</div>	