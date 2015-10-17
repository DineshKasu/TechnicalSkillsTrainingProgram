<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MENTOR</title>
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
		if (!isset($_SESSION['m_id']))
		{
		header('location:index.php');
		}
	?>
	<?php
		$id=$_SESSION['m_id'];
		$result=mysql_query("select * from mentor where m_id ='$id'")or die(mysql_error);
		$row=mysql_fetch_array($result);
		$FirstName=$row['m_name'];
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
					  <strong><a class="navbar-brand" href="#">MENTOR</a></strong>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="admin_mentor.php?id=<?php echo $row['m_id'];?>">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Training Info <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="mentor_programs.php?id=<?php echo $row['m_id'];?>">Your Programs</a></li>
									<li><a href="mentor_students.php?id=<?php echo $row['m_id'];?>"> Your Students</a></li>
								</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Students <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="students_list.php?id=<?php echo $row['m_id'];?>">All Students</a></li>
									<li><a href="add_student.php?id=<?php echo $row['m_id'];?>"> Add New Student</a></li>
								</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Queries <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="all_queries1.php?id=<?php echo $row['m_id'];?>">All Queries</a></li>
									<li><a href="open_queries1.php?id=<?php echo $row['m_id'];?>"> Open Queries</a></li> 
								</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<p class="navbar-text">Welcome! <strong><?php echo " ".$FirstName."&nbsp"; ?></strong></p>

							<li><p class="navbar-text"><a href="mentor_logout.php" class="navbar-link" title="Log Out">Logout</a></p></li>
					</ul>
					
					</div>
				  </div>
				</nav>
	</div>
    <script src="bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
  </body>
</html>