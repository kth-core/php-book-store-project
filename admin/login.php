<?php
	session_start();
	$name = $_POST['name'];
	$password = $_POST['password'];

	if($name == "admin" and $password == "12345") {
		$_SESSION['auth'] = true;
		header("location: book-list.php");
	} else {
		header("location: index.php");
	}
?>