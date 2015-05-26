<?php

	require("config.php");
	$connection = mysqli_connect(db_host, db_user, db_password, db_name);

	if (!$connection)
	{
		die('Could not connect: ' . mysqli_error());
	}

	if (isset($_POST['submit']))
	{
		$user_id = $_POST['user_id'];
		$date_from = $_POST['date_from'];
		$date_to = $_POST['date_to'];
		$time_from = $_POST['time_from'];
		$time_to = $_POST['time_to'];
		$fac_id = $_POST['fac_id'];
		$event = $_POST['event'];
		$poster = $_POST['poster'];

		$date_from_s = new DateTime($date_from);
		$date_to_e = new DateTime($date_to);
		$interval = $date_from_s->diff($date_to_e);
		$dateCounter = $interval->d;
		$dateStart = $date_from;

		for ($x = 1; $x <= $dateCounter; $x++)
		{
			$breakFor = 0;

			$qGetReservation = "SELECT *
								FROM calendar
								WHERE eventdate = '$dateStart'
								AND fac_id = '$fac_id'";
			$qNumRows = $connection->query($qGetReservation->num_rows;
			if (($qNumRows) > 0))
			{
				foreach ($connection->query($qGetReservation) as $row) 
				{
					if (($time_from > $row['time_from']) && ($time_to < $row['time_to']) 
						&& ($row['time_from'] > $time_from) && ($row['time_to'] < $time_to))
					{
						$breakFor = 1;
						break;
					}
				}
			}

				if ($breakFor == 1)
				{
					echo "<script>alert('Please look at the calendar');</script>";
					header("Location: " . user_view . "#dashboard");
					break;
				}

			date_add($dateStart, date_interval_create_from_date_string("1 day"));

		}

		$xdata = $qNumRows;
		//echo json_encode($xdata);
		$qAddCalendar = "INSERT INTO reservation
								(fac_id, event, poster, user_id, date_from, date_to, time_from, time_to, status)
								VALUES ('$fac_id', '$event', '$poster', '$user_id', '$date_from',
										'$date_to', '$time_from', '$time_to', 0)";

		$connection->query($qAddCalendar);


	}

		echo $user_id.$date_from.$date_to.$fac_id.$event.$dateCounter;
	
?>