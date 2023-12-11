
<?php
	if(!$bool){
?>

<div class="modal fade" id="delete_user<?php  echo $id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					
				<input class="form-control"  type = "hidden" name = "nm_katalog" value="<?php echo $row['nm_katalog'] ?>">
				<input class="form-control"  type = "hidden" name = "jml_beli" value="<?php echo $row['jml_beli'] ?>">
				Apa Kamu yakin akan menghapus user?
					
			</div>
            <div class="modal-footer">
				<button name = "delete" type="submit" class="btn btn-danger">Hapus Data</button>
				</form>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
		</div>
	</div>
</div>
<!-- /.modal-content -->
                               
	<?php 
		require 'dbcon.php';
		
		if(ISSET($_POST['delete'])){
			$bool = true;
			$nomor =$_POST['id_transaksi_ok'];
			$nm_katalog=$_POST['nm_katalog'];
			$jml_beli=$_POST['jml_beli'];
			

			$result = mysqli_query($conn, "SELECT * FROM katalog WHERE nm_katalog = '$nm_katalog'");
					$data   = mysqli_fetch_assoc($result);
					$stok 	= $data['stok'];
			
				$hasil = $stok+$jml_beli;
				$conn->query("UPDATE katalog SET stok = '$hasil' WHERE nm_katalog = '$nm_katalog'");
				$conn->query("DELETE from transaksi where id_transaksi='$nomor'") or die (mysql_error());
				echo "<script> window.location='transaksi.php' </script>";
			
		}	
	?>
								
<?php
	}
?> 