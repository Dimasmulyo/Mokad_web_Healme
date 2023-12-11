
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_transaksi<?php  echo $id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Edit Transaksi</center>
						</div>    
					</div>
				</h4>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="id_transaksi_ok" value="<?php echo $row['id_transaksi'] ?>">
					<div class="form-group">
					<label>Update by</label>
					<input class="form-control" type ="text" name = "update_by" value="<?php echo $_SESSION['NAME']; ?>" readonly="readonly" >
				</div>
				<input class="form-control"  type = "hidden" name = "nm_katalog" value="<?php echo $row['nm_katalog'] ?>">
				<input class="form-control"  type = "hidden" name = "harga" value="<?php echo $row['harga'] ?>">
					<div class="form-group">
						<label>Jumlah beli</label>
							<input class="form-control"  type = "number" name = "jml_beli" value="<?php echo $row['jml_beli'];$sbl_jmlbeli = $row['jml_beli']; ?>" required="true">
					</div>
					<?php if($_SESSION['ROLE'] == 'admin'): ?>
					<div class="form-group">
						<label>Status Bayar</label>
						<select class = "form-control" name = "status_byr">
								<option><?php echo $row['status_byr'] ?></option>
								<option>Lunas</option>
								<option>Belum Bayar</option>
							</select>
					</div>
					<?php endif;?>
					<button name = "update" type="submit" class="btn btn-primary">Save Data</button>
				</form>
			</div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
		</div>
	</div>
</div>
<!-- /.modal-content -->
                               
	<?php 
		require 'dbcon.php';
		
		if(ISSET($_POST['update'])){
			$bool = true;
			$harga=$_POST['harga'];
			$nm_katalog=$_POST['nm_katalog'];
			$jml_beli=$_POST['jml_beli'];
			$total = $jml_beli * $harga;
			$status_byr=$_POST['status_byr'];
			$nomor =$_POST['id_transaksi_ok'];
			$update_by=$_POST['update_by'];
			

			$result = mysqli_query($conn, "SELECT * FROM katalog WHERE nm_katalog = '$nm_katalog'");
					$data   = mysqli_fetch_assoc($result);
					$stok 	= $data['stok'];

			if($jml_beli>=$sbl_jmlbeli){
				$jadi=$jml_beli-$sbl_jmlbeli;
				$hasil = $stok-$jadi;
				$conn->query("UPDATE katalog SET stok = '$hasil' WHERE nm_katalog = '$nm_katalog'");
				$conn->query("UPDATE transaksi SET total = '$total',jml_beli = '$jml_beli', status_byr = '$status_byr', update_by = '$update_by' WHERE id_transaksi = '$nomor'") or die (mysql_error());
				echo "<script> window.location='transaksi.php' </script>";
			}else{
				$jadi=$sbl_jmlbeli-$jml_beli;
				$hasil = $stok+$jadi;
				$conn->query("UPDATE katalog SET stok = '$hasil' WHERE nm_katalog = '$nm_katalog'");
				$conn->query("UPDATE transaksi SET total = '$total',jml_beli = '$jml_beli', status_byr = '$status_byr', update_by = '$update_by' WHERE id_transaksi = '$nomor'") or die (mysql_error());
				echo "<script> window.location='transaksi.php' </script>";
			}
				
			
		}	
	?>
								
<?php
	}
?> 