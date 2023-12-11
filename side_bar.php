<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0; background-color:#304352;">
<style>
.notification {
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: 5px;
  right: 0px;
  padding: 3px 5px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="" style = "color:white;"><i class = "fa fa-h-square fa-large" > </i> Healme</a>
				
            </div>
      

            <ul class="nav navbar-top-links navbar-right">
            <li>
                                <a class="nav-link notification" href="transaksi.php">
                                    <span><i class = "fa fa-shopping-cart" ></i> </span>
                                    
                                        <?php 
                                        $is = $_SESSION['ID'];
                                                $check3 = $conn->query("SELECT count(*) as jumlah FROM transaksi WHERE id_user='$is' and status_byr='Belum Bayar'");
                                                $rew = $check3->fetch_assoc();
                                                if($rew['jumlah']>0){?>
                                                   <span class="badge"><?php echo $rew['jumlah']; 
                                                }?>
                                                </span></a>
                                </li>
                <li style="color:white">|</li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style = "color: white">
					<i class="fa fa-cog fa-spin fa-fw"></i>Hi, <?php echo ucwords($_SESSION['NAME']); ?></a>
                          
                    </a>
                   
                
                </li>
           
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                    <li>
                            <a href="canvassing.php"><i class="fa fa-download fa-fw"></i> Beranda</a>
                        </li>
                        <?php if($_SESSION['ROLE'] != 'dokter'): ?>
                                <li>
                                    <a href="konsultasi.php"><i class = "fa fa-wechat fa-fw"></i> Konsultasi Dokter</a>
                                </li>
                                <?php endif; ?> 
                                <li>
                                    <a href="katalog.php"><i class = "fa fa-medkit fa-fw"></i> Obat</a>
                                </li>
                                <?php if($_SESSION['ROLE'] != 'dokter'): ?>
                                <li>
                                    <a href="pembayaran.php"><i class = "fa fa-money fa-fw"></i> Pembayaran</a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="user.php"> <i class = "fa fa-users" ></i> Profil</a>
                                </li>
                                <li>
                                <a class="nav-link" href="logout.php"><i class = "fa fa-sign-out" ></i> Log out</a>
                                </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>