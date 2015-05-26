<?php
	
	require("config.php");
	$connection = mysqli_connect(db_host, db_user, db_password, db_name);

	if (!$connection)
	{
		echo "Failed to connect to database";
	}
	
	if (isset($_POST['user']))
	{	
			if ($_POST['checkRole'] == 'admin')
			{
				$admin_id = $_POST['id'];
				$password = $_POST['password'];
				$qAdmin = "SELECT password, admin_id, name, email 
								FROM admin 
								WHERE admin_id = '$admin_id' 
								AND password = '$password'";

				if(($connection->query($qAdmin)->num_rows) > 0)
				{
					$row = mysqli_fetch_assoc($connection->query($qAdmin));
					$adminName = $row['name'];
					$adminEmail = $row['email'];
					session_start();
					$_SESSION['name'] = $adminName;
					$_SESSION['id'] = $admin_id;
					$_SESSION['logged'] = 1;
					header("Location: " . admin_view);
				}
				else
				{
					echo "Your id or password is wrong";
				}
			}

			if($_POST['checkRole'] == 'user')
			{
				$user_id = $_POST['id'];
				$password = $_POST['password'];

				$qUser = "SELECT * 
								FROM user
								WHERE user_id = '$user_id'
								AND password = '$password'";

				if(($connection->query($qUser)->num_rows) > 0)
				{
					$row = mysqli_fetch_assoc($connection->query($qUser));

					if ($row['status'] == 1)
					{
						$userFullname = $row['fullname'];
						$userEmail = $row['email'];
						$userNo_telefon = $row['no_telefon'];
						session_start();
						$_SESSION['name'] = $userFullname;
						$_SESSION['id'] = $user_id;
						$_SESSION['logged'] = 1;
						header("Location: " . user_view);
					}
					else
					{
						echo "Your id or password is wrong";
					}
				}
			}
	}

		if (isset($_POST['guest']))
		{
			header("Location: ".guest_view);
		}	


?>