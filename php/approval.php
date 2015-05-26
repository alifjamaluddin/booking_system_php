<?php

	require("config.php");
	$connection = mysqli_connect(db_host, db_user, db_password, db_name);

	if (!$connection)
	{
		echo "Failed to connect to database";
	}

	if (isset($_POST['approve']))
	{
		$index_no = $_POST['index_no'];

		$qUpdateReservation = "UPDATE reservation
								SET status = 1
								WHERE index_no = '$index_no'";

		$qGetIndex = "SELECT *
						FROM reservation
						WHERE index_no = '$index_no'";

		$connection->query($qUpdateReservation);
		foreach ($connection->query($qGetIndex) as $row)
		{
			$date_from = $row['date_from'];
			$date_to = $row['date_to'];
			$time_from = $row['time_from'];
			$time_to = $row['time_to'];
			$fac_id = $row['fac_id'];
			echo $date_from;
		}

		echo $date_from;

		$date_from_s = new DateTime($date_from);
		$date_to_e = new DateTime($date_to);
		$interval = $date_from_s->diff($date_to_e);
		$dateCounter = $interval->d;
		$dateStart = $date_from;
		echo $dateCounter;

		if ($dateCounter == 0)
		{
			$qUpdateCalendar = "INSERT INTO calendar
								(ref_id, fac_id, eventdate, date_event, time_to, time_from)
								VALUES ('$index_no', '$fac_id', '$dateStart', '$dateStart', '$time_to', '$time_from')";

			$connection->query($qUpdateCalendar);

		}

		if ($dateCounter > 0)
		{	
			for ($x = 1; $x <= $dateCounter; $x++)
			{
				$qUpdateCalendar = "INSERT INTO calendar
								(ref_id, fac_id, eventdate, date_event, time_to, time_from)
								VALUES ('$index_no', '$fac_id', '$dateStart', '$dateStart', '$time_to', '$time_from')";

				$connection->query($qUpdateCalendar);
				date_add($dateStart, date_interval_create_from_date_string("1 day"));
			}

		}
	}

	if (isset($_POST['disapprove']))
	{
		$index_no = $_POST['index_no'];

		$qUpdateReservation = "UPDATE reservation
								SET status = 3
								WHERE index_no = '$index_no'";

		$connection->query($qUpdateReservation);
	}

	header("Location: ".admin_view);
?>