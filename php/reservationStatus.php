<?php

	function reservationStatus($user_id)
	{
		require("config.php");
		$connection = mysqli_connect(db_host, db_user, db_password, db_name);

		if (!$connection)
		{
			echo "Failed to connect to database";
		}

		$result = "<br />";
		$qUserReservation = "SELECT *
								FROM reservation
								WHERE user_id = '$user_id'";

		if (($connection->query($qUserReservation)->num_rows) > 0)
		{
			foreach ($connection->query($qUserReservation) as $row)
			{
				if ($row['status'] == 1)
				{
					$status = "Approved";
				}
				if ($row['status'] == 0)
				{
					$status = "Waiting for approval";
				}
				if ($row['status'] == 2)
				{
					$status = "Dissapproved";
				}
				$result .= "<h3>Details Of Reservation</h3>"
							."<p>Reference ID : ".$row['index_no']."</p>"
							."<p>Date : ".$row['date_from']." to ".$row['date_to']."</p>"
							."<p>Time : ".$row['time_from']." to ".$row['time_to']."</p>"
							."<p>Venue : ".$row['fac_id']."</p>"
							."<p>Reserved on : ".$row['time_created']."</p>"
							."<h3>Status : ".$status."</h3>"
							."<br />";
			}
		}
		else
		{
			$result .= "You have no reservation";
		}

		return $result;
	}
?>