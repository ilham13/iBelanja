<?php  
include "../config/config.php";

function antiinjection($data){
	$filter_sql=mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}

$user=$_POST['username'];
$pass=$_POST['password'];

$query="SELECT * FROM admin WHERE username='$user' AND password='$pass'";

$login	=	mysqli_query($db,$query);
$ketemu	=	mysqli_num_rows($login);
$r 		=	mysqli_fetch_array($login);

if($ketemu){
	session_start();
	$_SESSION['username']   = $r['username'];
	$_SESSION['password']   = $r['password'];

	header("location:media.php?module=kategori");
}
else{
	header("location:index.php?notif=gagal");
}
?>