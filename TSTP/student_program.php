<?php 
	include ('menu_student.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
				<div class = "row" style ="margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="menu_student.php">All Programs</a></li>	
						</ul>
					</div>
				</div>
	<div class="col-md-12">
			<div class = "col-md-10">
					<?php
					  $id=$_SESSION['s_id'];
						error_reporting(E_ALL & ~E_NOTICE);
						//paging codes
						if (isset($_GET["page"])) 
											{ 
												$page = $_GET["page"]; 
											} else { 
												$page=1; 
											};
											$endlimit = 10; 
											$start_from = ($page-1) * $endlimit;
						  $welcome_view = "SELECT * FROM PROGRAM WHERE P_ID IN(SELECT P_ID FROM ATTENDS WHERE S_ID = '$id')";
						  $welcome_viewed = mysql_query($welcome_view);
					     $num_rows = mysql_num_rows($welcome_viewed);
                	if($num_rows == 1){
								echo "<h2> $num_rows Program </h2>";
								}
								else
								echo "<h2>  $num_rows Programs </h2>";
					?>
			</div>
		<!--
		<div class="col-md-2">
			<p class="text-right"><a href = "add_program.php"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add Program">Add New Program</button></a></p>
		</div>
		-->
	</div>
<div class="container-fluid" style="margin-top:80px;">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php				
						$sql = "SELECT * FROM PROGRAM WHERE P_ID IN(SELECT P_ID FROM ATTENDS WHERE S_ID = '$id')";		
						$qry=mysql_query($sql);
					?>

					<table class="table table-hover">
						<thead>
							<tr>
								<th>PROGRAM ID</th>
								<th>PROGRAM NAME</th>
								<th>CITY</th>
								<th>STATE</th>
								<th>MENTOR NAME</th>
								<th>STATUS</th>
								<th>START DATE</th>
								<th>PROGRAM FEES</th><!--
								<th colspan=3 style="text-align:center">Actions</th> -->
							</tr>
						</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{
						?>
						<tbody>
							<tr>
									<td>
										<?php echo $rec['p_id'] ?>
									</td>
									<td>
										<?php echo $rec['p_name'] ?>
									</td>
									<td>
										<?php echo $rec['p_city'] ?>
									</td>
									<td>
										<?php echo $rec['p_state'] ?>
									</td>
									<td>
										<?php
										  $sql1 = "select m_name from mentor,conducts where mentor.m_id = conducts.m_id and conducts.p_id = '$rec[p_id]'";
										  $qry1=mysql_query($sql1);
										  $rec1=mysql_fetch_array($qry1);
										  echo $rec1['m_name'];
										?>
									</td>
									<td>
										<?php 
										echo $rec['p_status'];
										?>
									</td>
									<td>
										<?php echo $rec['p_date']?>
									</td>
									<td>
										<?php echo $rec['p_fees']?>
									</td>

					<?php
						}
					?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
		$num_rows = mysql_num_rows($welcome_viewed);
		$total_pages = ceil($num_rows / $endlimit);
		$i=0;
		echo ' '.$_REQUEST["page"].' ';
				for($i=1; $i<=$total_pages; $i++ )
					{
						 echo"<ul class='pagination '> <li>&nbsp<a href = 'student_program.php?page=".$i."'>".$i."</a></li></ul>";
					}
						echo'&nbsp&nbsp';
?>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>