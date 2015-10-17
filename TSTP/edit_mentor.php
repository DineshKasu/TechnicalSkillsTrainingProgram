			<?php 
						include ('menu_director.php');
			?>
	<link rel="shortcut icon" href="top-logo.png">
		<div class="container-fluid">

			
	<?php

                    $select  = "SELECT * FROM MENTOR WHERE M_ID = '$_GET[id]'"; 					
					$qry=mysql_query($select); 
						if($qry)
						{
						while($rec = mysql_fetch_array($qry)){
						$m_id = "$rec[m_id]";
						$m_name = "$rec[m_name]";
						$m_email = "$rec[m_email]";
						$m_cellno = "$rec[m_cellno]";
						$m_gender = "$rec[m_gender]";
						$m_salary = "$rec[m_salary]";
						}
						}

	if (isset($_POST['submit']))
	{
		$a = addslashes("$_POST[m_id]");
		$b = addslashes("$_POST[m_name]");
		$c = addslashes("$_POST[m_email]");
		$d = addslashes("$_POST[m_cellno]");
		$e = addslashes("$_POST[m_gender]");
		$f = addslashes("$_POST[m_salary]");


						
		$update = "UPDATE `MENTOR` 
		            SET `M_NAME` = '$b',
					    `M_EMAIL` = '$c',
						`M_CELLNO` = '$d',
						`M_GENDER` = '$e',
						`M_SALARY` = '$f'
					WHERE M_ID = '$a' ";
					
		$qry = mysql_query($update);
			if ($qry){

                       $Squery = "select max(m_ind) as val from MENTOR_HISTORY where m_id ='$a'";
					   $exect = mysql_query($Squery);
					   $Srows = mysql_fetch_array($exect);
					   $m_ind = "$Srows[val]";
			           $update1 = "UPDATE `MENTOR_HISTORY` 
					                   SET `M_VET` = now() 
									WHERE `M_IND` =$m_ind";
					    mysql_query($update1); 					   
			    	   $Mquery = "INSERT INTO MENTOR_HISTORY(m_id,m_name,m_email,m_cellno,m_gender,m_salary,m_vst,m_vet) VALUES ('$a','$b','$c','$d','$e','$f',now(),'9999-12-31')";
					   mysql_query($Mquery); 
				echo'<div class="col-md-4 col-md-offset-4" style = "margin-top:50px">
						<div class="alert alert-success" role="alert">Done! Successfully Mentor Information is Updated! <br><br><a href="update_mentor.php">
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
							<h1><font color ="red">Edit Program</font></h1>
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
							<h3>Mentor Information</h3>
						</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="m_id">Mentor ID</label>
							  <div class="col-md-2">
							  <input id="m_id" name="m_id" type="text" value = "<?php echo $m_id;?>" placeholder="Mentor ID" class="form-control input-md">
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="pm_name">Mentor Name</label>  
							  <div class="col-md-2">
							  <input id="m_name" name="m_name" type="text" value = "<?php echo $m_name;?>" placeholder="Mentor Name" class="form-control input-md" required="">
							  </div>
							</div>
						
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="m_email">Email</label>  
							  <div class="col-md-2">
							  <input id="m_email" name="m_email" type="text" value = "<?php echo $m_email;?>" placeholder="Email" class="form-control input-md" required="">	
							  </div>
							
							  <label class="col-md-1 control-label" for="m_gender">Gender</label>
							  <div class="col-md-2">
								<select id="m_gender" name="m_gender" class="form-control">
								  <option><?php echo $m_gender;?> </option>
								  <option>Male</option>
								  <option>Female</option>
								</select>
							  </div>
							</div>


																					<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="m_cellno">Cell No</label>  
							  <div class="col-md-2">
							  <input id="m_cellno" name="m_cellno" type="text" value = "<?php echo $m_cellno;?>" placeholder="Cell No" class="form-control input-md" required="">
							  </div>

							  <label class="col-md-2 control-label" for="m_salary">Salary</label>  
							  <div class="col-md-2">
							  <input id="m_salary" name="m_salary" type="text" value = "<?php echo $m_salary;?>" placeholder="00000000.00" class="form-control input-md" required="">
							  </div>
							</div>
							

							
							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
								<a href = "update_program.php"><input type="button" value="Back" name="cancel" class="btn btn-default"/></a>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>
</div>
