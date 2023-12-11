<?php
	require_once 'dbcon.php';
	$id=$_GET['id'];
	$conn->query("delete from admins where id='$id'") or die(mysql_error());
	header('location:user.php');
?>