
<?php
	if(!$bool){
?>

<div class="modal fade" id="lihat_pembayaran<?php  echo $id_pembayaran; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Lihat Bukti</center>
						</div>    
					</div>
				</h4>
			</div>
			
            <div class="modal-body">
			<?php if($_SESSION['ROLE'] == 'admin'): ?>
			<img src="<?php echo $row['resep'];?>" width="80%">
			<?php endif;
			if($row['file']=='-'){
				echo 'Bukti Bayar Belum diupload';
			
			}else{?>
			
			<img src="<?php echo $row['file'];?>" width="80%">
			<?php } ?>
			</div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
		</div>
	</div>
</div>
<!-- /.modal-content -->
								
<?php
	}
?>
