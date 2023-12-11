
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_pembayaran<?php  echo $id_pembayaran; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Upload Bukti Transfer</center>
						</div>    
					</div>
				</h4>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="id_pembayaran" value="<?php echo $row['id_pembayaran'] ?>">

					<h3>Pembayaran dapat dilakukan dengan transfer melalui :</h3><br>
					<p class="text-center"><img src="upload/bank_mandiri.webp" style="width: 100px; margin:0px 10px;"> <br><br><b>No. Rekening: 1560015355755 A/N Dimas Mulyo Agib<b> </p><hr>
					<p class="text-center"><img src="upload/dana.webp" style="width: 100px; margin:0px 10px;"> <br><br><b>No. Dana: 085261915074 A/N RINI ADELINA SIAGIAN<b> </p><hr>
					<div class="form-group">
									<label>Upload Bukti Transfer</label><br>
									<i style="float: left;font-size: 11px;color: red">Mohon Upload Gambar</i><br>
									<input type="file" name="image" class="btn btn-default" value='<?php $row['file'];?>' required="true"/><br>
					</div>
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
			$id_pembayaran=$_POST['id_pembayaran'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
			$location="upload/" . $_FILES["image"]["name"];
		
	
			$conn->query("UPDATE pembayaran SET file='$location',status='Bukti bayar sudah di upload' WHERE id_pembayaran = '$id_pembayaran'")or die(mysql_error());
			echo "<script> window.location='pembayaran.php' </script>";
		}	
	?>
								
<?php
	}
?>
