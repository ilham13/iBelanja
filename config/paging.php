<?php  
class paging{
	function cariposisi($batas){
		if(empty($_GET['halaman'])){
			$posisi=0;
			$_GET['halaman']=1;
		}
		else{
			$posisi=($_GET['halaman']-1)*$batas;
		}
	return $posisi;
	}

	function jumlahhalaman($jumlahdata,$batas){
		$jumlahhalaman=ceil($jumlahdata/$batas);
		return $jumlahhalaman;
	}

	function navhalaman($halaman_aktif,$jumlahhalaman){
		$link_halaman=" ";

		for($i=1;$i<=$jumlahhalaman;$i++){
			if($i==$halaman_aktif){
				$link_halaman .= "<li class='active'><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
			}
			else{
				$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
			}
			$link_halaman .= " ";
		}
		return $link_halaman;
	}
}
class paging2{
	function cariposisi($batas){
		if(empty($_GET['hal'])){
			$posisi=0;
			$_GET['hal']=1;
		}
		else{
			$posisi=($_GET['hal']-1)*$batas;
		}
	return $posisi;
	}

	function jumlahhalaman($jumlahdata,$batas){
		$jumlahhalaman=ceil($jumlahdata/$batas);
		return $jumlahhalaman;
	}

	function navhalaman($halaman_aktif,$jumlahhalaman){
		$link_halaman=" ";

		for($i=1;$i<=$jumlahhalaman;$i++){
			if($i==$halaman_aktif){
				$link_halaman .= "<li class='active'><a href=$_SERVER[PHP_SELF]?hal=$i>$i</a></li>";
			}
			else{
				$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?hal=$i>$i</a></li>";
			}
			$link_halaman .= " ";
		}
		return $link_halaman;
	}
}
?>