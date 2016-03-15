<?php  
$aksi="modul/kategori/act_kategori.php";

if(!isset($_GET['act'])) {
	echo "
		<div class='row'>
		    <div class='col-lg-12'>
		        <h1 class='page-header'>Kategori Produk</h1>
		     </div>
			<div class='col-md-12'>
			<button class='btn btn-primary' data-toggle='modal' data-target='#myModal'>
				<span class='fa fa-edit fa-fw'></span>Tambah Kategori
			</button>
			
			<br><br>
				<table class='table table-bordered table-hover'>
					<tr class='active'>
						<th class='col-md-2 text-center'>No</th>
						<th class='col-md-6 text-center'>Kategori</th>
						<th class='col-md-4 text-center'>Action</th>
					</tr>";
					$paging = new paging;
					$batas  = 5;
					$start  = $paging->cariposisi($batas);

					$query=mysqli_query($db,"SELECT * FROM kategori_produk ORDER BY id_kategori
						   LIMIT $start,$batas");
					$no=$start+1;
					while($data=mysqli_fetch_array($query)){
					echo"
					<tr>
						<td class='text-center'>$data[id_kategori]</td>
						<td class='text-center'>$data[kategori]</td>
						<td class='text-center'>
							<a href='?module=kategori&act=update&id=$data[id_kategori]' class='btn btn-primary'
							>Update</a>
							<a href='$aksi?module=kategori&act=delete&id=$data[id_kategori]' class='btn btn-default'>Delete</a>
						</td>
					</tr>";
				$no++;
				}
	echo "
				</table>";

				$jumlahdata=mysqli_num_rows(mysqli_query($db,"SELECT * FROM kategori_produk"));
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

	if($_GET['act']=="tambah"){
		echo "
		<div class='row'>
			<div class='col-lg-12'>
		        <h1 class='page-header'> Tambah Kategori</h1>
		    </div>
			<div class='col-md-4'>
				<form action='$aksi?module=kategori&act=tambah' method='post'>
					<div class='form-group'>
						<label for='kategori'>Kategori</label>
						<input type='text' class='form-control' name='kategori'>
					</div>
					<input class='btn btn-success' type=submit value=simpan>
			  		<input class='btn btn-default' type=button value=Batal onclick=self.history.back()>
				</form>
			</div>
		</div>";
	}
	elseif($_GET['act']=="update"){
		$query=mysqli_query($db,"SELECT * FROM kategori_produk WHERE id_kategori='$_GET[id]'");
		$data=mysqli_fetch_array($query);
		echo "
		<div class='row'>
			<div class='col-lg-12'>
		        <h1 class='page-header'>Update Kategori</h1>
		    </div>
			<div class='col-md-4'>
				<form action='$aksi?module=kategori&act=update&id=$_GET[id]' method='post'>
					<div class='form-group'>
						<label for='kategori'>Kategori</label>
						<input type='text' class='form-control' name='kategori' value='$data[kategori]'>
					</div>
					<input class='btn btn-primary' type=submit value=simpan>
			  		<input class='btn btn-default' type=button value=Batal onclick=self.history.back()>
				</form>
			</div>
		</div>";
	}

}
?>

<!-- Tambah Kategori -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
        <div class='row'>
			<div class='col-md-12'>
				<form action='<?php echo $aksi ?>?module=kategori&act=tambah' method='post'>
					<div class='form-group'>
						<label for='kategori'>Kategori</label>
						<input type='text' class='form-control' name='kategori'>
					</div>
					<input type="submit" class="btn btn-primary" value='Tambah!'>
        			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</form>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>