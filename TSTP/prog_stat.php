<?php 
		include ('menu_director.php');
?>
			
<?php 

		$update = "UPDATE `event` 
		            SET `location` = 'hai'
					WHERE `event`.`event_name`='$_GET[id]'";
					
					
							$qry = mysql_query($update);
			if ($qry){
				echo'<div class="col-md-4 col-md-offset-4" style = "margin-top:50px">
						<div class="alert alert-success" role="alert">Done! Successfully Program is deleted! <br><br><a href="programs_list.php">
						<div class ="col-md- col-md-offset-10"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Continue">Next</button></div></a></div>
					</div>';
			       echo 	$prog_name;	
         }	
         else{
				echo "not posted!";
				}		 
?>
					
					