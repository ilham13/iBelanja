<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Password</h1>
     </div>
</div>
<?php 

if(isset($_GET['notif'])){
	if($_GET['notif']=="gagal"){
		echo "<div class=alert alert-danger role=alert>
				<p><span class=glyphicon glyphicon-warning-sign></span>
					Gagal ganti password
				</p>
			  </div>";
	}
}

?>
<div class="row">
	<div class="col-md-4">
		<form action="modul/mod_password/act_password.php" method="POST">
			<div class="form-group">
				<label for="pass_baru">Password Baru</label>
				<input type="password" name="pass_baru" class="form-control">
			</div>
			<div class="form-group">
				<label for="pass_ulangi">Ulangi Password Baru</label>
				<input type="password" name="pass_ulangi" class="form-control">
			</div>
			<div class="form-group">
				<label for="pass_lama">Password Lama</label>
				<input type="password" name="pass_lama" class="form-control">
			</div>
			<button class="btn btn-primary">Simpan</button>
			<a href='media.php' class="btn btn-default">Batal</a>
		</form>
	</div>
</div>
