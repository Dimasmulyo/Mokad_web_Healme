
<?php

session_start();
// Include database connection file
include_once('dbcon.php');

if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}
?>
<?php include ('head.php');?>
<script src="js/Chart.js"></script>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                </div>
				<hr/>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
						
						
					<h4 class = "alert alert-success">Hi, <?php echo ucwords($_SESSION['NAME']); ?></h4>
			</div>
            
            
            
            <div class="container" style="width:100%">
                        
            
            
                            <div class="panel-body">
                            <table width="100%">
                                <tr>
                                    <td style="padding:1%;width: 25%;">
                                        <div class="alert alert-success">
                                        <i class="fa fa-user-md fa-3x"> 
                                            <?php
                                        $check3 = $conn->query("SELECT count(*) as jumlah FROM admins where role='dokter'");
                                                $rew = $check3->fetch_assoc();
                                                echo $rew['jumlah']; ?></i>
                                        <h3>Dokter</h3>
                                        <br>
                                            

                                        </div>
                                    </td>
                                    <td style="padding:1%;width: 25%;">
                                        <div class="alert alert-danger">
                                        <i class="fa fa-medkit fa-3x"> 
                                            <?php
                                        $check3 = $conn->query("SELECT count(*) as jumlah FROM katalog ");
                                                $rew = $check3->fetch_assoc();
                                                echo $rew['jumlah']; ?></i>
                                        <h3>Obat-Obatan</h3>
                                        <br> 
                                        </div>
                                    </td>
                                    <td style="padding:1%;width: 25%;">
                                        <div class="alert alert-warning">
                                        <i class="fa fa-shopping-cart fa-3x"> 
                                            <?php
                                            $ses=$_SESSION['ID'];
                                        $check3 = $conn->query("SELECT count(*) as jumlah FROM transaksi where id_user='$ses'");
                                                $rew = $check3->fetch_assoc();
                                                echo $rew['jumlah']; ?></i>
                                        <h3>Item Keranjang</h3>
                                        <br>
                                        </div>
                                    </td>
                                    <td style="padding:1%;width: 25%;">
                                        <div class="alert alert-info">
                                        <i class="fa fa-file fa-3x"> 
                                            <?php
                                            $ses=$_SESSION['ID'];
                                        $check3 = $conn->query("SELECT count(*) as jumlah FROM pembayaran where id_user='$ses'");
                                                $rew = $check3->fetch_assoc();
                                                echo $rew['jumlah']; ?></i>
                                        <h3>History Beli</h3>
                                        <br>
                                        </div>
                                    </td>
                                    
                                </tr>
                            </table>
                                
                            
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

