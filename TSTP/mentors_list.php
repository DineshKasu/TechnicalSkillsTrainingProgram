<?php 
	include ('menu_director.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
				<div class = "row" style ="margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="programs_list.php">All Mentors</a></li>	
						</ul>
					</div>
				</div>
	<div class="col-md-12">
			<div class = "col-md-10">
					<?php
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
						  $welcome_view = "SELECT * FROM MENTOR";
						  $welcome_viewed = mysql_query($welcome_view);
					     $num_rows = mysql_num_rows($welcome_viewed);
                	if($num_rows == 1){
								echo "<h2> $num_rows Mentor </h2>";
								}
								else
								echo "<h2>  $num_rows Mentors </h2>";
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
						$sql = "SELECT * FROM MENTOR";		
						$qry=mysql_query($sql);
					?>

					<table class="table table-hover">
						<thead>
							<tr>
								<th>MENTOR ID</th>
								<th>MENTOR NAME</th>
								<th>Salary</th>
								<th>EMAIL</th>
								<th>CELLNO</th>
								<th>GENDER</th><!--
								<th>Status</th>
								<th>Start Date</th>
								<th>Program Fees </th>
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
										<?php echo $rec['m_id'] ?>
									</td>
									<td>
										<?php echo $rec['m_name'] ?>
									</td>
									<td>
										<?php echo $rec['m_salary'] ?>
									</td>
									<td>
										<?php echo $rec['m_email'] ?>
									</td>
									<td>
										<?php echo $rec['m_cellno'] ?>
									</td>
									<td>
										<?php
										  echo $rec['m_gender'];
										?>
									</td>
									<!--
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
									
									<td>
										<a href='emp_profile.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="top" title="Profile"><span class="glyphicon glyphicon-list-alt" style="font-size:20px"></span></a>
									</td>
									
									<td>
										<a href='edit_program.php?id=<?php echo $rec['event_name']?>'data-toggle="tooltip" data-placement="top" title="Edit Information"><span class="glyphicon glyphicon-edit" style="font-size:20px"></span></a>
									</td>
									<td>
										<a href='prog_stat.php?id=<?php echo $rec['event_name']?>' data-toggle="tooltip" data-placement="top" title="Delete Program"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
									</td>
									
									-->
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
						 echo"<ul class='pagination '> <li>&nbsp<a href = 'mentors_list.php?page=".$i."'>".$i."</a></li></ul>";
					}
						echo'&nbsp&nbsp';
?>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>