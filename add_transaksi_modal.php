<?php
	if(!$bool){
?>

<div class="modal fade" id="myModal1<?php  echo $katalog_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Tambah Keranjang</center>
						</div>    
					</div>
				</h4>
			</div>
										
										
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input class="form-control" type ="hidden" name = "id_user" value="<?php echo $_SESSION['ID']; ?>">

					<input class="form-control" type ="hidden" name = "update_by" value="--">
					
				<div class="form-group">
					<label>Pemesan</label>
					<input class="form-control" type ="text" name = "insert_by" value="<?php echo $_SESSION['NAME']; ?>" readonly="readonly" >
				</div>
			
					<div class="form-group">
						<label>Nama katalog</label>
						<input class="form-control" type="text" name = "nm_katalog" value="<?php echo $row['nm_katalog']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input class="form-control" type="number" name = "harga" value="<?php echo $row['harga']; ?>" readonly>
					</div>										
					<div class="form-group">
						<label>Jumlah beli</label>
							<input class="form-control"  type = "number" name = "jml_beli" placeholder="Masukkan jumlah yang akan dibeli" required="true">
					</div>
					
							<input class="form-control" type ="hidden" name = "status_byr" value="Belum Bayar">						
					
							
						<button name = "tambah" type="submit" class="btn btn-primary">Save Data</button>
				</form>  
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>					
					
        </div>
                                   
<!-- /.modal-content -->
        
	</div>
                               
<!-- /.modal-dialog -->
								
</div>

<?php 
				require_once 'dbcon.php';
				if (isset ($_POST ['tambah'])){
					$bool = true;
					$id_user=$_POST['id_user'];
					$nm_katalog=$_POST['nm_katalog'];
					$harga=$_POST['harga'];
					$jml_beli=$_POST['jml_beli'];
					$total = $harga * $jml_beli;
					$status_byr=$_POST['status_byr'];
					$update_by=$_POST['update_by'];			
					
					
					$result = mysqli_query($conn, "SELECT * FROM katalog WHERE nm_katalog = '$nm_katalog'");
					$data   = mysqli_fetch_assoc($result);
					$stok 	= $data['stok'];

						
					if($jml_beli>=$stok){
						echo "<script type='text/javascript'>alert('Stok tidak cukup');</script>";
						echo "<script> window.location='katalog.php' </script>";
					}else{
						$hasil = $stok-$jml_beli;	
						$conn->query("UPDATE katalog SET stok = '$hasil' WHERE nm_katalog = '$nm_katalog'");
						$conn->query("INSERT INTO transaksi(id_user,nm_katalog,harga,jml_beli,total,status_byr,update_by)values('$id_user','$nm_katalog','$harga','$jml_beli','$total','$status_byr','$update_by')") or die(mysql_error());
						echo "<script> window.location='katalog.php' </script>";
					}
					
					
				}						
			?>			
<?php
	}
?>   