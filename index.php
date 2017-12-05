<?php
session_start();

if(isset($_SESSION['name']))
{

	echo '<script type="text/javascript"> window.location="home.php"</script>';
}
else
{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Project | Home</title>
				 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<style type="text/css"></style>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" class="active" href="index.php">Project Hub</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		        <li class="active" ><a href="index.php">Home <span class="glyphicon glyphicon-home"></span></a></li> 
		        <!--<li><a data-toggle="tab" href="#signup">SignUp</a></li>-->
		        <li><a data-toggle="tab" href="#about">About us <span class="glyphicon glyphicon-info-sign"></span></a></li>
		        <li><a data-toggle="tab" href="#contact">Contact Us <span class="glyphicon glyphicon-earphone"></span></a></li>
		        <li><a  href="magazine.php">Magazine <span class="glyphicon glyphicon-book"></span></a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="tab-content">
			<div class="tab-pane fade in active">
				<div id="header" style="width=100%; height: 100px; text-align: center;">
					<img src="images/BNMIT-title.png" alt="BNM Institute of technology">
				</div>
				<div id="leftNav" style="float: left; margin-left: 70px; margin-top: 50px;">
					<div style="width: 300px;" class="panel panel-primary">
						<div class="panel-heading"><b>Login </b> <span class="glyphicon glyphicon-log-in"></span></div>
						<form action="login.php" method="POST">
							<div class="panel-body">
							    <div class="form-group ">
							      <label for="usn">Username:</label>
							      <input type="text" class="form-control" id="usn" placeholder="Enter usn" name="usn" required>
							    </div>
							    <div class="form-group">
							      <label for="pwd">Password:</label>
							      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
							    </div>
							    <div class="checkbox">
							      <label><input type="checkbox" name="remember"> Remember me</label>
							    </div>
							    <input type="submit" class="btn btn-success" name="login" value="Login" />
							</div>
						</form>
					</div>
				</div>
				<div>
					<div style="float: right; width: 800px; height: 500px; margin-right: 250px; margin-top: 50px; ">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
 						 <!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						    <li data-target="#myCarousel" data-slide-to="3"></li>
						    <li data-target="#myCarousel" data-slide-to="4"></li>
						    <li data-target="#myCarousel" data-slide-to="5"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" id="slider">
						    <div class="item active">
						      <img src="images/project-1.jpg" alt="Physics" style="width: 800px; height: 500px;" >
						    </div>

						    <div class="item">
						      <img src="images/project-2.jpg" alt="Chamistry" style="width: 800px; height: 500px">
						    </div>

						    <div class="item">
						      <img src="images/project-3.jpg" alt="Computer Science" style="width: 800px; height: 500px">
						    </div>

						    <div class="item">
						      <img src="images/project-4.jpg" alt="Electronics" style="width: 800px; height: 500px">
						    </div>

						    <div class="item">
						      <img src="images/project-5.jpg" alt="Electrical" style="width: 800px; height: 500px">
						    </div>

						    <div class="item">
						      <img src="images/project-6.jpg" alt="Mechanical" style="width: 800px; height: 500px">
						    </div>
						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>
			</div>
			<div id="contact" class="tab-pane fade">
				<h1>Contact us</h1>
			</div>
			<div id="about" class="tab-pane fade">
				<h1>About us</h1>
			</div>
		</div> 
	</body>
</html>
<?php
}
?>