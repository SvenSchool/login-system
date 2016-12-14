<?php
	session_start();

	$title = "Finance";
	require_once "includes/header.php";

	if (isset($_SESSION['role'])) {
		if ($_SESSION['role'] == "President" || $_SESSION['role'] == "VP Finance" || $_SESSION['role'] == "Finance") {
			// User can be here
		} else {
			setMsg("You cannot visit this page.", 2);
			header("location:".ROOT);
			die();
		}
	} else {
		setMsg("Please log in first.", 2);
		header("location:".ROOT);
		die();
	}
?>

<h1>Welcome, <?= $_SESSION['firstName'] ?>!</h1>
<h2>This is the <b>Finance</b> page.</h2>
<p>Click <a href="<?= ROOT ?>/logout/">here</a> to log out again.</p>

<?php
	if ($_SESSION['role'] == "President") {
		echo "<a href='".ROOT."/admin/'>Back to the admin page</a>";
	}

	require_once "includes/footer.php";

	unset($_SESSION['msg']);
	unset($_SESSION['lvl']);
?>