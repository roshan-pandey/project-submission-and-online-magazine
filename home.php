<?php 
session_start();
$db = mysqli_connect('localhost','root','','projectmanagement');
$usn = $_SESSION['usn'];
$newSql = "select * from user where usn = '$usn'";
$result = mysqli_query($db, $newSql);
while($r = mysqli_fetch_assoc($result))
{
	$_SESSION['name'] = $r["name"];
	$_SESSION['usn'] = $r["usn"];
	$_SESSION['branch'] = $r["branch"];
	$_SESSION['phone'] = $r["phone"];
	$_SESSION['email'] = $r["email"];
	$_SESSION['dp'] = $r['dp'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home | <?php echo $_SESSION['name'] ?></title>
		<!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	    <!-- jQuery library -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	    <!-- Latest compiled JavaScript -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <style type="text/css">
	    	#title, #language, #link{
	    		height: 34px;
	    		font-size: 18px;
	    	}
	    	label{
	    		font-size: 18px;
	    	}
	    </style>
	    <script type="text/javascript">
	    	function validate_phone() {
	    		var phone = document.getElementById("phone").value;
	    		if(phone.length == 10)
	    		{
	    			var num = /^[0-9]+$/;
	    			if(phone.match(num))
	    			{
	    				return true;
	    			}
	    			else{
	    				alert("Please Enter Only Numbers!!");
	    				return false;
	    			}
	    		}
	    		else{
	    			alert("Please enter 10 Digit Phone Number!!");
	    			return false;
	    		}
	    	}
	    </script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="home.php">Project Hub</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="home.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
		      <li><a href="myproject.php">My Projects <span class="glyphicon glyphicon-folder-close"></span></a></li>
		      <li><a href="allproject.php">All Projects <span class="glyphicon glyphicon-folder-open"></span></a></li>
		      <li><a href="magazine.php">Magazine <span class="glyphicon glyphicon-book"></span></a></li>
		      <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
		    </ul>
		  </div>
		</nav>
		<div id="header" style="width=100%; height: 100px; text-align: center;">
				<img src="images/BNMIT-title.png" alt="BNM Institute of technology">
		</div>
		<div id="belowlogo">
			<div class="container-fluid" style=" margin-right: 10px; margin-top: 60px; display: flex; ">
				<div style="flex: 3; order: 2; margin-left: 50px; margin-right: 100px;">
					<form action="details.php" method="POST">
						<div class="form-group" id="PojectForm">
							<label for="title">Project title :</label>
							<input type="text" class="form-control" id="title" placeholder="Enter title" name="title" autocomplete="off" required>
							<br>
							<label for="language">Languages/tools used :</label>
							<input type="text" class="form-control" id="language" placeholder="Tools/languages" name="lang" autocomplete="off" required>
							<br>
							<label for="links">Links(optional) :</label>
							<input type="text" class="form-control" id="link" placeholder="Links" name="link" autocomplete="off">
							<br>
							<label for="problemstmt">Details of the Project :</label>
							<textarea placeholder="Explain your project briefly" class="form-control" name ="details" rows="5" id="problemstmt" style="font-size: 18px;" required></textarea>
						</div>
						<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
					</form>
				</div>
				<div class="panel panel-primary" style="flex: 1; order: 1; margin-left: 100px;">
					<div class="panel-heading">
						<div> Details <span class="glyphicon glyphicon-list-alt"></span></div> 
					</div>
					<div>
						<div>
							<img src="
							<?php 
								if($_SESSION['dp']!= null)
								{ 
									echo $_SESSION['dp'];
								} 
								else
								{
									echo'userprofilepic.png';
								} 
								?>" 
								alt="profile pic" style=" height:160px; width:140px; display: block; margin: auto; margin-top: 10px;">
						</div>
						<br/>
						<br/>
						<div class="panel-body" style="margin-top: -10px;">
							<table class="table" style=" text-align: center;">
							    <tbody>
								    <tr>
								        <td><b>Name</b></td>
								        <td><?php if(isset($_SESSION['name'])){ echo ucwords($_SESSION['name']); } else{header('location:index.php');}?></td>
								    </tr>
								    <tr>
								    	<td><b>USN</b></td>
								    	<td><?php echo $_SESSION['usn'];?></td>
								    </tr>
								    <tr>
								    	<td><b>Email</b></td>
								    	<td><?php echo $_SESSION['email'];?></td>
								    </tr>
								   	<tr>
								    	<td><b>Phone</b></td>
								    	<td><?php echo $_SESSION['phone'];?></td>
								    </tr>
							    </tbody>
						    </table>
						    <div>
						    	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editDetails">Edit Details</button>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div id="editDetails" class="modal fade" role="dialog">
				<div class="modal-dialog">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Change Details</h4>
						</div>
						<form action="edit.php" method="POST" onsubmit=" return validate_phone();" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label for="file">Select Profile Picture<span style="font-size: 13px;"> (< 512kb) </span>:</label>
						    	<input type="file" class="btn btn-default" id="file" name="files">
						    </div>
						    <div class="form-group">
						    	<label for="name">Name:</label>
						    	<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required autocomplete="off">
						    </div>
						    <div class="form-group">
						    	<label for="email">Email:</label>
						     	<input type="email" class="form-control" id="email" placeholder="Email" name="email" required autocomplete="off">
						    </div>
						    <div class="form-group">
						    	<label for="phone">Phone Number:</label>
						     	<input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" required autocomplete="off">
						    </div>
						</div>
						<div class="modal-footer" style="display: flex;">
							<div>
								<input style="flex: 1;" class="btn btn-info" type="submit" name="edit" value="Submit">
							</div>
							<div>
								<button style="flex: 1; margin-left: 434px;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>