<?php 
session_start();
error_reporting();
if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
    header('location:login.php');
}
else{

?>
<?php include "../config/tanggal.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | iBelanja.com</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/iBelanja.png">

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS 
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    -->

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    iBelanja.
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li>Login : <?php echo $hari_ini.", ".tgl_indo(date('Y m d'))." | ".date('H:i:s')." "; ?>WIB</li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="media.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="?module=kategori"><i class="fa fa-sitemap fa-fw"></i> Kategori Produk</a>
                        </li>
                        <li>
                            <a href="?module=produk"><i class="fa fa-edit fa-fw"></i> Tambah produk</a>
                        </li>
                        <li><a href="#"><i class="fa fa-truck fa-fw"></i> Ongkos Kirim</a></li>
                        <li><a href="#"><i class="fa fa-shopping-basket fa-fw"></i> Order Masuk</a></li>
                        <li>
                            <a href="?module=ganti_password"><i class="fa fa-key fa-fw"></i> Ganti Password</a>
                        </li>                      
                        <li><a href="#"><i class="fa fa-cart-plus fa-fw"></i> Pesan Masuk</a></li>                     
                        <li><a href="#"><i class="fa fa-ship fa-fw"></i> Jasa Pengiriman</a></li>
                        <li><a href="#"><i class="fa fa-list-ul fa-fw"></i> Menu</a></li>
                        <li><a href="#"><i class="fa fa-list-alt fa-fw"></i> Sub Menu</a></li>
                        <li><a href="#"><i class="fa fa-file fa-fw"></i> Laporan Transaksi</a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag fa-fw"></i> Cara Belanja</a></li>
                        <li><a href="#"><i class="fa fa-info fa-fw"></i> About</a></li>
                        <li><a href="#"><i class="fa fa-image fa-fw"></i> Page Header</a></li>
                        <li><a href="#"><i class="fa fa-copyright fa-fw"></i>Footer</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
            <?php include "content.php"; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
<?php } ?>