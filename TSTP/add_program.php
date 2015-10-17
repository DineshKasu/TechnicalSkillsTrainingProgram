<?php 
	include ('menu_director.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
<?php	
	if (isset($_POST['submit']))
	{
		if (($_POST['prog_id'] == '')or($_POST['prog_name'] == '')or($_POST['prog_month'] == '')or($_POST['prog_day'] == '')
		or($_POST['prog_year'] == '')or($_POST['prog_city'] == '')or($_POST['prog_state'] == '')or($_POST['m_name'] == '')or($_POST['addedby'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{ 
		$a = addslashes("$_POST[prog_id]");
		$b = addslashes("$_POST[prog_name]");
		$c = addslashes("$_POST[prog_city]");
		$d = addslashes("$_POST[prog_state]");
		$e = addslashes("".$_POST['prog_year']."-".$_POST['prog_month']."-".$_POST['prog_day']."");
		$f = addslashes("$_POST[prog_status]");
		$g = addslashes("$_POST[prog_fees]");
		$h = addslashes("$_POST[m_name]");
		
					
		$sql = "INSERT INTO PROGRAM VALUES ('$a','$b','$c','$d','$e','$f','$g')";
		$qry = mysql_query($sql);
			if ($qry){
			
			     $sql2 = "SELECT * FROM MENTOR WHERE m_name = '$h'";
				 $qry2 = mysql_query($sql2);
				 $rec2 = mysql_fetch_array($qry2);
				 $m_id1 = $rec2['m_id'];
				 
				  $sql3 = "INSERT INTO CONDUCTS VALUES ('$m_id1','$a')";
				  $qry3 =mysql_query($sql3);
				  
				echo '<div style="position:absolute; left:450px; top:200px; width: 450px">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
									<hr class="message-inner-separator">
									<p><strong>Success!</strong> Program Information added!
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
						<h1><font color ="red">Add Program</font></h1>
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
								<h3>Program Information</h3>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="prog_id">Program ID</label>
							  <div class="col-md-2">
							  <input id="prog_id" name="prog_id" type="text" placeholder="Program ID" class="form-control input-md">
							  </div>

							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_fees">Program Fees$</label>  
							  <div class="col-md-2">
								<select id="prog_fees" name="prog_fees" class="form-control">
								  <option> </option>
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
							  <input id="prog_name" name="prog_name" type="text" placeholder="Program Name" class="form-control input-md" required="">
							  </div>
							

														<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_status">Program Status</label>  
							  <div class="col-md-2">
								<select id="prog_status" name="prog_status" class="form-control">
								  <option> </option>
								  <option>Active</option>
								  <option>Closed</option>
								  <option>Soon</option>
								</select>
								</div>
							</div>
							</div>
							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_month">Program Start Date</label>
							  <div class="col-md-2">
								<select id="prog_month" name="prog_month" class="form-control">
								  <option>Month</option>
								  <option>January</option>
								  <option>February</option>
								  <option>March</option>
								  <option>April</option>
								  <option>May</option>
								  <option>June</option>
								  <option>July</option>
								  <option>August</option>
								  <option>September</option>
								  <option>October</option>
								  <option>November</option>
								  <option>December</option>
								</select>
							  </div>
							
							  <div class="col-md-1">
								<select id="prog_day" name="prog_day" class="form-control">
								  <option>Day</option>
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								  <option>6</option>
								  <option>7</option>
								  <option>8</option>
								  <option>9</option>
								  <option>10</option>
								  <option>11</option>
								  <option>12</option>
								  <option>13</option>
								  <option>14</option>
								  <option>15</option>
								  <option>16</option>
								  <option>17</option>
								  <option>18</option>
								  <option>19</option>
								  <option>20</option>
								  <option>21</option>
								  <option>22</option>
								  <option>23</option>
								  <option>24</option>
								  <option>25</option>
								  <option>26</option>
								  <option>27</option>
								  <option>28</option>
								  <option>29</option>
								  <option>30</option>
								  <option>31</option>
								</select>
							  </div>
							
							  <div class="col-md-2">
								<select id="prog_year" name="prog_year" class="form-control">
								 <option>Year</option>
								  <option>2015</option>
								  <option>2016</option>
								</select>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_city">City</label>  
							  <div class="col-md-2">
							  <input id="prog_city" name="prog_city" type="text" placeholder="City" class="form-control input-md" required="">
								
							  </div>
							  
							  <label class="col-md-1 control-label" for="gen">State</label>
							  <div class="col-md-2">
								<select id="prog_state" name="prog_state" class="form-control">
								  <option>State</option>
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
									   $select = "SELECT * FROM MENTOR";
									   $qry = mysql_query($select);
									   
									   echo "<select id='m_name' name='m_name' class='form-control'>";
									   echo "<option>Mentor Name </option>";
									   while($recs = mysql_fetch_array($qry)){
										  echo"<option value = '$recs[m_name]'>$recs[m_name]</option>";

							 
									   }
									   
										echo"</select>";
									?>
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