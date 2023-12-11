<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Tambah User</center>
						</div>    
					</div>
				</h4>
			</div>
										
										
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
				
					<div class="form-group">
						<label>Nama</label>
							<input class="form-control" type ="text" name = "name" placeholder="Tolong masukkan nama" required="true">
					</div>
					<div class="form-group">
						<label>No Telpon</label>
							<input class="form-control" type ="text" name = "no_telp" placeholder="Tolong masukkan no telpon" required="true">
					</div>
					<div class="form-group">
						<label>Alamat</label>
							<input class="form-control" type ="text" name = "alamat" placeholder="Tolong masukkan alamat" required="true">
					</div>
					<div class="form-group">
						<label>Bidang</label>
							<input class="form-control" type ="text" name = "bidang" placeholder="Tolong masukkan bidang" required="true">
					</div>
					<div class="form-group">
						<label>Username</label>
							<input class="form-control"  type = "text" name = "username" placeholder="Tolong masukkan username" required="true">
					</div>
															
					<div class="form-group">
						<label>Password</label>
							<input class="form-control"  type = "password" name = "password" placeholder="Please enter password" required="true">
					</div>
					<div class="form-group">
						<label>Role</label>
						<select class = "form-control" name = "role">
								<option>dokter</option>
								<option>user</option>
								<option>admin</option>
							</select>
					</div>	
					<div class="form-group">
                        <label>Image</label>
						<input type="file" name="image" class="btn btn-default" required="true"/><br>
                    </div>	
						<button name = "save" type="submit" class="btn btn-primary">Save Data</button>
				</form>  
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
										
										
										
										
			<?php 
				require_once 'dbcon.php';
				
				if (isset ($_POST ['save'])){
					$name=$_POST['name'];
					$bidang=$_POST['bidang'];
					$no_telp=$_POST['no_telp'];
					$alamat=$_POST['alamat'];
					$username=$_POST['username'];
					$password=md5($_POST['password']);
					$role=$_POST['role'];
					$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name= addslashes($_FILES['image']['name']);
					$image_size= getimagesize($_FILES['image']['tmp_name']);
		
					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$location="upload/" . $_FILES["image"]["name"];
					
					$conn->query("INSERT INTO admins(name,bidang,no_telp,alamat,username,password,role,foto)values('$name','$bidang','$no_telp','$alamat','$username','$password','$role','$location')")or die(mysql_error());
				}						
			?>					
        </div>
                                    
<!-- /.modal-content -->
                                
	</div>
                               
<!-- /.modal-dialog -->
								
</div>