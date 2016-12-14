<?php
	session_start();
	$title = "Login";
	require_once "includes/header.php";
?>

	<form action="<?= ROOT ?>/controllers/authController.php" method="post">
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="loginEmail" id="email">
		</div>

		<div class="form-group">
			<label for="pass">Password:</label>
			<input type="password" name="loginPass" id="pass">
		</div>

		<div class="form-group">
			<input type="submit" name="loginSubmit" value="Submit">
		</div>
	</form>

<?php
	require_once "includes/footer.php";
	
	unset($_SESSION['msg']);
	unset($_SESSION['lvl']);
?>