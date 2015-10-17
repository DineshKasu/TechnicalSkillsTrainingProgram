<?php 
	include ('menu_director.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
<?php
/*	
	if (isset($_POST['submit']))
	{
	
		if (($_POST['prog_id'] == '')OR(($_POST['prog_name'] != '')and($_POST['prog_state'] == '')))
		{
			echo "You must select an option";
			
			if (($_POST['prog_name'] != '')and($_POST['prog_state'] == ''))
			{
			    echo "<h1>You must choose state field also for program name</h1>";
			}
			
			echo " all is good";
		}	
		else
		{
		   echo "index.php";
		}
	}
*/?>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1><font color ="red">Get Results</font></h1>
					</div>
				</div>
			</div>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
					<form enctype="multipart/form-data" method="post" action = "result.php" class="form-horizontal">
						<fieldset>
							<!--<div class = "col-md-9 col-md-offset-2">
								<h3>Total Enrollment by</h3>
							</div>
							-->
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-5 control-label" for="prog_id">1)Total Profit by Center,Program,Student</label>
							 <div class="col-md-1">
						    <input  name="prog_id" type="radio" value="1" class="form-control input-md">
							</div>  
							
														<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="prog_name">Program Name</label>  
							  <div class="col-md-1">
							  <select id="prog_name" name="prog_name"class="form-control">
							      <option> </option>
							  	  <option>Java</option>
								  <option>Oracle</option>
								</select>
							  </div>
							  
							  	  <label class="col-md-1 control-label" for="gen">State</label>
							  <div class="col-md-1">
								<select id="prog_state" name="prog_state" class="form-control">
								  <option> </option>
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

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-5 control-label" for="prog_id">2) Total Profit by Center,Program</label>
							 <div class="col-md-1">
						    <input  name="prog_id" type="radio" value="2" class="form-control input-md">
							</div>  
							</div>
							
														<!-- Text input-->
							<div class="form-group">
								<label class="col-md-5 control-label" for="prog_id">3) Total Profit by Program</label>
							 <div class="col-md-1">
						    <input  name="prog_id" type="radio" value="3" class="form-control input-md">
							</div>  
							</div>
														<!-- Text input-->
							<div class="form-group">
								<label class="col-md-5 control-label" for="prog_id">4) Total Profit by Year</label>
							 <div class="col-md-1">
						    <input  name="prog_id" type="radio" value="4" class="form-control input-md">
							</div>  
							</div>

	
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-5 control-label" for="prog_id">5)   Total Profit by state, county, category, and gender  </label>
							 <div class="col-md-1">
						    <input  name="prog_id" type="radio" value="5" class="form-control input-md">
							</div>  
							</div>
							
																					<!-- Text input-->
							<div class="form-group">
								<label class="col-md-5 control-label" for="prog_id">6) Total Profit by State,Gender </label>
							 <div class="col-md-1">
						    <input  name="prog_id" type="radio" value="6" class="form-control input-md">
							</div>  
							</div>

							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<a href = "admin_director.php"><input type = "button" value = "Cancel" class="btn btn-default"></a>
								<button id="submit" name="submit" class="btn btn-primary">Get Results</button>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>

		</div>	