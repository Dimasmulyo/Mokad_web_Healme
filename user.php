
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
                    <h3 class="page-header">Profil</h3>
					
                </div>
                </div>
				<?php if($_SESSION['ROLE'] == 'admin'): ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah user</button>
				<?php include ('add_user_modal.php');?>
                <!-- /.col-lg-12 -->
				
				
				<hr/>
				<?php endif;?>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel " style="margin-bottom:0; background-color:#304352; color:#fff">
													<div class="panel-heading">
														Data Profil
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
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>No Telp</th>
                                            <th>Username</th>
                                            <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'dokter'): ?>
                                            <th>Bidang</th>
                                            <th>Role</th>
                                            <?php endif; ?>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
                                        <tr>
										<?php
                                            if ($_SESSION['ROLE'] == "admin") {
                                        $query = "SELECT * FROM admins order by id desc";
                                        }else{
                                        $role = $_SESSION['ID'];
                                        $query = "SELECT * FROM admins WHERE id = '$role'";
                                        }
                                        $bool = false;
                                        
                                            $result = $con->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_array()) {
                                                $id=$row['id'];
                                        ?>	
											
											<td><img src="<?php echo $row ['foto'];?>" style="width:100px;"></td>
                                            <td><?php echo $row ['name'];?></td>
                                            <td><?php echo $row ['no_telp'];?></td>
                                            <td><?php echo $row ['username'];?></td>
                                            <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'dokter' ): ?>
                                            <td><?php echo $row ['bidang'];?></td>
                                            <td><?php echo $row ['role'];?></td>
                                            <?php endif; ?>
                                            
                                            <td style="text-align:center">
											<?php if($_SESSION['ROLE'] == 'admin'): ?>
                                            <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_user<?php echo $id; ?>" data-target="#delete_user<?php echo $id?>" data-toggle="modal"class="btn btn-danger btn-outline"><i class="fa fa-trash-o"></i> Delete</a>	
											 <?php include ('delete_user_modal.php'); ?>
                                             <?php endif; ?>
                                             <a rel="tooltip"  title="Edit" id="<?php echo $row['id'] ?>" href="#edit_user<?php echo $row['id'] ?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Edit</a>
												
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

