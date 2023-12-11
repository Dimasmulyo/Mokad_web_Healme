
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_katalog<?php  echo $katalog_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Edit katalog</center>
						</div>    
					</div>
				</h4>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="katalog_id" value="<?php echo $row['katalog_id'] ?>">
				
					<div class="form-group">
						<label>Nama katalog</label>
							<input class="form-control" type ="text" name = "nm_katalog" required="true" value = "<?php echo $row ['nm_katalog']?>">
					</div>
					<div class="form-group">
						<label>Harga</label>
							<input class="form-control"  type = "number" name = "harga" value = "<?php echo $row ['harga']?>" required="true">
					</div>
					<div class="form-group">
						<label>Kandungan</label>
						<textarea class="form-control" onKeyPress=check_length1(this.form); onKeyDown=check_length1(this.form); name=my_text1 rows=4 cols=30><?php echo $row ['kandungan'];?></textarea>
						<input size=1 value="<?php echo 200-strlen($row ['kandungan']);?>" name=text_num1 style="border:0px;" readonly>karakter tersisa.
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); name=my_text rows=4 cols=30><?php echo $row ['deskripsi'];?></textarea>
						<input size=1 value="<?php echo 200-strlen($row ['deskripsi']);?>" name=text_num style="border:0px;" readonly>karakter tersisa.
					</div>

					<div class="form-group">
						<label>Stok</label>
							<input class="form-control"  type = "number" name = "stok" value = "<?php echo $row ['stok']?>" required="true">
					</div>
					<div class="form-group">
									<label>Gambar</label><br>
									<i style="float: left;font-size: 11px;color: red">Mohon Upload Gambar</i><br>
									<input type="file" name="image" class="btn btn-default" required="true"/><br>
									
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
			$nm_katalog=$_POST['nm_katalog'];
			$harga=$_POST['harga'];
			$kandungan=$_POST['my_text1'];
			$deskripsi=$_POST['my_text'];
			$stok=$_POST['stok'];
			$katalog_id=$_POST['katalog_id'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
			$location="upload/" . $_FILES["image"]["name"];
		
	
			$conn->query("UPDATE katalog SET nm_katalog = '$nm_katalog', kandungan = '$kandungan', deskripsi = '$deskripsi', harga = '$harga', stok = '$stok',img='$location' WHERE katalog_id = '$katalog_id'")or die(mysql_error());
			echo "<script> window.location='katalog.php' </script>";
		}	
	?>
								
<?php
	}
?>
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