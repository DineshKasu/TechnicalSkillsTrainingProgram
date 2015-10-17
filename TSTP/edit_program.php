			<?php 
						include ('menu_director.php');
			?>
	<link rel="shortcut icon" href="top-logo.png">
		<div class="container-fluid">

			
	<?php

                    $select  = "SELECT * FROM PROGRAM WHERE P_ID = '$_GET[id]'"; 					
					$qry=mysql_query($select); 
						if($qry)
						{
						while($rec = mysql_fetch_array($qry)){
						$prog_id = "$rec[p_id]";
						$prog_name = "$rec[p_name]";
						$prog_date = "$rec[p_date]";
						$prog_city = "$rec[p_city]";
						$prog_state = "$rec[p_state]";
						$prog_fees ="$rec[p_fees]";
						$prog_status ="$rec[p_status]";
						
						   $select11 = "SELECT * FROM MENTOR WHERE M_ID IN(SELECT M_ID FROM CONDUCTS  WHERE P_ID = '$prog_id')";
						   $query11 = mysql_query($select11);
						   $rec11 = mysql_fetch_array($query11);
						   $prog_mentor = "$rec11[m_name]";
						}
						}

	if (isset($_POST['submit']))
	{
		$a = addslashes("$_POST[prog_id]");
		$b = addslashes("$_POST[prog_name]");
		$c = addslashes("$_POST[prog_date]");
		$d = addslashes("$_POST[prog_city]");
		$e = addslashes("$_POST[prog_state]");
		$f = addslashes("$_POST[prog_fees]");
		$g = addslashes("$_POST[prog_status]");
		$h = addslashes("$_POST[m_name]");

        $update1 = "UPDATE `CONDUCTS`
		           SET M_ID = (SELECT M_ID FROM MENTOR WHERE M_NAME = '$h')
				   WHERE P_ID = '$a'"; 	
        mysql_query($update1);	
        	

		$update = "UPDATE `PROGRAM` 
		            SET `P_NAME` = '$b',
					    `P_DATE` = '$c',
						`P_CITY` = '$d',
						`P_STATE` = '$e',
						`P_FEES` = '$f',
						`P_STATUS` = '$g'
					WHERE P_ID = (SELECT P_ID FROM CONDUCTS WHERE P_ID = '$a')";
					
		$qry = mysql_query($update);
			if ($qry){
				echo'<div class="col-md-4 col-md-offset-4" style = "margin-top:50px">
						<div class="alert alert-success" role="alert">Done! Successfully Program is Updated! <br><br><a href="update_program.php">
						<div class ="col-md- col-md-offset-10"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Continue">Next</button></div></a></div>
					</div>';
			       echo 	$prog_name;	
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
							<h3>Program Information</h3>
						</div>
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_id">Program ID</label>  
							  <div class="col-md-2">
							  <input id="prog_id" name="prog_id" type="text" value = "<?php echo $prog_id;?>" placeholder="Program ID" class="form-control input-md" readonly>
								
							  </div>
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_fees">Program Fees$</label>  
							  <div class="col-md-2">
								<select id="prog_fees" name="prog_fees" class="form-control">
								  <option><?php echo $prog_fees;?> </option>
								  <option>1000</option>
								  <option>2000</option>
								  <option>3000</option>
								  <option>4000</option>
								  <option>5000</option>
								</select>
								</div>
							</div>
							</div>

							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="prog_name">Program Name</label>  
							  <div class="col-md-2">
							  <input id="prog_name" name="prog_name" type="text" value = "<?php echo $prog_name;?>" placeholder="Program Name" class="form-control input-md" required="">
							  </div>
							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_status">Program Status</label>  
							  <div class="col-md-2">
								<select id="prog_status" name="prog_status" class="form-control">
								  <option><?php echo $prog_status;?> </option>
								  <option>Active</option>
								  <option>Closed</option>
								  <option>Soon</option>
								</select>
								</div>
							</div>
							</div>
							<!-- Select Input -->
							

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_Date">Program Start Date</label>  
							  <div class="col-md-2">
							  <input id="prog_date" name="prog_date" type="text" value = "<?php echo $prog_date;?>" placeholder="Program Start Date" class="form-control input-md" required="">
								
							  </div>
							  
							  <label class="col-md-1 control-label" for="prog_city">City</label>  
							  <div class="col-md-2">
							  <input id="prog_city" name="prog_city" type="text" value = "<?php echo $prog_city;?>" placeholder="program city" class="form-control input-md" required="">
								
							  </div>
							  
							  <label class="col-md-1 control-label" for="gen">State</label>
							  <div class="col-md-2">
								<select id="prog_state" name="prog_state" class="form-control">
								  <option><?php echo $prog_state;?></option>
								  <option>AL</option>
								  <option>AK</option>
								    <option>AZ</option>
								  <option>AR</option>
								  <option>CA</option>
								  <option>CO</option>
								  <option>CT</option>
								  <option>DE</option>
								  <option>FL</option>
								  <option>GA</option>
								  <option>HI</option>
								  <option>ID</option>
								  <option>IL</option>
								  <option>IA</option>
								  <option>KS</option>
								  <option>KY</option>
								  <option>LA</option>
								  <option>ME</option>
								  <option>MD</option>
								  <option>MA</option>
								  <option>MI</option>
								  <option>MN</option>
								  <option>MS</option>
								  <option>MO</option>
								  <option>MT</option>
								  <option>NE</option>
								  <option>NV</option>
								  <option>NH</option>
								  <option>NJ</option>
								  <option>NM</option>
								  <option>NY</option>
								  <option>NC</option>
								  <option>ND</option>
								  <option>OH</option>
								  <option>OK</option>
								  <option>OR</option>
								  <option>PA</option>
								  <option>RI</option>
								  <option>SC</option>
								  <option>SD</option>
								  <option>TN</option>
								  <option>TX</option>
								  <option>UT</option>
								  <option>VT</option>
								  <option>VA</option>
								  <option>WA</option>
								  <option>WV</option>
								  <option>WI</option>
								  <option>WY</option>
								</select>
							  </div>
							</div>

	
				
				           <!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="m_name">Mentor Name</label>
							  <div class="col-md-2">
								   <?php
									   $select = "SELECT * FROM MENTOR WHERE m_name <> '$prog_mentor'";
									   $qry = mysql_query($select);
									   echo "<select id='m_name' name='m_name' class='form-control'>";
									   echo "<option>".$prog_mentor."</option>";
									   while($recs = mysql_fetch_array($qry)){
										  echo"<option value = '$recs[m_name]'>$recs[m_name]</option>";
									   }
										echo"</select>";
									?>
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
