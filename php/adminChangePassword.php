<?php

	function showInfo($admin)
	{
		require("config.php");
		$connection = mysqli_connect(db_host, db_user, db_password, db_name);

		if (!$connection)
		{
			die('Could not connect: ' . mysqli_error());
		}

		$result = "</br>";

		$qShowInfo = "SELECT *
						FROM admin
						WHERE admin_id = '$admin'";

		foreach ($connection->query($qShowInfo) as $row)
		{
			$result .= "<p>Full Name : ".$row['name']."</p>"
						."<p>Staff ID : ".$row['admin_id']."</p>"
						."<p>Email : ".$row['email']."</p>"
						."<div class='form-group'>"
						."<form action='php/changeAdminPassword.php' method='POST'>"
						."<input class='form-control' type='hidden' name='id' value='".$row['admin_id']."' />"
						."<label for='chgpass'>Password</label>"
						."<input class='form-control' type='password' name='new_password' />"
						."<label for='chgpass'>Confirmation Password</label>"
						."<input class='form-control' type='password' name='con_password' />"
						."<button class='btn btn-default' type='submit' name='chgpass'>Send</button>"
						."</form>"."</div>";
		}

		return $result;
	}
?>