<?php
		session_start();
		session_destroy();
		session_start();
		$_SESSION['msg'] = "Logout...";
		header ("Location: index.php");
?>
