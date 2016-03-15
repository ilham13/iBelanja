<?php 
include "../../../config/config.php";
include "../../../config/seo.php";
include "../../../config/upload.php";
include "../../../config/tanggal.php";

$module=$_GET['module'];
$act=$_GET['act'];
$id=$_GET['id'];

if($module=='produk' AND $act=='tambah'){
	$nama_file	=	$_FILES['fupload']['name'];
	$type		=	$_FILES['fupload']['type'];
	$lokasi		=	$_FILES['fupload']['tmp_name'];
	$error		=	$_FILES['fupload']['error'];
	$acak		=	rand(1,99);
	$re_name_file = $acak.$nama_file;
	$produk_seo	=	seo_title($_POST['produk']);

	if(!empty($lokasi)){
		UploadImage($re_name_file);

		mysqli_query($db,"INSERT INTO produk(nama_produk,
											 id_kategori,
											 diskon,
											 stok,
											 deskripsi,
											 harga,
											 slug,
											 tgl_posting,
											 berat,
											 gambar)
							VALUES 
											 ('$_POST[produk]',
											  '$_POST[kategori]',
											  '$_POST[diskon]',
											  '$_POST[stock]',
											  '$_POST[deskripsi]',
											  '$_POST[harga]',
											  '$produk_seo',
											  '$tgl_sekarang',
											  '$_POST[berat]',
											  '$re_name_file')");
		header('location:../../media.php?module='.$module);
	}
	else{
		mysqli_query($db,"INSERT INTO produk(nama_produk,
											 id_kategori,
											 diskon,
											 stok,
											 deskripsi,
											 harga,
											 slug,
											 tgl_posting,
											 berat)
							VALUES 
											 ('$_POST[produk]',
											  '$_POST[kategori]',
											  '$_POST[diskon]',
											  '$_POST[stok]',
											  '$_POST[deskripsi]',
											  '$_POST[harga]',
											  '$produk_seo',
											  '$tgl_sekarang',
											  '$_POST[berat]')");
		header('location:../../media.php?module='.$module);
	}
}

elseif($module=='produk' AND $act=='update'){
	$nama_file	=	$_FILES['fupload']['name'];
	$type		=	$_FILES['fupload']['type'];
	$lokasi		=	$_FILES['fupload']['tmp_name'];
	$error		=	$_FILES['fupload']['error'];
	$acak		=	rand(1,99);
	$re_name_file = $acak.$nama_file;
	$produk_seo	=	seo_title($_POST['produk']);

	if(!empty($lokasi)){
		UploadImage($re_name_file);

		mysqli_query($db,"UPDATE produk SET  nama_produk	=	'$_POST[produk]',
											 id_kategori	=	'$_POST[kategori]',
											 diskon			=	'$_POST[diskon]',
											 stok			=	'$_POST[stock]',
											 deskripsi		=	'$_POST[deskripsi]',
											 harga			=	'$_POST[harga]',
											 slug			=	'$produk_seo',
											 tgl_posting	=	'$tgl_sekarang',
											 berat			=	'$_POST[berat]',
											 gambar			=	'$re_name_file'
											 WHERE id_produk=   '$id'");
		header('location:../../media.php?module='.$module);
	}
	else{
		mysqli_query($db,"UPDATE produk SET  nama_produk	=	'$_POST[produk]',
											 id_kategori	=	'$_POST[kategori]',
											 diskon			=	'$_POST[diskon]',
											 stok			=	'$_POST[stock]',
											 deskripsi		=	'$_POST[deskripsi]',
											 harga			=	'$_POST[harga]',
											 slug			=	'$produk_seo',
											 tgl_posting	=	'$tgl_sekarang',
											 berat			=	'$_POST[berat]'
											 WHERE id_produk=   '$id'");						
		header('location:../../media.php?module='.$module);
	}
}
elseif($module=="produk" AND $act=="delete"){
	mysqli_query($db,"DELETE FROM produk WHERE id_produk='$id'");
	header('location:../../media.php?module='.$module);
}


?>
