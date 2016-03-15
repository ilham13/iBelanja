<?php 
session_start();
include "config/config.php"; 
include "config/rupiah.php"; 
include "config/paging.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iBelanja.com</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/iBelanja.png">



    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="assets/css/shop.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">iBelanja.</a>
            </div>
            
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Store</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li><a href="page.php?act=cart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" action='page.php?act=cari' method='get'>
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name='kata'>
                    </div>
                    <button type="submit" class="btn btn-default"><span class="fa fa-search fa-fw"></span></button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <div class="intro-header" style="background-image: url('assets/img/slider/745.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>iBelanja.</h1>
                        <hr class="small">
                        <span class="subheading">Belanja Onlinenya Indonesia</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Lates product -->
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                    <p class="lead lates">Latest Product</p>
                    </div>
                
                <?php 

                $paging = new paging2;
                $batas  = 8;
                $start  = $paging->cariposisi($batas);

                $query=mysqli_query($db,"SELECT * FROM produk ORDER BY id_produk DESC LIMIT $start,$batas");
                while($data=mysqli_fetch_array($query)){

                $harga=rupiah($data['harga']);
                $diskon=($data['diskon']/100)*$data['harga'];
                $harga_diskon=number_format(($data['harga']-$diskon),2,",",".");
                $stock=$data['stok'];

                $beli="<a href='cart.php?act=add&id=$data[id_produk]' class='btn btn-primary btn-xs'>Beli!</a>";
                $habis="<a href='#' class='btn btn-success btn-xs'>Stock Habis</a>";
                $detail = "<a href='page.php?act=detail_product&id=$data[id_produk]' class='btn btn-default btn-xs'>Detail</a>";

                if($stock != "0"){
                    $btn=$beli;
                }
                else{
                    $btn=$habis;
                }

                $dis=$data['diskon'];
                $harga_tetap="<h5 class='text-center'>Rp. $harga_diskon</h5>";
                $harga_dis="<h5 class='text-center text-muted' style='text-decoration:line-through;'>Rp. $harga</h5>
                            <h5 class='text-center'>Rp. $harga_diskon</h5>";

                if($dis != "0"){
                    $harga_asli=$harga_dis;
                }
                else{
                    $harga_asli=$harga_tetap;
                }
                ?>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail pro">
                            <img src="assets/img/product/<?php echo $data['gambar']; ?>" alt="">
                            <div class="caption">
                                <h5 class="text-center"><a href="#"><?php echo $data['nama_produk']; ?></a></h5>
                                <?php echo $harga_asli; ?>   
                                <div class="tombol">
                                <?php echo $btn; ?> 
                                <?php echo $detail; ?>
                                </div>
                            </div>                    
                        </div>
                    </div>

                <?php } ?>

                </div><!--row-->

                <?php  
                $jumlahdata=mysqli_num_rows(mysqli_query($db,"SELECT * FROM produk"));
                $jumlah_hal=$paging->jumlahhalaman($jumlahdata,$batas);
                $link_hal  =$paging->navhalaman($_GET['hal'],$jumlah_hal);
                ?>
                <!--pagination-->
                <div class="row">
                    <div class="col-md-6 col-md-offset-5">
                          <ul class="pagination text-center">
                            <?php echo $link_hal; ?>
                          </ul>
                    </div>
                </div>
                <!--pagination-->


            </div><!--col-md-12-->

        </div><!--row-->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <hr>
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Jl Raya Puncak Tugu Selatan, Cisarua-Bogor<br>Jawa barat-Indonesia.</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>kebijakan & Privasi</h3>
                        <ul class="list-group">
                            <li class="list-unstyled">
                                <a href="#" class="btn-social btn-outline">Cara belanja.</a>
                            </li>
                            <li class="list-unstyled">
                                <a href="#" class="btn-social btn-outline">Syarat & ketentuan.</a>
                            </li>
                            <li class="list-unstyled">
                                <a href="#" class="btn-social btn-outline">Testimonial.</a>
                            </li>
                            <li class="list-unstyled">
                                <a href="#" class="btn-social btn-outline">Kebijakan & Privasi.</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Us</h3>
                        <p>Best shop online adventure terpercaya di Indonesia dengan berbagai macam brand lokal maupun luar negeri.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline">Facebook.</a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline">Twitter.</a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline">Intagram.</a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline">Youtube.</a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline">Gmail.</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        Copyright &copy; iBelanja.com 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>



</body>

</html>
