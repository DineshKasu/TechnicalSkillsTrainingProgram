			<?php 
						include ('menu_student.php');
			?>
	<link rel="shortcut icon" href="top-logo.png">
		<div class="container-fluid">

			
	<?php

                    $select  = "SELECT * FROM question WHERE q_id = '$_GET[id]'"; 					
					$qry=mysql_query($select); 
						if($qry)
						{
						$rec = mysql_fetch_array($qry);
						$q_id = "$rec[q_id]";
						$s_id = "$rec[s_id]";
						$p_id = "$rec[p_id]";
						$m_id = "$rec[m_id]";
						$q_query = "$rec[q_query]";
						$q_ans = "$rec[q_ans]";

						
							$sql1 = "select * from program where p_id =  '$p_id'";
							 $qry1=mysql_query($sql1);
							 $rec1=mysql_fetch_array($qry1);
							 $p_name = "$rec1[p_name]";
						}

	if (isset($_POST['submit']))
	{

		$a = addslashes("$_POST[q_id]");
		$b = addslashes("$_POST[q_query]");
		$c = addslashes("$_POST[p_name]");
		$d = addslashes("$_POST[q_ans]");
		
		//qid,pid,sid,mid,quer,answ
					
	    $sql2 = "SELECT * FROM PROGRAM WHERE p_name = '$c'";
		$qry2 = mysql_query($sql2);
		$rec2 = mysql_fetch_array($qry2);
		$p_id1 = $rec2['p_id'];	

       		
		//dri nah mah edit xng data `location` = '$c',
		$update = "UPDATE `question` 
		            SET `p_id` = '$p_id1',
						`q_ans` = '$d',
						`q_query` = '$b'
					WHERE `q_id`='$_GET[id]'";
		$qry = mysql_query($update);
			if ($qry){
				echo'<div class="col-md-4 col-md-offset-4" style = "margin-top:50px">
						<div class="alert alert-success" role="alert">Done! Successfully Query Info is Updated! <br><br><a href="menu_student.php">
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
								<label class="col-md-2 control-label" for="s_id">Query ID</label>  
							  <div class="col-md-1">
							  <input id="q_id" name="q_id" type = "text" value = "<?php echo $q_id;?>" class="form-control input-md" readonly>
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="p_name">Related to</label>
							  <div class="col-md-1">
								   <?php
									   $select = "SELECT * FROM PROGRAM";
									   $qry = mysql_query($select);
									   
									   echo "<select id='p_name' name='p_name' class='form-control'>";
									   echo "<option>".$p_name."</option>";
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
							  <input id="q_query" name="q_query" type="text" value = "<?php echo $q_query;?>" placeholder="Query" class="form-control input-md" readonly>
							  </div>
							</div>
						
                           	<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="q_ans">Answer</label>  
							  <div class="col-md-4">
							  <input id="q_ans" name="q_ans" type="text" value = "<?php echo $q_ans;?>" placeholder="Answer" class="form-control input-md" readonly>
							  </div>
							</div>   
							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="addedby">Submitted By</label>  
							  <div class="col-md-3">
							  <input id="addedby" name="addedby" type="text" class="form-control input-md" value="<?php echo " ".$FirstName." ";?>" readonly>
							  </div>
							</div>
							
							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<a href = "menu_student.php"><input type="button" value="Back" name="cancel" class="btn btn-default"/></a>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>
</div>
