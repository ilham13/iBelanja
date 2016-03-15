<?php  
session_start();

include "config/config.php";
include "config/tanggal.php";

$act=$_GET['act'];

if($act=="add"){
	$ids       = session_id();
	$produk    = mysqli_query($db,"SELECT stok FROM produk WHERE id_produk='$_GET[id]'");
	$data      = mysqli_fetch_array($produk);
	$stock     = $data['stok'];

	if($stock==0){
		echo "stock habis!";
	}
	else{
		$cart = mysqli_query($db,"SELECT * FROM cart WHERE id_produk='$_GET[id]' AND id_session='$ids'");
		$icart= mysqli_num_rows($cart);

		if($icart==0){
			mysqli_query($db,"INSERT INTO cart (id_produk,id_session,jumlah,tgl_orders,jam_orders,stock_orders)
							  VALUES ('$_GET[id]','$ids',1,'$tgl_sekarang','$jam_sekarang','$stock')");
		}
		else{
			mysqli_query($db,"UPDATE cart SET jumlah=jumlah+1 WHERE id_session='$ids' AND id_produk='$_GET[id]'");
		}
	deleteCart();
	header('location:page.php?act=cart');
	}
}
elseif($_GET['act']=="del"){
	mysqli_query($db,"DELETE FROM cart WHERE id_orders='$_GET[id]'");
	header('location:page.php?act=cart');
}
elseif($_GET['act']=="update"){
	$id       = $_POST['id'];
	$jml_data = count($id);
	$jumlah   = $_POST['jumlah'];
	for($i=1;$i<=$jml_data;$i++){
		$stok = mysqli_query($db,"SELECT stock_orders FROM cart WHERE id_orders='$id[$i]'");
		while($data=mysqli_fetch_array($stok)){
			if($jumlah[$i]>$data['stock_orders']){
				echo "<script>window.alert('Jumlah melebihi stok yang tersedia');
					  window.location=('cart.php')</script>";
			}
			elseif($jumlah[$i]==0){
				echo "<script>window.alert('tidak boleh kosong.');
					  window.location=('cart.php')</script>";
			}
			else{
				mysqli_query($db,"UPDATE cart SET jumlah='$jumlah[$i]' WHERE id_orders='$id[$i]'");
				header('location:page.php?act=cart');
			}
		}
	} 
}

/*
	Delete all cart entries older than one day
*/
function deleteCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysqli_query($db,"DELETE FROM cart WHERE tgl_orders < '$kemarin'");
}

?>