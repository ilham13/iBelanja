<?php  

$db=mysqli_connect('localhost','root','','ibelanja');

if(!$db){
	die('gagal koneksi database'.mysqli_connect_error());
}
?>