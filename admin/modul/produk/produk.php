<?php  

$aksi="modul/produk/act_produk.php";

if(!isset($_GET['act'])){
	echo "

<div class='row'>
	<div class='col-lg-12'>
		<h1 class='page-header'>Produk</h1>
	</div>
	<div class='col-md-12'>
	<a href='?module=produk&act=tambah' class='btn btn-primary'>
	<span class='fa fa-edit fa-fw'></span>Tambah Produk</a><br><br>
	<table class='table table-bordered table-hover'>
		<tr class='active'>
			<th class='text-center'>No</th>
			<th class='text-center'>Nama Produk</th>
			<th class='text-center'>Diskon</th>
			<th class='text-center'>Stok</th>
			<th class='text-center'>Harga</th>
			<th class='text-center'>Tanggal Posting</th>
			<th class='text-center'>Action</th>
		</tr>";

		$paging = new paging;
		$batas  = 5;
		$start  = $paging->cariposisi($batas);
		$query  = mysqli_query($db,"SELECT * FROM produk LIMIT $start,$batas");

		$no=$start+1;
		while($data  = mysqli_fetch_array($query)){
		$harga   = rupiah($data['harga']);
		$tanggal = tgl_indo($data['tgl_posting']); 		

	echo "
		<tr>
			<td class='text-center'>$no</td>
			<td class='text-center'>$data[nama_produk]</td>
			<td class='text-center'>$data[diskon]%</td>
			<td class='text-center'>$data[stok]</td>
			<td class='text-center'>Rp. $harga</td>
			<td class='text-center'>$tanggal</td>
			<td class='text-center'>
				<a href='?module=produk&act=update&id=$data[id_produk]' class='btn btn-primary'>Update</a>
				<a href='$aksi?module=produk&act=delete&id=$data[id_produk]' class='btn btn-default'>Delete</a>
			</td>
		</tr>";
		$no++;
		}
	echo "
	</table>";

	$jumlahdata=mysqli_num_rows(mysqli_query($db,"SELECT * FROM produk"));
	$jumlah_hal=$paging->jumlahhalaman($jumlahdata,$batas);
	$link_hal  =$paging->navhalaman($_GET['halaman'],$jumlah_hal);

	echo "
	</div>
		<div class='col-md-4 col-md-offset-4'>
			<ul class='pagination'>
				$link_hal
			</ul>
		</div>
</div>";
}
else{ 
	// tambah produk
	if($_GET['act']=="tambah"){

		echo "
<div class='row'>
	<div class='col-md-12'>
		<h1 class='page-header'>Tambah Produk</h1>
	</div>
	<div class='col-md-12'>
	  <div class='row'>
		<form method='POST' action='$aksi?module=produk&act=tambah' enctype='multipart/form-data'>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='produk'>Nama Produk</label>
				<input type='text' name='produk' class='form-control'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='kategori'>Kategori</label>
				<select name='kategori' class='form-control'>
				<option value='0'>-Pilih Kategori-</option>";
	$query=mysqli_query($db,"SELECT * FROM kategori_produk ORDER BY kategori");
	while($data=mysqli_fetch_array($query)){
			echo "<option value=$data[id_kategori]>$data[kategori]</option>";
				}
		echo"	</select>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='diskon'>Diskon</label>
				<input type='text' name='diskon' class='form-control'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='stock'>Stock</label>
				<input type='text' name='stock' class='form-control'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='harga'>Harga</label>
				<input type='text' name='harga' class='form-control'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='berat'>Berat</label>
				<input type='text' name='berat' class='form-control'>
			</div>
		  </div>
		  <div class='col-md-12'>
			<div class='form-group'>
				<label for='deskripsi'>Deskripsi</label>
				<textarea name='deskripsi' cols='30' rows='10' class='form-control'></textarea>
			</div>
		  </div>
		  <div class='col-md-3'>
			<div class='form-group'>
				<label for='file'>Gambar Produk</label>
				<input type='file' name='fupload' class='form-control'>
			</div>
		  </div>
		  
		  <div class='col-md-12'>
			<input type='submit' class='btn btn-primary' value='Tambah'>
			<a href='media.php?module=produk' class='btn btn-default' >Batal</a>
		  </div>
		</form>
	   </div>
	</div>
</div><br><br><br><br>";
	}

	//update produk
	elseif($_GET['act']=="update"){
		echo "

<div class='row'>
	<div class='col-md-12'>
		<h1 class='page-header'>Update Produk</h1>
	</div>
	<div class='col-md-12'>
	  <div class='row'>
		<form method='POST' action='$aksi?module=produk&act=update&id=$_GET[id]' enctype='multipart/form-data'>
		  <div class='col-md-6'>";

		  $query = mysqli_query($db,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
		  $update  = mysqli_fetch_array($query);


		 echo "
			<div class='form-group'>
				<label for='produk'>Nama Produk</label>
				<input type='text' name='produk' class='form-control' value='$update[nama_produk]'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='kategori'>Kategori</label>
				<select name='kategori' class='form-control'>";
	$query=mysqli_query($db,"SELECT * FROM kategori_produk ORDER BY kategori");
	if($update['kategori']==0){
			echo "<option value=0 selected>-Pilih Kategori-</option>";
		}
	while($data=mysqli_fetch_array($query)){

		if($update['id_kategori']==$data['id_kategori']){
			echo "<option value=$data[id_kategori] selected>$data[kategori]</option>";
		}
		else{
			echo "<option value=$data[id_kategori]>$data[kategori]</option>";
		}
	}
		echo"	</select>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='diskon'>Diskon</label>
				<input type='text' name='diskon' class='form-control' value='$update[diskon]'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='stock'>Stock</label>
				<input type='text' name='stock' class='form-control' value='$update[stok]'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='harga'>Harga</label>
				<input type='text' name='harga' class='form-control' value='$update[harga]'>
			</div>
		  </div>
		  <div class='col-md-6'>
			<div class='form-group'>
				<label for='berat'>Berat</label>
				<input type='text' name='berat' class='form-control' value='$update[berat]'>
			</div>
		  </div>
		  <div class='col-md-12'>
			<div class='form-group'>
				<label for='deskripsi'>Deskripsi</label>
				<textarea name='deskripsi' cols='30' rows='10' class='form-control'>$update[deskripsi]</textarea>
			</div>
		  </div>
		  <div class='col-md-3'>
			<div class='form-group'>
				<label for='fupload'> Ganti Gambar Produk</label>
				<img src='../img/product/$update[gambar]' width='100' height='100'>
				<input type='file' name='fupload' class='form-control'>
			</div>
		  </div>
		  
		  <div class='col-md-12'>
			<input type='submit' class='btn btn-primary' value='Update'>
			<a href='media.php?module=produk' class='btn btn-default' >Batal</a>
		  </div>
		</form>
	   </div>
	</div>
</div><br><br><br><br>";
	}
}

?>
