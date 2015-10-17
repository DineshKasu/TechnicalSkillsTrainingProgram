<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mentor</title>
	<link rel="shortcut icon" href="top-logo.png">
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
	.panel-default {
	opacity: .9;
	margin-top:30px;
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
	.dropdown:hover .dropdown-menu {
	display: block;
	}
		</style>
  </head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation" style="width:10px; height:10px;">
			<div class="container-fluid">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="glyphicon glyphicon-list" ></span>
							</button> 
								<ul class="dropdown-menu" role="menu">
									<li><a href="index.php">Director</a></li>
									<li class="divider"></li>
									<li><a href="login_mentor.php">Mentor</a></li>
									<li class="divider"></li>
							      <li><a href="login_student.php">Student</a></li> 
								</ul>
						</li>
					</ul>
			</div>	
		</nav>
		<?php
			mysql_select_db('tstp',mysql_connect('localhost','root',''));	
			
			if (isset($_POST['submit'])) 
			{
			     $UserName=$_POST['username'];
			     $Password=$_POST['password'];
			     $result=mysql_query("select * from mentor where m_email='$UserName' and m_cellno='$Password' ")or die (mysql_error());
			     $count=mysql_num_rows($result);
			     $row=mysql_fetch_array($result);
		
			    if ($count > 0)
			    {
			       session_start();
			      $_SESSION['m_id']=$row['m_id'];
			       header('location:admin_mentor.php?id='.$row['m_id'].'');
			    }
			    else
			    {
			       echo'<div class="container-fluid">
					<div class="row">
							<div class="col-md-4 col-md-offset-1" style="position:absolute; top:50px; left:30px">
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
									<hr class="message-inner-separator">
									<p><strong>Invalid</strong> Username or Password! Please Try again.</p>
								</div>
							</div>
					</div>
				</div>';
				
			   }
		    }
	   ?>	

	<div class="container">
		<div class="row">
		
			<div class="col-md-6" style = "margin-top:110px;">
				<div class="panel panel-default">
				   <div class="page-header">
					  <h1 style = "margin-left:50px;">Mentor <small>Login</small></h1>
					</div>
					<div class="panel-body">
						<form method="post" action="login_mentor.php" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="text" id="username" name="username"  class="form-control" placeholder="Username" required autofocus>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group last">
								<div class="col-sm-offset-1 col-sm-9">
									<button type="submit" id="submit" name="submit" class="btn btn-success">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>