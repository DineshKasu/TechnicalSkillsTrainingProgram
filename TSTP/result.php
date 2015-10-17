<?php 
	include ('menu_director.php');
?>

<link rel="shortcut icon" href="top-logo.png">
<div class="container-fluid">
				<div class = "row" style ="margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="programs_list.php">Results</a></li>	
						</ul>
					</div>
				</div>
	<div class="col-md-12">
			<div class = "col-md-10">
					<?php
if (isset($_POST['submit']))
	{
	
		if (($_POST['prog_id'] == ''))
		{
			echo "You must select an option";
			
		}	
		else
		{
		
		   $a = addslashes("$_POST[prog_id]");
		   $b = addslashes("$_POST[prog_name]");
		   $c = addslashes("$_POST[prog_state]");
		   
		   if($c != ''){ $a = 7;}
		   if($b != ''){$a = 8;}
		   if(($b != '') and ($c != '')){$a = 9;}
            		   
          		   

          echo $a;		   
		  // header('location: index.php');
	
		}
	}
					?>
			</div>
					
		<div class="col-md-2">
			<p class="text-right"><a href = "Search_results.php"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Search Panel">Back to Search Panel</button></a></p>
		</div>
	
	</div>
<div class="container-fluid" style="margin-top:80px;">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php		
                          
                        if($a == 1)
                        {						
						    $sql = "select centerID, progID, studID, sum(Total_Profit) as Total_Profit from cube group by centerID, progID, studID";	
                             echo "<h3> Drill-Down Approach(CUBE as materialized view) Total Profit by center, program, and student</h3>";							
						}
						if($a == 8)
                        {						
						    $sql = "select F.centerID, I.progID, studID, sum(Total_Profit) as Total_Profit from cube F, Program_Dim I where F.progID = I.progID and progname = '$b' group by F.centerID, I.progID, studID";	
						    echo "<h3> Slicing Approach(CUBE as materialized view) Total Profit by center, program, and student for ".$b." program only</h3>";
						}
						if($a == 7)
                        {						
						    $sql = "select F.centerID, progID, studID, sum(Total_Profit) as Total_Profit from cube F, Center_Dim S where F.centerID = S.centerID and state = '$c' group by F.centerID, progID, studID";		
							echo "<h3>Slicing Approach(CUBE as materialized view) Total Profit by center, program, and student for".$c." state only</h3>";
						}
						if($a == 9)
                        {						
						    $sql = "select F.centerID, I.progID, studID, sum(Total_Profit) as Total_Profit from cube F, Center_Dim S, Program_Dim I where F.centerID = S.centerID and F.progID = I.progID and state = '$c' and progname = '$b' group by F.centerID, I.progID, studID";		
						    echo "<h3>Dicing Approach(CUBE as materialized view) Total Profit by center, program, and student for".$c." state and ".$b." program only</h3>";
						}

						if($a == 2)
                        {						
						    $sql = "select centerID, progID, sum(profit) as Total_Profit from Enroll_Fact group by centerID, progID with rollup";	
							echo "<h3>Total Profit by center and program </h3>";
							
						}
						if($a == 3)
                        {						
						    $sql = "select progID, sum(Total_Profit) as Total_Profit from cube group by progID";	
							 echo "<h3>Roll-up Approach(CUBE as materialized view) Total Profit by program </h3>";
						}
						if($a == 4)
                        {						
						    $sql = "select D.YEAR as Year, sum(profit) as Total_Profit from Enroll_Fact F,Days D where F.dateID = D.dateID group by D.YEAR with rollup";		
						    echo "<h3>Roll-up Approach(CUBE as materialized view) Total Profit Year wise </h3>";
						}
						if($a == 5)
                        {						
						    $sql = "select state, county, category, gender, sum(profit) as Total_Profit from Enroll_Fact F, Center_Dim S, Program_Dim I, Student_Dim C where F.CenterID = S.CenterID and F.ProgID = I.ProgID and F.studID = C.studID group by state, county, category, gender with rollup";		
						    echo "<h3>Drill-Down Approach Total Profit by State,county,category and Gender</h3>";
						}
						if($a == 6)
                        {						
						    $sql = "select state, gender, sum(profit) as Total_Profit from Enroll_Fact F ,Center_Dim S, Student_Dim C where F.CenterID = S.CenterID and F.studID = C.studID group by state, gender";		
						    echo "<h3>Roll-up Approach Total Profit by State and Gender</h3>";
						}
						$qry=mysql_query($sql);
					?>

					<table class="table table-hover">
						<thead>
							<tr>
							<?php if(($a == 1) or($a == 7)or($a == 8)or($a == 9)or($a ==2 )){echo '<th>Center ID</th>';} ?>
							<?php if(($a == 1) or($a == 7)or($a == 8)or($a == 9)or($a ==2 )or($a ==3)){	echo'<th>Program ID</th>';}?>
							<?php if(($a == 1) or($a == 7)or($a == 8)or($a == 9)){echo '<th>Student ID</th>';} ?>
							<?php if(($a == 4)){echo '<th>Year</th>';} ?>
							<?php if(($a == 5)or($a == 6)){echo '<th>State</th>';} ?>
							<?php if(($a == 5)){echo '<th>County</th>';} ?>
							<?php if(($a == 5)){echo '<th>Category</th>';} ?>
							<?php if(($a == 5)or($a == 6)){echo '<th>Gender</th>';} ?>
								<th>Total Profit</th>
							</tr>
						</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{
						?>
						<tbody>
							<tr>
										<?php if(($a == 1) or($a == 7)or($a == 8)or($a == 9)or($a ==2 )){echo '<td>';echo $rec['centerID'];echo '</td>';} ?>
										<?php if(($a == 1) or($a == 7)or($a == 8)or($a == 9)or($a ==2 )or($a ==3)){echo '<td>';echo $rec['progID'];echo '</td>';} ?>
										<?php if(($a == 1) or($a == 7)or($a == 8)or($a == 9)){echo '<td>'; echo $rec['studID']; echo '</td>'; }?>
										<?php if(($a == 4)){echo '<td>'; echo $rec['Year']; echo '</td>'; }?>
										<?php if(($a == 5)or($a == 6)){echo '<td>'; echo $rec['state']; echo '</td>'; }?>
										<?php if(($a == 5)){echo '<td>'; echo $rec['county']; echo '</td>'; }?>
										<?php if(($a == 5)){echo '<td>'; echo $rec['category']; echo '</td>'; }?>
										<?php if(($a == 5)or($a == 6)){echo '<td>'; echo $rec['gender']; echo '</td>'; }?>
									<td>
										<?php echo $rec['Total_Profit'] ?>
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
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>