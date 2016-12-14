<?php
	session_start();
	require_once "config/config.php";
	require_once "config/functions.php";

	session_destroy();
	session_start();

	if (isset($_GET['wrong'])) {
		setMsg("Something went wrong while trying to log you in. Please try again!", 3);
		header("location:".ROOT);
	} else {
		setMsg("You were logged out successfully.", 1);
		header("location:".ROOT);
	}	
?>