<?php

	
	function showReservation()
	{
		require("config.php");
		$connection = mysqli_connect(db_host, db_user, db_password, db_name);

		if (!$connection)
		{
			echo "Failed to connect to database";
		}
	
			$qGetReservation = "SELECT *
					FROM reservation
					INNER JOIN user
					ON reservation.user_id = user.user_id
					WHERE reservation.status = 0
					ORDER BY time_created ASC";

			foreach ($connection->query($qGetReservation) as $row) 
			{
				$result .= "<form action='php/approval.php' method='POST'>"
							."<input type='hidden' name='index_no' value='".$row['index_no']."'>"
							."<p>Reference : ".$row['index_no']."</p>"
							."<p>Date : ".$row['date_from']." to ".$row['date_to']."</p>"
							."<p>Time : ".$row['time_from']." to ".$row['time_from']."</p>"
							."<p>Venue : ".$row['fac_id']."</p>"
							."<p>Reserved by : ".$row['fullname']." at "
							.date('h.i.s', $row['time_created'])." on "
							.date('d-m-Y', $row['time_created'])
							."<br /><button type='submit' name='approve' value='approve' class='btn btn-default'>Approve</button>"
							."&nbsp;&nbsp;&nbsp;<button type='submit' name='disapprove' value='disapprove' class='btn btn-default'>Disapprove</button>"
							."</form><br />";
			}

		return $result;
	}

?>