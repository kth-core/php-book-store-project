<?php include("confs/auth.php"); ?>

<?php

	include("confs/config.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$remark = $_POST['remark'];

	$sql = "UPDATE categories SET name='$name', remark='$remark', modified_date=NOW() WHERE id = $id";
	mysqli_query($conn, $sql);

	header("location: cat-list.php");

?>