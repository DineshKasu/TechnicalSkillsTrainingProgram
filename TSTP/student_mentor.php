<?php 
	include ('menu_student.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
				<div class = "row" style ="margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="menu_student.php">All Mentors</a></li>
						</ul>
					</div>
				</div>
	<div class="col-md-12">
			<div class = "col-md-10">
					<?php
					$id=$_SESSION['s_id'];
						error_reporting(E_ALL & ~E_NOTICE);
						if (isset($_GET["page"])) 
											{ 
												$page = $_GET["page"]; 
											} else { 
												$page=1; 
											};
											$endlimit = 10; 
											$start_from = ($page-1) * $endlimit;
						  
						  $welcome_view = "SELECT * FROM mentor,attends,conducts where mentor.m_id=conducts.m_id and conducts.p_id = attends.p_id and attends.s_id ='$id'";

						$welcome_viewed = mysql_query($welcome_view);

						$num_rows = mysql_num_rows($welcome_viewed);
						
								if($num_rows == 1){
								echo "<h2> $num_rows Mentor </h2>";
								}
								else
								echo "<h2> $num_rows Mentors </h2>";
					?>
			</div>
	</div>
<div class="container-fluid" style="margin-top:80px;">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php				
						$sql = "SELECT * FROM mentor,attends,conducts where mentor.m_id=conducts.m_id and conducts.p_id = attends.p_id and attends.s_id ='$id'";		
						$qry=mysql_query($sql);
					?>

					<table class="table table-hover">
						<thead>
							<tr>
							    <th>MENTOR ID</th>
								<th>MENTOR NAME</th>
								<th>EMAIL</th>
								<th>CELLNO</th>
								<th>GENDER</th>
							</tr>
						</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{
						?>
						<tbody>
							<tr>
									<td>
										<?php echo $rec['m_id'] ?>
									</td>
									<td>
										<?php echo $rec['m_name'] ?>
									</td>
									<td>
										<?php echo $rec['m_email'] ?>
									</td>
									<td>
										<?php  echo $rec['m_cellno'] ?>
									</td>
									<td>
										<?php
										echo $rec['m_gender']
										?>
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
						 echo"<ul class='pagination '> <li>&nbsp<a href = 'student_mentor.php?page=".$i."'>".$i."</a></li></ul>";
					}
						echo'&nbsp&nbsp';
?>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>