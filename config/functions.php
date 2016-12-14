<?php
	function setMsg($msg, $lvl) {
		$_SESSION['msg'] = $msg;
		$_SESSION['lvl'] = $lvl;
	}

	function getMsg() {
		if (isset($_SESSION['msg']) && isset($_SESSION['lvl'])) {
			$lvl = $_SESSION['lvl'];
			$msg = $_SESSION['msg'];

			switch ($lvl) {
				case 1:
					return "<div class=\"alert alert-success\">".$msg."</div>";
					break;

				case 2:
					return "<div class=\"alert alert-warning\">".$msg."</div>";
					break;

				case 3:
					return "<div class=\"alert alert-danger\">".$msg."</div>";
					break;
				
				default:
					return false;
			}
		} else {
			return false;
		}
	}

	# ZUCHT! Omdat ik mijn messages al met sessions doe, werkt dit niet / heel raar. Er zat constant maar één
	# item in $_SESSION['wrongLogins']. Is opzich wel een leuke manier van dit regelen, maar in de database zou
	# toch iets makkelijker zijn :-P

	function wrongLogin() {
		if (!isset($_SESSION['wrongLogins'])) {
			$_SESSION['wrongLogins'] = [];
		}

		array_push($_SESSION['wrongLogins'], strtotime("now"));
		checkWrongLogins();
	}

	function checkWrongLogins() {
		if (count($_SESSION['wrongLogins']) >= 3) {
			header("location:".ROOT."/login/?forgot");
			die();
		}
	}
?>