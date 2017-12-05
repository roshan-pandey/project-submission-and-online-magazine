<?php 
session_start();

$comment = $_POST['comment'];
$pid = $_POST['pid'];
$name = $_SESSION['name'];
$value = $_POST['addcomment'];
$db = mysqli_connect('localhost','root','','projectmanagement');
if(!$db)
{
	die("can not connect".mysqli_connect_error());
}
else{
	$sql = "insert into comments values('$pid','$name','$comment')";
	$result = mysqli_query($db,$sql);
	if(!$result)
	{
		echo "comment not added<br>";
	}
	else{
		echo"comment added";
		/*if($value == 'myComment')
		{
			echo '<script type="text/javascript"> window.location="myproject.php"</script>';
		}
		else if($value == 'allComment')
		{
			echo '<script type="text/javascript"> window.location="allproject.php"</script>';
		}*/
	}
}
?>