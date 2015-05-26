<?php

	function generateReport($tahun)
	{
		require("config.php");
		$connection = mysqli_connect(db_host, db_user, db_password, db_name);

		if (!$connection)
		{
			echo "Failed to connect to database";
		}

		$result = "<br />";

		$qGetData = "SELECT *
					FROM calendar
					INNER JOIN reservation
					WHERE eventdate = '$tahun'";

		if (($connection->query($qGetData)->num_rows) > 0)
		{	
			foreach ($connection->query($qGetData) as $row)
			{
				$result .= "<tr>"
							."<td>".$row['ref_id']."</td>"
							."<td>".$row['user_id']."</td>"
							."<td>".$row['fac_id']."</td>"
							."<td>".$row['date_event']."</td>"
							."<td>".$row['time_from']." - ".$row['time_to']."</td>"
							."</tr>";
			}

			$result .= "No Data";
		}
		else
		{
			$result .= "No Data";
		}

		return $result;
	}

?>