<?php
function getChartData($tahun)
{

require("config.php");
$connection = mysqli_connect(db_host, db_user, db_password, db_name);

if (!$connection)
{
	die('Could not connect: ' . mysqli_error());
}

	$qGetReservation = "SELECT *
					FROM calendar
					INNER JOIN reservation
					WHERE eventdate = '$tahun'";
	$qNumRows = $connection->query($qGetReservation)->num_rows;

	return $qNumRows;
}

?>