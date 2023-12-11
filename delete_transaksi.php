<?php
	require_once 'dbcon.php';
	$id_transaksi=$_GET['id_transaksi'];
	$nm_katalog=$_GET['nm_katalog'];
	$result = mysqli_query($conn, "SELECT * FROM katalog WHERE nm_katalog = '$nm_katalog'");
					$data   = mysqli_fetch_assoc($result);
					$stok 	= $data['stok'];

	$jadi=$jml_beli-$sbl_jmlbeli;
	$hasil = $stok+$jadi;
	$conn->query("UPDATE katalog SET stok = '$hasil' WHERE nm_katalog = '$nm_katalog'");
	
	$conn->query("delete from transaksi where id_transaksi='$id_transaksi'") or die(mysql_error());
	header('location:transaksi.php');
?>