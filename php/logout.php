<?php
	require("config.php");
	
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['logged']);

	session_destroy();
	
	header("Location: " .index_view);

?>