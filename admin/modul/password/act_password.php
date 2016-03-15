<?php  
include "../../../config/config.php";

$pass_baru=$_POST['pass_baru'];
$pass_ulangi=$_POST['pass_ulangi'];
$pass_lama=$_POST['pass_lama'];

$result="SELECT * FROM admin";
$query=mysqli_query($db,$result);
$data=mysqli_fetch_array($query);

if(empty($pass_lama) OR empty($pass_baru) OR empty($pass_ulangi)){
	echo "pass tidak boleh kosong!";
	echo "<a href='../../index.php?module=ganti_password'>Ulangi</a>";
}

	if($pass_lama=$data['password']){
		if($pass_baru==$pass_ulangi){
			mysqli_query($db,"UPDATE admin SET password='$pass_baru'");
			header('location:../../media.php');
		}
		else{
			echo "pass tidak bisa di ganti";
		}
	}
	else{
		echo "pass lama tidak sama";
	}

?>