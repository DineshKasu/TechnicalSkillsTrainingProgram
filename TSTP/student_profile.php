<?php 
	include ('menu_mentor.php');
?>
<link rel="shortcut icon" href="hrlogo.png">
	<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
							<h1>Student Profile</h1>
					</div>
				</div>
			</div>
				<?php
					$select = "SELECT * FROM STUDENT WHERE S_ID='$_GET[id]'";
					
					$qry=mysql_query($select);
					$rec = mysql_fetch_array($qry);
								$s_id = "$rec[s_id]";
								$s_name = "$rec[s_name]";
								$s_age = "$rec[s_age]";
								$s_cellno = "$rec[s_cellno]";
								$s_email = "$rec[s_email]";
								$s_address = "$rec[s_address]";
								$s_gender = "$rec[s_gender]";
								
								
				?>
				

<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
						<div class = "col-md-4 col-md-offset-2">
							<h3>Student Information</h3>
						</div>
		<div class="row">
			<div class="col-md-11 col-md-offset-1">
				<form class="form-horizontal">
					<fieldset>
						<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="s_id">Student ID</label>  
							  <div class="col-md-1">
							  <input type = "text" value = "<?php echo $s_id;?>" class="form-control input-md" readonly>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_name">Full Name</label>  
							  <div class="col-md-2">
							  <input type = "text" value="<?php echo $s_name?>" class="form-control input-md" readonly>
							  </div>
							</div>

							<?php
							 $sql1 = "select * from program,attends where program.p_id = attends.p_id and attends.s_id = '$s_id'";
							 $qry1=mysql_query($sql1);
							 $rec1=mysql_fetch_array($qry1);
							 
							  echo '							<div class="form-group">
							  <label class="col-md-2 control-label" for="p_name">Program</label>  
								<div class="col-md-1">
									<input type = "text" value="'.$rec1['p_name'].'" class="form-control input-md" readonly>
								</div>
							</div>';
							
							?>
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_age">Age</label>  
								<div class="col-md-1">
									<input type = "text" value="<?php echo $s_age;?>" class="form-control input-md" readonly>
								</div>
							  
							  <label class="col-md-1 control-label" for="s_gender">Gender</label>
							  <div class="col-md-1">
									<input type = "text" value="<?php echo $s_gender;?>" class="form-control input-md" readonly>
								</div>
							</div>

							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_address">Address</label>
								<div class="col-md-3">
									<input type = "text" value="<?php echo $s_address;?>" class="form-control input-md" readonly>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_cellno">Cell Number</label>  
							  <div class="col-md-1">
									<input type = "text" value="<?php echo $s_cellno;?>" class="form-control input-md" readonly>
								</div>
							</div>
							
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="email">Email Address</label>  
								<div class="col-md-2">
									<input type = "text" value="<?php echo $s_email;?>" class="form-control input-md" readonly>
								</div>
							</div>
							


							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<a href = "admin_mentor.php"><input type="button" value="Back" name="cancel" class="btn btn-default"/></a>
							  </div>
							</div>
					</fieldset>
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
		