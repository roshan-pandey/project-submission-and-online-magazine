<?php
session_start();
if(isset($_SESSION['name']))
{
?>

<!DOCTYPE html>
<html>
<head>
	<title>All Projects</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
        	body{
        			background: -moz-linear-gradient(lightblue , white); 
        		 	background: -webkit-linear-gradient(lightblue, white);
                    background: -o-linear-gradient(lightblue, white); 
                    background: linear-gradient(lightblue,white);
                    background-repeat: no-repeat;
        	}
        	.back-to-top{
        		display: none;
        		position: fixed;
        		bottom: 20px;
        		right: 20px;
        		border-radius: 5px;
        		padding: 10px;
        	}
        </style>
</head>
<body>
	<script type="text/javascript" src="js/jscript.js"></script>
	<button href="#" class="back-to-top btn btn-warning">Back to top</button>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Project Hub</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
      <li ><a href="myproject.php">My Projects <span class="glyphicon glyphicon-folder-close"></span></a></li>
      <li class="active"><a href="allproject.php">All Projects <span class="glyphicon glyphicon-folder-open"></span></a></li>
      <li><a href="magazine.php">Magazine <span class="glyphicon glyphicon-book"></span></a></li>
      <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
  </div>
</nav>
</body>
</html>

<?php
}
else
{
	echo '<script type="text/javascript"> window.location="home.php"</script>';
}
if(isset($_SESSION['usn']))
{
	$usn = $_SESSION['usn'];
	$db = mysqli_connect('localhost','root','','projectmanagement');
	if(!$db)
	{
		die("could not connect ".mysqli_connect_error());
	}
	else
	{
		$sql = "select * from project,user where user.usn = project.usn";
		$result = mysqli_query($db,$sql);
		echo '<div style = "display : flex;">';
		echo '<div style = "flex : 3; order : 2; background-color: rgba(0,0,0,0.6); color:white; box-shadow:  inset -6px -6px rgba(0,0,0,0.5); border-radius : 50px; padding : 50px;">';
		while ($r = mysqli_fetch_assoc($result)) {
			echo "<b>USN</b> : ".strtoupper($r['usn'])."<br>";
			echo "<b>Name</b> : ".ucwords($r['name'])."<br>";
			echo "<b>Email</b> : ".$r['email']."<br>";
			echo "<b>Title</b> : ".$r['projectname']."<br>";
			$pid = $r['projectid'];
			echo "<b>Languages / tools</b> : ".$r['languagesused']."<br>";
			if(!$r['link'])
			{
				
			}
			else
			{
				$mylink = $r['link'];
				echo '<b>link</b> : <a href="$mylink">'.$mylink.'</a><br>';
			}
			echo "<b>Description about the project</b> : ".$r['details']."<br>";
			echo "<form action='addcomment.php' method='post'>
					<input type='text' name='comment' placeholder='Add Comment' style='border-radius : 20px; padding : 10px; color : black;' autocomplete='off' required/>
					<input type='text' name = 'pid' value ='$pid' hidden/>
					<p style='margin-top : -10px;'>
					<br> <input type='submit' name='addcomment' value='Comment' class='btn btn-success btn-sm'>
					</p>
				 </form>";
			$sql1 = "select * from user, project, comments where user.usn = project.usn and project.projectid = comments.projectid and comments.projectid = '$pid' ";
			$result1 = mysqli_query($db, $sql1);
			if(!$result1)
			{

			}
			else{
				while ($row = mysqli_fetch_assoc($result1)) {
					echo "<div >";
					echo "<b>".ucwords($row['name'])." :</b> ";
					echo $row['comment'];
					echo "</div>";
				}
			}
			echo "<hr>";
		}
		echo "</div>";
		echo '<div style = "flex : 1; order : 1;"></div>';
		echo '<div style = "flex : 1; order : 3;"></div>';
		echo "</div>";
	}
}
?>
