<?php
session_start();
$usn = mysql_escape_string($_POST['usn']);
$password = mysql_escape_string($_POST['pwd']);


$db = mysqli_connect('localhost','root','','projectmanagement');

if(!$db)
{
	die("database connection error: ".mysqli_connect_error());
}

if(isset($_POST['login']))
{
	$sql = "select * from user where usn = '$usn' and password='$password'";
}
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
	$row = $result->fetch_assoc();
	 $_SESSION['message']= "you are now logged in ";
	 $_SESSION['name'] = $row["name"];
	 $_SESSION['usn'] = $row["usn"];
	 $_SESSION['branch'] = $row["branch"];
	 $_SESSION['phone'] = $row["phone"];
	 $_SESSION['email'] = $row["email"];

	header("location: home.php");
	
}
else
{
	echo"USN and password not matched";
}

?>