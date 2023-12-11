<?php
	require_once 'dbcon.php';
	$katalog_id=$_GET['katalog_id'];
	$conn->query("delete from katalog where katalog_id='$katalog_id'") or die(mysql_error());
	header('location:katalog.php');
?>