<?php 
	include ('menu_student.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
<?php	
	if (isset($_POST['submit']))
	{
		if (($_POST['q_id'] == '')or($_POST['q_query'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{ 
		$a = addslashes("$_POST[q_id]");
		$c = addslashes("$_POST[q_query]");
		$d = addslashes("$_POST[p_name]");
		
		//qid,pid,sid,mid,quer,answ
					
	    $sql2 = "SELECT * FROM PROGRAM WHERE p_name = '$d'";
		$qry2 = mysql_query($sql2);
		$rec2 = mysql_fetch_array($qry2);
		$p_id1 = $rec2['p_id'];		
		
		$sql = "INSERT INTO QUESTION VALUES ('$a','$p_id1','$id',NULL,'$c',NULL)";
		$qry = mysql_query($sql);
			if ($qry){
				echo '<div style="position:absolute; left:450px; top:200px; width: 450px">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
									<hr class="message-inner-separator">
									<p><strong>Success!</strong> Query is added!
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a href="admin_student.php"><button type="button" class="btn btn-success">Continue</button></a>
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
						<h1><font color ="red">Add Query</font></h1>
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
								<h3>Query Information</h3>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="q_id">Query ID</label>
							  <div class="col-md-2">
							  <input id="q_id" name="q_id" type="text" placeholder="Query ID" class="form-control input-md">
							  </div>
							</div>

						<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="p_name">Related to</label>
							  <div class="col-md-2">
								   <?php
									   $select = "SELECT * FROM PROGRAM";
									   $qry = mysql_query($select);
									   
									   echo "<select id='p_name' name='p_name' class='form-control'>";
									   echo "<option>  </option>";
									   while($recs = mysql_fetch_array($qry)){
										  echo"<option value = '$recs[p_name]'>$recs[p_name]</option>";

									   }
									   
										echo"</select>";
									?>
							  </div>
                             </div> 
							  
							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="q_query">Query</label>  
							  <div class="col-md-3">
							  <input id="q_query" name="q_query" type="text" placeholder="Query" class="form-control input-md" required="">
							  </div>
							</div>
						
                           	<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="q_ans">Answer</label>  
							  <div class="col-md-4">
							  <input id="q_ans" name="q_ans" type="text" placeholder="Answer" class="form-control input-md" required="" readonly>
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