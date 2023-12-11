
<div class="modal fade" id="delete_user<?php echo $id_pembayaran?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel" style="background-color:#304352; color:#fff">
						<div class="panel-heading">
							<center>Delete pembayaran</center>
						</div>    
					</div>
				</h4>
			</div>
																
			<div class="modal-body">
				Apa Kamu yakin akan menghapus pembayaran?
			</div>
									
			<div class="modal-footer">
				<a class="btn btn-danger" href="delete_pembayaran.php<?php echo '?id_pembayaran='.$id_pembayaran; ?>"><i class="icon-check"></i>&nbsp;Yes</a>
				<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
			</div>
		</div>
			
<!-- /.modal-content -->

	</div>
		
<!-- /.modal-dialog -->
	
</div>
