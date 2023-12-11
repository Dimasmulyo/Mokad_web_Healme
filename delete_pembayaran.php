<?php
	require_once 'dbcon.php';
	$id_pembayaran=$_GET['id_pembayaran'];
	$conn->query("delete from pembayaran where id_pembayaran='$id_pembayaran'") or die(mysql_error());
	header('location:pembayaran.php');
?>