<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Tambah katalog</center>
						</div>    
					</div>
				</h4>
			</div>
										
										
            <div class="modal-body">
				<form method = "post" name="my_form" enctype = "multipart/form-data">	
										
					<div class="form-group">
						<label>Nama katalog</label>
							<input class="form-control" type ="text" name = "nm_katalog" placeholder="Tolong masukkan nama makanan" required="true">
					</div>
					<div class="form-group">
						<label>Harga</label>
							<input class="form-control"  type = "number" name = "harga" placeholder="Please enter harga" required="true">
					</div>
					<div class="form-group">
						<label>Kandungan Obat</label>
						<textarea class="form-control" onKeyPress=check_length1(this.form); onKeyDown=check_length1(this.form); name=my_text1 rows=4 cols=30></textarea>
						<input size=1 value=200 name=text_num1 style="border:0px;" readonly>karakter tersisa.
					</div>
					<div class="form-group">
						<label>Fungsi Obat</label>
						<textarea class="form-control" onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); name=my_text rows=4 cols=30></textarea>
						<input size=1 value=200 name=text_num style="border:0px;" readonly>karakter tersisa.
					</div>
															
					<div class="form-group">
						<label>Stok</label>
							<input class="form-control"  type = "number" name = "stok" placeholder="Please enter stok" required="true">
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
					$nm_katalog=$_POST['nm_katalog'];
					$harga=$_POST['harga'];
					$stok=$_POST['stok'];
					$my_text1=$_POST['my_text1'];
					$my_text=$_POST['my_text'];
					$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name= addslashes($_FILES['image']['name']);
					$image_size= getimagesize($_FILES['image']['tmp_name']);
		
					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$location="upload/" . $_FILES["image"]["name"];
					
					
					$conn->query("INSERT INTO katalog(nm_katalog,kandungan,deskripsi,harga,stok,img)values('$nm_katalog','$my_text1','$my_text','$harga','$stok','$location')")or die(mysql_error());
				}						
			?>					
        </div>
                                   
<!-- /.modal-content -->
                                
	</div>
                               
<!-- /.modal-dialog -->
								
</div>
<script language=JavaScript>
function check_length(my_form)
{
maxLen = 200; // max number of characters input
if (my_form.my_text.value.length >= maxLen) {
// Alert message if maximum limit is reached. 
// If required Alert can be removed. 
var msg = "You have reached your maximum limit of characters allowed";
alert(msg);
// Reached the Maximum length so trim the textarea
	my_form.my_text.value = my_form.my_text.value.substring(0, maxLen);
 }
else{ // Maximum length not reached so update the value of my_text counter
	my_form.text_num.value = maxLen - my_form.my_text.value.length;
}
}
</script>

<script language=JavaScript>
function check_length1(my_form)
{
maxLen = 200; // max number of characters input
if (my_form.my_text1.value.length >= maxLen) {
// Alert message if maximum limit is reached. 
// If required Alert can be removed. 
var msg = "You have reached your maximum limit of characters allowed";
alert(msg);
// Reached the Maximum length so trim the textarea
	my_form.my_text1.value = my_form.my_text1.value.substring(0, maxLen);
 }
else{ // Maximum length not reached so update the value of my_text counter
	my_form.text_num1.value = maxLen - my_form.my_text1.value.length;
}
}
</script>