<?php
	session_start();
	require_once "../config/config.php";
	require_once "../config/functions.php";
	require_once "../lib/Database.php";
	$db = new Database(HOST, DBNAME, USER, PASS);

	// Checking for login data.
	if (isset($_POST['loginSubmit']) &&
			!empty($_POST['loginEmail']) &&
			!empty($_POST['loginPass'])
		 ) {

		$password = trim($_POST['loginPass']); 					// Eigenlijk niet doen, mensen gebruiken nogal eens spaties in hun wachtwoorden...
		$email 		= trim($_POST['loginEmail']);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// Email is not a valid email address.
			setMsg("This is not a valid email address!", 2);
			header("location:".ROOT."/login/");
			die();
		} else {
			// Searching for email address in database.
			$bind = ["mail" => $email];
			$user = $db->select("SELECT employeeNumber, firstName, lastName, email, password, jobTitle 
									 				 FROM employees WHERE email = :mail LIMIT 1", $bind);
			
			if (!$user) {
				// No user with that email address found, redirecting back.
				setMsg("Username or password were incorrect. Please try again!", 2);
				wrongLogin();
				header("location:".ROOT);
				die();
			} else {
				// User found, checking password.
				if ($user[0]->password == $password) {
					// Successfully logged in, redirecting to their department.
					session_destroy();
					session_start();
					setMsg("Successfully logged in!", 1);
					
					$_SESSION['firstName'] = $user[0]->firstName;
					$_SESSION['lastName']  = $user[0]->lastName;
					$_SESSION['role']      = $user[0]->jobTitle;
					header("location:".ROOT);
					die();
				} else {
					// Passwords did not match, redirecting back.
					setMsg("Username or password were incorrect. Please try again!", 2);
					wrongLogin();
					header("location:".ROOT);
					die();
				}
			}
		}
	} else {
		// Not all fields were filled in, or user came here without pressing submit.
		setMsg("Please fill in both fields.", 3);
		header("location:".ROOT);
		die();
	}

	unset($_SESSION['msg']);
	unset($_SESSION['lvl']);
?>