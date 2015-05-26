<?php

	require("config.php");
	$connection = mysqli_connect(db_host, db_user, db_password, db_name);

	if (!$connection)
	{
		echo "Failed to connect to database";
	}

	$user_id = $_POST['user_id'];
	$no_telefon = $_POST['no_telefon'];
	$email = $_POST['email'];
	$new_password = $_POST['new_password'];
	$con_password = $_POST['con_password'];

	if(isset($_POST['submit']))
	{
		

		if (!($new_password == $con_password))
		{
			echo "<script>alert('Password Confirmation did not match');</script>";
			header("Location: " . user_view . "#sec3r");
		}

		$qUpdate = "UPDATE user 
							SET password = '$new_password',
							email = '$email',
							no_telefon = '$no_telefon'
							WHERE user_id = '$user_id'";

		$connection->query($qUpdate);

		header("Location: " . user_view);
	}

?>