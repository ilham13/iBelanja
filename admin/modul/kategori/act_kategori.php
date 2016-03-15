<?php  
include "../../../config/config.php";

$module = $_GET['module'];
$id     = $_GET['id'];
$act    = $_GET['act'];

if($module=='kategori' AND $act=='tambah'){
	mysqli_query($db,"INSERT INTO kategori_produk (kategori) VALUES ('$_POST[kategori]')");
	header('location:../../media.php?module='.$module);
}
elseif($module=='kategori' AND $act=='delete'){
	mysqli_query($db,"DELETE FROM kategori_produk WHERE id_kategori='$id'");
	header('location:../../media.php?module='.$module);
}	
elseif($module=='kategori' AND $act=='update'){
	$query=mysqli_query($db,"UPDATE kategori_produk SET kategori='$_POST[kategori]' WHERE id_kategori='$id'");
	if($query){
		header('location:../../media.php?module='.$module);
	}
	else{
		echo "gagal update";
	}
}

?>