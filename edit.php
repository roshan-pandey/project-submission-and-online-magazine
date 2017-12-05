<?php
session_start();
$usn = $_SESSION['usn'];
if(isset($_POST['edit']))
{
	$db = mysqli_connect('localhost','root','','projectmanagement');
	if(!$db)
	{
		echo "<script type = 'text/javascript'>alert('oops!! Something went wrong');</script>";
	}
	else
	{
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		if(isset($_FILES['files']))
		{
			$file = $_FILES['files'];
			//print_r($file);
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_size = $file['size'];
			$file_error = $file['error'];

			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));

			$allowed = array('png', 'jpg');

			if(in_array($file_ext, $allowed))
			{
				if($file_error == 0)
				{
					if($file_size <= 524288)
					{
						$file_name_new = uniqid('',true).'.'.$file_ext;
						$file_dest = 'uploads/'.$file_name_new;

						if(move_uploaded_file($file_tmp, $file_dest))
						{
							$sql = "update user set name = '$name', email = '$email', phone = '$phone', dp = '$file_dest' where usn = '$usn' ";
						}
						else
						{
							echo "can not move<br/>";
						}
					}
					else
					{
						echo "size exceed<br\>";
					}
				}
				else
				{
					echo"file type not supported<br/>";
				}
			}
			else
			{
				$sql = "update user set name = '$name', email = '$email', phone = '$phone' where usn = '$usn'";
			}
		}
		else
		{
			echo "something went wrong";
		}
		$result = mysqli_query($db, $sql);
		if(!$result)
		{
			echo "<script type = 'text/javascript'>alert('oops!! Could not update.. Please, try later');</script>";
		}
		else
		{
			echo '<script type="text/javascript"> window.location="home.php"</script>';
		}
	}
}
?>