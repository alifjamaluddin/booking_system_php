<?php

require("config.php");
$connection = mysqli_connect(db_host, db_user, db_password, db_name);

if (!$connection)
{
	die('Could not connect: ' . mysqli_error());
}

if (isset($_POST['submit']))
{
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$user_id = $_POST['user_id'];
	$no_kp = $_POST['no_kp'];
	$no_telefon = $_POST['no_telefon'];
	$status = 0;
	$qGetUser = "SELECT user_id 
	FROM user
	WHERE user_id = '$user_id'";

	if(($connection->query($qGetUser->num_rows)) == 0)
	{
		$qInsertUser = "INSERT INTO user 
		(status, fullname, email, user_id, no_kp, password, no_telefon)
		VALUES ('$status', ''$fullname', '$email', $user_id', '$no_kp', '$no_kp' '$no_telefon')";
		if (!($connection->query($qGetUser))
		{
			die('Could not insert data : ' . mysqli_error());
		}

		echo "<script>alert('Data has been inserted');</script>";
	}
	else
	{
		echo "<script>alert('User ID has been used already');</script>";
	}
}

?>