<?php 
		include ('menu_mentor.php');
?>
			
<?php 


       $del1 = "DELETE  FROM `ATTENDS` WHERE `S_ID` = '$_GET[id]'";
	   mysql_query($del1);
	   
	   $del2 = "DELETE  FROM `QUESTION` WHERE `S_ID` = '$_GET[id]'";
	   mysql_query($del2);
	   
       $update = "DELETE FROM `STUDENT` WHERE `S_ID` = '$_GET[id]'";			
	   $qry = mysql_query($update);
			if ($qry){
				echo'<div class="col-md-4 col-md-offset-4" style = "margin-top:50px">
						<div class="alert alert-success" role="alert">Done! Successfully Student is deleted! <br><br><a href="menu_mentor.php">
						<div class ="col-md- col-md-offset-10"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Continue">Next</button></div></a></div>
					</div>';
         }	
         else{
				echo "not posted!";
				}		 
?>
	