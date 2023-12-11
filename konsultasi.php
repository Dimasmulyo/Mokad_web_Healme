
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
                    <h3 class="page-header">Daftar Dokter Konsultasi</h3>
					
                </div>
                </div>
			
                <!-- /.col-lg-12 -->
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel " style="margin-bottom:0; background-color:#304352; color:#fff">
													<div class="panel-heading">
														Dokter Konsultasi
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
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Bidang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
                                        <tr>
										<?php
                                        $no=1;
                                            if ($_SESSION['ROLE'] == "admin") {
                                        $query = "SELECT * FROM admins where role='dokter'";
                                        }else{
                                        $role = $_SESSION['ID'];
                                        $query = "SELECT * FROM admins WHERE role='dokter'";
                                        }
                                        $bool = false;
                                        
                                            $result = $con->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_array()) {
                                                $id=$row['id'];
                                        ?>	
											<td><?php echo $no;$no++;?></td>
											<td><img src="<?php echo $row ['foto'];?>" style="width:100px;"></td>
                                            
                                            <td><?php echo $row ['name'];?></td>
                                            <td><?php echo $row ['bidang'];?></td>
                                            <td style="text-align:center">
                                            <?php if($_SESSION['ROLE'] == 'admin'): ?>
                                            
											
                                            <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_user<?php echo $id; ?>" data-target="#delete_user<?php echo $id?>" data-toggle="modal"class="btn btn-danger btn-outline"><i class="fa fa-trash-o"></i> Delete</a>	
											 <?php include ('delete_user_modal.php'); ?>
                                             <a rel="tooltip"  title="Edit" id="<?php echo $row['id'] ?>" href="#edit_user<?php echo $row['id'] ?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Edit</a>
                                             <?php endif;?>
                                             <a rel="tooltip"  title="wa" href=" https://api.whatsapp.com/send?phone=<?php echo $row['no_telp'];?>" class="btn btn-warning"><i class="fa fa-paper-plane"></i> Chat</a>
											</td>
											    <?php include ('edit_user_modal.php');?>
                                        </tr>
										
                                        <?php }}else{
                                            echo "<h2>No record found!</h2>";
                                        } ?>
                                       
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
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    feather.replace();
</script>	
</body>
	
</html>

