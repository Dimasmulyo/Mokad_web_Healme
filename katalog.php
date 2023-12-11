<?php include ('session.php');?>
<?php include ('head.php');?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Daftar Obat</h3>
					
                </div>
                </div>
				<?php if($_SESSION['ROLE'] == 'admin'): ?>
				<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah katalog</button>
				<?php include ('add_katalog_modal.php');?>
                <!-- /.col-lg-12 -->
				
				
				<hr/>
				<?php endif;?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel" style="margin-bottom:0; background-color:#304352; color:#fff">
													<div class="panel-heading">
														Daftar Obat
													</div>    
												</div>
											</h4>
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Obat</th>
                                            <th>Kandungan Obat</th>
                                            <th>Fungsi</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                           
                                            <?php if($_SESSION['ROLE'] == 'admin'): ?>
                                            <th>Action</th>
                                            <?php endif;?>
                                        </tr>
                                    </thead>
                                    <tbody>
									
                                        <tr>
										<?php 
											require 'dbcon.php';
											$bool = false;
                                            $no=1;
											$query = $conn->query("SELECT * FROM katalog ORDER BY katalog_id DESC");
												while($row = $query->fetch_array()){
													$katalog_id=$row['katalog_id'];
										?>
                                        <td><?php echo $no;$no++;?></td>
											<td ><img src="<?php echo $row['img']; ?>" width="100px" height="100px" class="img-rounded"></td>
                                            <td><?php echo $row ['nm_katalog'];?></td>
                                            <td width="20%"><?php echo $row ['kandungan'];?></td>
                                            <td width="30%"><?php echo $row ['deskripsi'];?></td>
                                            <td><?=number_format($row ['harga'], 0, ",", ".")?></td>
                                            <td><?php echo $row ['stok'];?></td>
                                            
                                            
                                            <td style="text-align:center">
											<?php if($_SESSION['ROLE'] == 'admin'): ?>
												 <a rel="tooltip"  title="Delete" id="<?php echo $katalog_id; ?>" href="#delete_user<?php echo $katalog_id; ?>" data-target="#delete_user<?php echo $katalog_id?>" data-toggle="modal"class="btn btn-danger btn-outline"><i class="fa fa-trash-o"></i> Delete</a>	
											 <?php include ('delete_katalog_modal.php'); ?>
												  <a rel="tooltip"  title="Edit" id="<?php echo $row['katalog_id'] ?>" href="#edit_katalog<?php echo $row['katalog_id'] ?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Edit</a>	
                                                  <?php endif;?>	
                                                  <?php if($_SESSION['ROLE'] != 'dokter'): ?>
                                                  <a rel="tooltip"  title="Cart" id="<?php echo $katalog_id; ?>" href="#myModal1<?php echo $katalog_id; ?>" data-target="#myModal1<?php echo $katalog_id?>" data-toggle="modal"class="btn btn-primary btn-outline"><i class="fa fa-shopping-cart"></i> Keranjang</a>	
                                                  <?php endif; ?> 
											</td><?php include ('add_transaksi_modal.php'); ?>
											    <?php 
													
													require 'edit_katalog_modal.php';
												?>
                                        </tr>
										
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
              
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

    <?php include ('script.php');?>

</body>

</html>

