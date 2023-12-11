<?php include ('session.php');?>
<?php include ('head.php');?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Transaksi</h3>
                </div>
				</div>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel" style="margin-bottom:0; background-color:#304352; color:#fff">
													<div class="panel-heading">
														Transaksi
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
                                            <th>Katalog</th>
                                            <th>Harga</th>
                                            <th width="75px">Jml Beli</th>
                                            <th>Total</th>
                                            <th>Update at</th>
                                            <th width="125px">Update By</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
                                        <tr>
										<?php 
											require 'dbcon.php';
											$bool = false;
                                            $no=1;
                                            $ses = $_SESSION['ID'];
											$query = $conn->query("SELECT * FROM transaksi where id_user='$ses' and status_byr='Belum Bayar'");
                                            $ttl_keseluruhan=0;
												while($row = $query->fetch_array()){
													$id_transaksi=$row['id_transaksi'];
										?>
                                        <td><?php echo $no;$no++;?></td>
                                            <td><?php echo $row ['nm_katalog'];?></td>
                                            <td><?=number_format($row ['harga'], 0, ",", ".")?></td>
                                            <td><?=number_format($row ['jml_beli'], 0, ",", ".")?></td>
                                            <td><?=number_format($row ['total'], 0, ",", ".")?></td>
                                            <td><?php echo $row ['update_at'];?></td>
                                            <td><?php echo $row ['update_by'];?></td>
											<td><a rel="tooltip"  title="Delete" id="<?php echo $id_transaksi; ?>" href="#delete_user<?php echo $id_transaksi; ?>" data-target="#delete_user<?php echo $id_transaksi?>" data-toggle="modal"class="btn btn-danger btn-outline"><i class="fa fa-trash-o"></i> Delete</a>	
                                        <?php include ('delete_transaksi_modal.php'); ?>
                                             <a rel="tooltip"  title="Edit" id="<?php echo $row['id_transaksi'] ?>" href="#edit_transaksi<?php echo $row['id_transaksi'] ?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Edit</a>	
                                                </td>
                                                <?php 
                                               require 'edit_transaksi_modal.php';
                                           ?>
                                        </tr><?php 
                                    $ttl_keseluruhan = $ttl_keseluruhan + $row ['total']; }?>
                                        <tr>
                                        <td colspan="4">Total yang harus dibayar</td>
                                        <td colspan="5"><?php
                                        echo number_format($ttl_keseluruhan, 0, ",", ".")?>
                                        </td>
										</tr>
                                        <tr>
                                        <td colspan="4">Pembayaran</td>
                                        <td colspan="5">
                                         <?php 
                                         require 'dbcon.php';
                                         $no=1;
                                         $sql    = "SELECT * FROM transaksi where id_user='$ses' and status_byr='Belum Bayar'";
                                        $result = mysqli_query($conn, $sql);
                                        while($ruw = mysqli_fetch_assoc($result)) {
                                            $id[$no] = $ruw['nm_katalog'].' {'.$ruw['jml_beli'].'}';
                                            $no++;
                                        };?>
                                        <form method = "post" enctype = "multipart/form-data">	
                                        <div class="form-group">
                                            <label>Resep Obat</label><br>
                                            <input type="file" name="image" class="btn btn-default" required="true"/><i style="float: left;font-size: 11px;color: red">Mohon Upload Resep Obat</i><br>
                                        </div>
                                        <button name = "tambah" type="submit" class="btn btn-primary">Check out</button>
                                        </form>
                                        <?php
                                        require_once 'dbcon.php';
                                        if (isset ($_POST ['tambah'])){
                                        $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                        $image_name= addslashes($_FILES['image']['name']);
                                        $image_size= getimagesize($_FILES['image']['tmp_name']);
                                        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
                                        $location="upload/" . $_FILES["image"]["name"];
                                        $isi = implode(", ",$id); 
                                        $conn->query("UPDATE transaksi SET status_byr = 'Bayar' WHERE id_user = '$ses' and status_byr = 'Belum Bayar'");
                                        $conn->query("INSERT INTO pembayaran(id_user,obat,total,file,resep,update_by,status)values('$ses','$isi','$ttl_keseluruhan','-','$location','-','Check Out')")or die(mysql_error());
                                        echo "<script> window.location='pembayaran.php' </script>";

                                        }
                                            ?>

                                            
                                        </td>
										</tr>
                                       
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

