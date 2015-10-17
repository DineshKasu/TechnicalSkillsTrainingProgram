			<?php 
						include ('menu_mentor.php');
			?>
	<link rel="shortcut icon" href="top-logo.png">
		<div class="container-fluid">

			
	<?php

                    $select  = "SELECT * FROM student WHERE s_id = '$_GET[id]'"; 					
					$qry=mysql_query($select); 
						if($qry)
						{
						$rec = mysql_fetch_array($qry);
						$s_id = "$rec[s_id]";
						$s_name = "$rec[s_name]";
						$s_age = "$rec[s_age]";
						$s_email = "$rec[s_email]";
						$s_address = "$rec[s_address]";
						$s_gender = "$rec[s_gender]";
						$s_cellno = "$rec[s_cellno]";
						
							$sql1 = "select * from program,attends where program.p_id = attends.p_id and attends.s_id = '$s_id'";
							 $qry1=mysql_query($sql1);
							 $rec1=mysql_fetch_array($qry1);
							 $p_name = "$rec1[p_name]";
						}

	if (isset($_POST['submit']))
	{
		$a = addslashes("$_POST[s_name]");
		$b = addslashes("$_POST[s_age]");
		$c = addslashes("$_POST[s_gender]");
		$d = addslashes("$_POST[s_address]");
		$e = addslashes("$_POST[s_cellno]");
		$f = addslashes("$_POST[s_email]");
		
		//dri nah mah edit xng data `location` = '$c',
		$update = "UPDATE `student` 
		            SET `s_name` = '$a',
					    `s_age` = '$b',
						`s_gender` = '$c',
						`s_address` = '$d',
						`s_cellno` = '$e',
						`s_email` = '$f'
					WHERE `s_id`='$_GET[id]'";
		$qry = mysql_query($update);
			if ($qry){
				echo'<div class="col-md-4 col-md-offset-4" style = "margin-top:50px">
						<div class="alert alert-success" role="alert">Done! Successfully Student Info is Updated! <br><br><a href="menu_mentor.php">
						<div class ="col-md- col-md-offset-10"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Continue">Next</button></div></a></div>
					</div>';
					exit();
			}
			else{
				echo "not posted!";
				}
	}
?>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
							<h1>Edit Program</h1>
					</div>
				</div>
			</div>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
		<form method="post" class="form-horizontal">
						<fieldset>
						<div class = "col-md-10 col-md-offset-2">
							<h3>Student Information</h3>
						</div>
									<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="s_id">Student ID</label>  
							  <div class="col-md-1">
							  <input id="s_id" name="s_id" type = "text" value = "<?php echo $s_id;?>" class="form-control input-md" readonly>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_name">Full Name</label>  
							  <div class="col-md-2">
							  <input id="s_name" name="s_name" type = "text" value="<?php echo $s_name?>" class="form-control input-md" required="">
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-2 control-label" for="p_name">Program</label>  
								<div class="col-md-1">
									<input id="p_name" name="p_name" type = "text" value="<?php echo $p_name?>" class="form-control input-md" readonly>
								</div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_age">Age</label>  
								<div class="col-md-1">
									<input id="s_age" name="s_age" type = "text" value="<?php echo $s_age;?>" class="form-control input-md" required="">
								</div>
							  
							  <label class="col-md-1 control-label" for="s_gender">Gender</label>
							  <div class="col-md-1">
									<input id="s_gender" name="s_gender" type = "text" value="<?php echo $s_gender;?>" class="form-control input-md" required="">
								</div>
							</div>

							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_address">Address</label>
								<div class="col-md-3">
									<input id="s_address" name="s_address" type = "text" value="<?php echo $s_address;?>" class="form-control input-md" required="">
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_cellno">Cell Number</label>  
							  <div class="col-md-1">
									<input id="s_cellno" name="s_cellno" type = "text" value="<?php echo $s_cellno;?>" class="form-control input-md" required="">
								</div>
							</div>
							
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="s_email">Email Address</label>  
								<div class="col-md-2">
									<input id="s_email" name="s_email" type = "text" value="<?php echo $s_email;?>" class="form-control input-md" required="">
								</div>
							</div>
							
							
							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
								<a href = "menu_mentor.php"><input type="button" value="Back" name="cancel" class="btn btn-default"/></a>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>
</div>
	<?php// include('footer.php'); ?>