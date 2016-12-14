<?php
	# --------------------------------------------- #
	# ----------- FIRST EDIT CONFIG.PHP ----------- #
	# --------------------------------------------- #

	session_start();
	require "includes/header.php";
	
	if (isset($_SESSION['role'])) {
		switch($_SESSION['role']) {
			case "President";
				header("location:".ROOT."/admin/");
				break;
			
			case "VP Sales":
				header("location:".ROOT."/sales/");
				break;

			case "Sales Rep":
				header("location:".ROOT."/sales/");
				break;

			case "Sales Manager (NA)":
				header("location:".ROOT."/sales/");
				break;
			
			case "VP Finance":
				header("location:".ROOT."/finance/");
				break;

			case "Finance":
				header("location:".ROOT."/finance/");
				break;
			
			default:
				header("location:".ROOT."/logout/?wrong");
		}
	} else {
		header("location:".ROOT."/login/");
	}

	strpos();
	
	require "includes/footer.php";
?>