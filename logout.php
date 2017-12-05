<?php
  session_start();
  if(isset($_SESSION['name']))
  {
  	session_destroy();
	unset($_SESSION['usn']);

	$_SESSION['message']="you are now logged out";
	header("location: index.php");
  }
?>