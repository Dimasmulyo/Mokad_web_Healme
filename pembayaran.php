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
                    <h3 class="page-header">Daftar Pembayaran</h3>
					
                </div>
                </div>
                
                <?php 
                require 'dbcon.php';
                $result   = mysqli_query($conn, "SELECT * FROM admins WHERE role='admin'");
                $no_telp     = mysqli_fetch_assoc($result);
                ?>
                <a rel="tooltip"  title="wa" href="https://api.whatsapp.com/send?phone=<?php echo $no_telp['no_telp'];?>" class="btn btn-warning"><i class="fa fa-paper-plane"></i> Chat</a><br>
                <i style="float: left;font-size: 11px;color: red">Jika dalam 1x24 jam status pembayaran belum berubah silahkan chat admin</i><br>
                <hr/>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel" style="margin-bottom:0; background-color:#304352; color:#fff">
													<div class="panel-heading">
														Daftar Pembayaran
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
                                        <?php if($_SESSION['ROLE'] == 'admin'): ?>
                                            <th>Pengguna</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Update By</th>
                                            <?php endif;?>
                                            <th>Nama Obat</th>
                                            <th>Total</th>
                                            <th>Tanggal input</th>
                                            <th>Tanggal Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
                                        <tr>
										<?php 
											require 'dbcon.php';
											$bool = false;
                                            $no=1;
                                            $ses = $_SESSION['ID'];
                                            if($_SESSION['ROLE'] == 'admin'){
											$query = $conn->query("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");
                                            }else{
                                                $query = $conn->query("SELECT * FROM pembayaran where id_user='$ses' ORDER BY id_pembayaran DESC");
                                            }
												while($row = $query->fetch_array()){
													$id_pembayaran=$row['id_pembayaran'];
                                                    $id=$row['id_user'];
										?>
                                        <td><?php echo $no;$no++;?></td>
                                        <?php if($_SESSION['ROLE'] == 'admin'): ?>
                                        <td><?php 
                                        $result   = mysqli_query($conn, "SELECT * FROM admins WHERE id = '$id'");
                                        $data     = mysqli_fetch_assoc($result);
                                        echo $data ['name'];?></td>
                                        <td><?php echo $data ['no_telp'];?></td>
                                        <td><?php echo $data ['alamat'];?></td>
                                        <td>
                                        <?php if($row['status']=='Check Out'){?>
                                        <form method = "post" enctype = "multipart/form-data">	
                                        <div class="form-group">
                                            <select class = "form-control" name = "status">
                                                    <option>Setujui</option>
                                                    <option>Tidak Disetujui</option>
                                                </select>
                                        </div>	<br><br>
                                        <button name = "upload" type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Konfirmasi</button>
                                        </form>
                                        <?php 
                                        require_once 'dbcon.php';
                                        if (isset ($_POST ['upload'])){
                                            $status=$_POST['status'];
                                        $conn->query("UPDATE pembayaran SET status = '$status', update_by='$ses' WHERE id_pembayaran = '$id_pembayaran'")or die(mysql_error());
                                        echo "<script> window.location='pembayaran.php' </script>";
                                        }
                                        }else{
                                            echo $row['status'];
                                        }?>
                                        
                                        </td>
                                        <td><?php 
                                        if($row['update_by']=='-'){
                                            echo $row['update_by'];
                                        }else{
                                            $nomor=$row['update_by'];
                                            $result   = mysqli_query($conn, "SELECT * FROM admins WHERE id = '$nomor'");
                                            $data1     = mysqli_fetch_assoc($result);
                                            echo $data1 ['name'];
                                        }?>
                                        </td>	
                                        <?php endif;?>
                                            <td><?php echo $row ['obat'];?></td>

                                            <td><?=number_format($row ['total'], 0, ",", ".")?></td>
                                            
                                            <td><?php echo $row ['tgl_input'];?></td>	
                                            <td><?php 
                                            if($row ['tgl_update']==$row ['tgl_input']){
                                                echo "--";
                                            }else{
                                                echo $row ['tgl_update'];
                                            }?></td>
                                            
                                            <td style="text-align:center">
                                            <?php if($_SESSION['ROLE'] == 'admin'): ?>
                                            <a rel="tooltip"  title="Delete" id="<?php echo $id_pembayaran; ?>" href="#delete_user<?php echo $id_pembayaran; ?>" data-target="#delete_user<?php echo $id_pembayaran?>" data-toggle="modal"class="btn btn-danger btn-outline"><i class="fa fa-trash-o"></i> Delete</a>	
											 <?php include ('delete_pembayaran_modal.php');
                                             if($row['resep']!='-') {?>
                                             <a rel="tooltip"  title="Edit" id="<?php echo $row['id_pembayaran'] ?>" href="#lihat_pembayaran<?php echo $row['id_pembayaran'] ?>"  data-toggle="modal"class="btn btn-primary btn-outline"><i class="fa fa-pencil"></i> Lihat Bukti</a>	
                                                <?php }else{?>
                                                    <br><div class="aleart alear-warning">Pengguna ini belum mengupload resep.</div>
                                            <?php } endif;?>
                                            
											<?php 
                                            if($_SESSION['ROLE'] != 'admin'):
                                                if($row ['file']=='-'){?>
                                                <?php if($row ['status']=='Setujui'){?>
                                            <a rel="tooltip"  title="Edit" id="<?php echo $row['id_pembayaran'] ?>" href="#edit_pembayaran<?php echo $row['id_pembayaran'] ?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Upload Bukti</a>	
												 <?php }else if($row ['status']=='Tidak disetujui'){
                                                    echo "Mohon maaf resep obat anda tidak disetujui";
                                                 }
                                                 else{?>
                                            Mohon maaf obat yang anda beli belum disetujui
                                            <?php }?>
                                            <?php }else{?>
                                                
												  <a rel="tooltip"  title="Edit" id="<?php echo $row['id_pembayaran'] ?>" href="#lihat_pembayaran<?php echo $row['id_pembayaran'] ?>"  data-toggle="modal"class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Lihat Bukti</a>	
                                                  <?php }
                                                  endif;?>
                                            
											</td>
													
											    <?php 
													require 'lihat_pembayaran_modal.php';
													require 'edit_pembayaran_modal.php';
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

