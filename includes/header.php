<?php
	require_once "config/config.php";
	require_once "config/functions.php";
	require_once "lib/Database.php";
	$db = new Database(HOST, DBNAME, USER, PASS);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?= $title." / Inlogsysteem" ?></title>
		<link rel="stylesheet" type="text/css" href="<?= ASSETS ?>/css/bootstrap.min.css">
	</head>

	<body>
		<div class="wrapper">	
			<header>
				<div class="container">
					
				</div>
			</header>	
		</div>
		<div class="maincontent">
			<div class="container">
				<?php
					if (getMsg()) {
						echo getMsg();
					}
				?>
