<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DIRECTOR PANEL</title>
	<link rel="icon" type="image/png" href="top-logo.png">
	<link href="bootstrap.min.css" rel="stylesheet">
		<style>
		body {
		margin-top: 50px;
		margin-bottom: 50px;
		
		background: url('russ-logo.jpg') no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		.navbar-default{
		opacity: .9;
		}
		.dropdown:hover .dropdown-menu {
		display: block;
		}
		.panel-default{
		opacity: .9;
		}
		hr.message-inner-separator
{
    clear: both;
    margin-top: 10px;
    margin-bottom: 13px;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}

		</style>
  </head>
<body>
<div class="container-fluid">
	<!--welcome user in menu-->
	<?php
		mysql_select_db('tstp',mysql_connect('localhost','root',''));	
		session_start();
		if (!isset($_SESSION['d_id']))
		{
		header('location:index.php');
		}
	?>
	<?php
		$id=$_SESSION['d_id'];
		$result=mysql_query("select * from director where d_id ='$id'")or die(mysql_error);
		$row=mysql_fetch_array($result);
		$FirstName=$row['d_name'];
	?>

				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <strong><a class="navbar-brand" href="#">DIRECTOR</a></strong>
					</div>
					
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="admin_director.php?id=<?php echo $row['d_id'];?>">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Programs <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="programs_list.php?id=<?php echo $row['d_id'];?>">View Programs</a></li>
									<li><a href="add_program.php?id=<?php echo $row['d_id'];?>">Add New Program</a></li>
									<li><a href="update_program.php?id=<?php echo $row['d_id'];?>">Update Programs</a></li>
								</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mentors <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="mentors_list.php?id=<?php echo $row['d_id'];?>">View Mentors</a></li>
									<li><a href="add_mentor.php?id=<?php echo $row['d_id'];?>">Add New Mentor</a></li>
									<li><a href="update_mentor.php?id=<?php echo $row['d_id'];?>">Update Mentors</a></li>
								</ul>
						</li>
                        <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Search <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Search_results.php?id=<?php echo $row['d_id'];?>">Get Results</a></li>
								</ul>
						</li> 
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<p class="navbar-text">Welcome! <strong><?php echo " ".$FirstName."&nbsp"; ?></strong></p>

							<li><p class="navbar-text"><a href="logout.php" class="navbar-link" title="Log Out">Logout</a></p></li>
					</ul>
					
					</div>
				  </div>
				</nav>
	</div>
    <script src="bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
  </body>
</html>