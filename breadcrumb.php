<?php 
include "config/config.php";

if($_GET['act']=="cart"){
	echo "<li><a href='index.php'>Home</a></li>
          <li class='active'>Cart</li>";
}
elseif($_GET['act']=="checkout"){
	echo "<li><a href='index.php'>Home</a></li>
          <li class='active'>Checkout</li>";
}
elseif($_GET['act']=="selesai"){
	echo "<li><a href='index.php'>Home</a></li>
          <li class='active'>Selesai belanja</li>";
}
elseif ($_GET['act']=="detail_product") {
	$query= mysqli_query($db,"SELECT * FROM produk,kategori_produk WHERE 
		    kategori_produk.id_kategori=produk.id_kategori AND id_produk='$_GET[id]'");
	$data = mysqli_fetch_array($query);
	echo "<li><a href='index.php'>Home</a></li>
		  <li><a href='#'>$data[kategori]</a></li>
          <li class='active'>$data[nama_produk]</li>";
}
elseif ($_GET['act']=="kategori") {
	$query= mysqli_query($db,"SELECT * FROM kategori_produk WHERE id_kategori='$_GET[id]'");
	$data = mysqli_fetch_array($query);
	echo "<li><a href='index.php'>Home</a></li>
		  <li class='active'>$data[kategori]</li>";
}


?>