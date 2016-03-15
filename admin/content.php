<?php  
include "../config/config.php";
include "../config/paging.php";
include "../config/rupiah.php";

$query  = "SELECT * FROM admin";
$view	= mysqli_query($db,$query);
$data   = mysqli_fetch_array($view);

if(!isset($_GET['module'])=='home'){
	if($_SESSION['username']=='admin'){
		echo"
			<div class=row>
                <div class=col-lg-12>
                    <h1 class=page-header>Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>";
		echo "<h4>'Masa depan kita tergantung dengan apa yang sedang kita lakukan hari ini, do the 
		best for today!'<br><br> 'Tetap ingat, ketika mati apa yang akan di tinggal.'
		<br><br>'Terlihat berantakan sekali dirimu saat ini, perbaikilah..'
		<br><br>'Hari ini kerjakan apa yang kamu bisa kerjakan hari ini, jangan menunda2 karena hanya akan
		memperbanyak pekerjaan nantinya' ~04-03-16~</h4>";
	}
}
elseif($_GET['module']=='kategori'){
	if($_SESSION['username']=='admin'){
		include "modul/kategori/kategori.php";
	}
}
elseif($_GET['module']=='produk'){
	if($_SESSION['username']=='admin'){
		include "modul/produk/produk.php";
	}
}
elseif($_GET['module']=='ganti_password'){
	if($data['hak_akses']=='admin'){
		include "modul/password/password.php";
	}
}
else{
	if($_SESSION['username']){
	include "modul/selesai/selesai.php";
	}
}
?>