<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_user<?php  echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Edit User</center>
						</div>    
					</div>
				</h4>
			</div>
										
										
            <div class="modal-body">										
			<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
																				
					<div class="form-group">
						<label>Nama</label>
							<input class="form-control" type ="text" name = "name" required="true" value = "<?php echo $row ['name']?>">
					</div>
					<div class="form-group">
						<label>No Telp</label>
							<input class="form-control" type ="text" name = "no_telp" value = "<?php echo $row ['no_telp']?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
							<input class="form-control" type ="text" name = "alamat" value = "<?php echo $row ['alamat']?>">
					</div>
					<?php if($_SESSION['ROLE'] != 'user'): ?>
					<div class="form-group">
						<label>Bidang</label>
							<input class="form-control" type ="text" name = "bidang" value = "<?php echo $row ['bidang']?>">
					</div>
					<?php endif; ?>
					
					<div class="form-group">
						<label>Username</label>
							<input class="form-control" type ="text" name = "username" required="true" value = "<?php echo $row ['username']?>">
					</div>
					
					<div class="form-group">
						<label>Password</label><br>
						<span style="font-size:12px; color:red;">*Mohon masukkan ulang password</span>
							<input class="form-control" type ="password" name = "password" required="true" value = "<?php echo $row ['password']?>">
					</div>
					<?php if($_SESSION['ROLE'] == 'admin'): ?>
					<div class="form-group">
						<label>Role</label>
						<select class = "form-control" name = "role">
								<option><?php echo $row ['role'];?></option>
								<option>admin</option>
								<option>dokter</option>
								<option>user</option>						
							</select>
					</div>	
					<?php endif; ?>

					<div class="form-group">
						<label>Gambar</label><br>
						<i style="float: left;font-size: 11px;color: red">Mohon Upload Gambar</i><br>
						<input type="file" name="image" class="btn btn-default" required="true"/><br>
					</div>
					
					<button name = "change" type="submit" class="btn btn-primary">Save Data</button>
				</form>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
				
		</div>					
	</div>
</div>
<?php
	require_once 'dbcon.php';
	if (isset ($_POST ['change'])){
		$id = $_POST['id'];
		$name=$_POST['name'];
		$username =$_POST['username'];
		$bidang=$_POST['bidang'];
		$no_telp =$_POST['no_telp'];
		$alamat =$_POST['alamat'];
		$role=$_POST['role'];
		$password=md5($_POST['password']);
		$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
			$location="upload/" . $_FILES["image"]["name"];
	
		$conn->query("UPDATE admins SET name = '$name', no_telp = '$no_telp',alamat = '$alamat', bidang = '$bidang', username = '$username', password = '$password', role = '$role', foto = '$location' WHERE id = '$id'")or die(mysql_error());
		echo "<script> window.location='user.php' </script>";
	}
?>
<?php
	}
?>
<!-- /.modal-content -->
                                
