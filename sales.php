<?php
	session_start();

	$title = "Sales";
	require_once "includes/header.php";

	if (isset($_SESSION['role'])) {
		if ($_SESSION['role'] == "Sales Rep" || $_SESSION['role'] == "VP Sales" || $_SESSION['role'] == "Sales Manager (NA)" || $_SESSION['role'] == "President") {
			// User can be here
		} else {
			setMsg("You cannot visit this page.", 2);
			header("location:".ROOT);
			die();
		}
	}
?>

<h1>Welcome, <?= $_SESSION['firstName'] ?>!</h1>
<h2>This is the <b>Sales</b> page.</h2>
<p>Click <a href="<?= ROOT ?>/logout/">here</a> to log out again.</p>

<?php
	if ($_SESSION['role'] == "President") {
		echo "<a href='".ROOT."/admin/'>Back to the admin page</a>";
	}

	require_once "includes/footer.php";

	unset($_SESSION['msg']);
	unset($_SESSION['lvl']);
?>