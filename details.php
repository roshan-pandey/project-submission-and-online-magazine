<?php
session_start();
if(isset($_SESSION['usn']))
{
	$title = $_POST['title'];
	$languages = $_POST['lang'];
	$link = $_POST['link'];
	$details = $_POST['details'];
	$usn = $_SESSION['usn'];
	if(isset($_POST['submit']))
	{
		$db = mysqli_connect('localhost','root','','projectmanagement');
		if(!$db)
		{
			die("database connection error: ".mysqli_connect_error());
		}
		else
		{
			$sql = "insert into project values('','$usn','$title','$languages','$link','$details')";
			$result = mysqli_query($db,$sql);
			if(!$result)
			{
				echo"can not submit!! </br> Please check the details";
			}
			else
			{
				echo"successfully entered :)";
			}
		}

	}
}
else{
	header("location : index.php");
}
?>