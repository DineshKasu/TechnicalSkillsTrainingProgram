<?php 
	include ('menu_mentor.php');
?>
<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
				<div class = "row" style ="margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="students_list.php">All Queries</a></li>
						</ul>
					</div>
				</div>
	<div class="col-md-12">
			<div class = "col-md-10">
					<?php
						error_reporting(E_ALL & ~E_NOTICE);
						if (isset($_GET["page"])) 
											{ 
												$page = $_GET["page"]; 
											} else { 
												$page=1; 
											};
											$endlimit = 10; 
											$start_from = ($page-1) * $endlimit;
						  $welcome_view = "SELECT * FROM question";

						$welcome_viewed = mysql_query($welcome_view);

						$num_rows = mysql_num_rows($welcome_viewed);
						
								if($num_rows == 1){
								echo "<h2> $num_rows Query </h2>";
								}
								else
								echo "<h2> $num_rows Queries </h2>";
					?>
			</div>
			<!--
		<div class="col-md-2">
			<p class="text-right"><a href = "add_student.php"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add Student">Add New Student</button></a></p>
		</div>
		-->
	</div>
<div class="container-fluid" style="margin-top:80px;">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php				
						$sql = "SELECT * FROM QUESTION ";		
						$qry=mysql_query($sql);
					?>

					<table class="table table-hover">
						<thead>
							<tr>
							    <th>QUERY ID</th>
								<th>QUERY</th>
								<th>ANSWER</th>
								<th>ASKED BY</th>
								<th>ANSWERED BY</th>
								<th colspan=3 style="text-align:center">Action</th> 
							</tr>
						</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{
						?>
						<tbody>
							<tr>
									<td>
										<?php echo $rec['q_id'] ?>
									</td>
									<td>
										<?php echo $rec['q_query'] ?>
									</td>
									<td>
										<?php echo $rec['q_ans'] ?>
									</td>
									<td>
										<?php 
										$s_id = $rec['s_id'];
										$sql1 = "select * from student where s_id = '$s_id'";
							           $qry1=mysql_query($sql1);
							           $rec1=mysql_fetch_array($qry1);
										
										echo $rec1['s_name'] ?>
									</td>
									<td>
										<?php 
										$m_id = $rec['m_id'];
										$sql1 = "select * from mentor where m_id = '$m_id'";
							           $qry1=mysql_query($sql1);
							           $rec1=mysql_fetch_array($qry1);
										
										echo $rec1['m_name'] ?>
									</td>
									<td>
										<a href='query_view1.php?id=<?php echo $rec['q_id']?>' data-toggle="tooltip" data-placement="top" title="View"><span class="glyphicon glyphicon-list-alt" style="font-size:20px; color:red"></span></a>
									</td>
																		
									<td>
										<a href='edit_query1.php?id=<?php echo $rec['q_id']?>'data-toggle="tooltip" data-placement="top" title="Edit Information"><span class="glyphicon glyphicon-edit" style="font-size:20px; color:green"></span></a>
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
		//paging codes "$welcome_viewed halin ni sa ging query sang $welcome_view"
		$num_rows = mysql_num_rows($welcome_viewed);
		$total_pages = ceil($num_rows / $endlimit);
		$i=0;
		echo ' '.$_REQUEST["page"].' ';
				for($i=1; $i<=$total_pages; $i++ )
					{
						 echo"<ul class='pagination '> <li>&nbsp<a href = 'students_list.php?page=".$i."'>".$i."</a></li></ul>";
					}
						echo'&nbsp&nbsp';
?>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>