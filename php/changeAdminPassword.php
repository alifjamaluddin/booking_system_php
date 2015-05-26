<?php

require("config.php");
$connection = mysqli_connect(db_host, db_user, db_password, db_name);

if (!$connection)
{
	die('Could not connect: ' . mysqli_error());
}

$admin_id = $_POST['id'];
$new_password = $_POST['new_password'];
$con_password = $_POST['con_password'];

if(isset($_POST['chgpass']))
{
	if ($new_password == $con_password)
	{
		$qChgPassword = "UPDATE admin 
		SET password = '$new_password' 
		WHERE admin_id = '$admin_id'";

		$connection->query($qChgPassword);

		echo "<script>alert('Successfull');</script>";
		header("Location: ".admin_view);
	}
	else
	{

		echo "<script>alert('The password given is not the same');</script>";
			//header("Location: ".admin_view);
	}

}
?>