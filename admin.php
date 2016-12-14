<?php
	session_start();

	$title = "Admin";
	require_once "includes/header.php";

	if (isset($_SESSION['role'])) {
		if ($_SESSION['role'] == "President") {
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
<h2>This is the <b>Admin</b> page.</h2>
<p>Click <a href="<?= ROOT ?>/logout/">here</a> to log out again.</p>
<p>Or visit the other departments:</p>
<ul>
	<li><a href="<?= ROOT ?>/sales/">Sales</a></li>
	<li><a href="<?= ROOT ?>/finance/">Finance</a></li>
</ul>

<?php
	require_once "includes/footer.php";

	unset($_SESSION['msg']);
	unset($_SESSION['lvl']);
?>