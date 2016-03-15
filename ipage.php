<script language="javascript">
function validasi(form){
  if (form.nama.value == ""){
    alert("Anda belum mengisikan Nama.");
    form.nama.focus();
    return (false);
  }    
  if (form.alamat.value == ""){
    alert("Anda belum mengisikan Alamat.");
    form.alamat.focus();
    return (false);
  }
  if (form.telp.value == ""){
    alert("Anda belum mengisikan Telpon.");
    form.telp.focus();
    return (false);
  }
  if (form.email.value == ""){
    alert("Anda belum mengisikan Email.");
    form.email.focus();
    return (false);
  }
  if (form.kode_pos.value == ""){
    alert("Anda belum mengisikan kode pos.");
    form.kode_pos.focus();
    return (false);
  }
  return (true);
}
</script>
<?php
$act   = $_GET['act'];
if($act=="cart"){ ?>

              <div class="row">
                <div class="col-md-6">
                    <p class="lead lates">Cart Product</p>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb pull-right">
                      <?php include "breadcrumb.php"; ?>
                    </ol>
                </div>
                <div class="col-md-12">
                  <form method='post' action='cart.php?act=update'>
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-xs-1">No</th>
                            <th class="col-xs-4">Nama Produk</th>
                            <th class="col-xs-2">Harga</th>
                            <th class="col-xs-1">Jumlah</th>
                            <th class="col-xs-2">Sub Total</th>
                            <th>Hapus</th>
                        </tr>
                    <?php  
                    $ids=session_id();
                    $total=0;
                    $total_rp=0;
                    $cart = mysqli_query($db,"SELECT * FROM cart,produk
                            WHERE cart.id_produk=produk.id_produk AND id_session='$ids'");
                    if(mysqli_num_rows($cart)==0)
                    {
                        echo "<tr><td colspan=6><center>Keranjang masih kosong, silahkan belanja terlebih dahulu :)</center></td></tr>";
                    }
                    else{
                    $no=1;
                      while($r=mysqli_fetch_array($cart)){
                        $disc        = ($r['diskon']/100)*$r['harga'];
                        $hargadisc   = number_format(($r['harga']-$disc),0,",",".");
                        $subtotal    = ($r['harga']-$disc) * $r['jumlah'];
                        $total       += $subtotal;  
                        $subtotal_rp = rupiah($subtotal);
                        $total_rp    = rupiah($total);
                        $harga       = rupiah($r['harga']);
   

                    echo "
                        <tr>
                            <td>$no</td>
                            <input type='hidden' name='id[$no]' value='$r[id_orders]'>
                            <td>$r[nama_produk]</td>
                            <td>Rp. $hargadisc</td>
                            <td>
                                <input type='text' class='form-control text-center' name='jumlah[$no]' value='$r[jumlah]'>
                            </td>
                            <td>Rp. $subtotal_rp</td>
                            <td><a href='cart.php?act=del&id=$r[id_orders]'><span class='fa fa-trash fa-fw'></span>Delete</a></td>
                        </tr>"; 
                        $no++;
                        }   
                    }
                    ?>    
                    </table>
                        <p>* Klik <b>Perbarui Keranjang</b> untuk mengganti jumlah/quantity produk yang ingin di beli.</p>
                        <a href='index.php' class='btn btn-default'>Lanjutkan Belanja</a>
                        <input type='submit' class='btn btn-default pull-right' value='Perbarui Keranjang'>
                   </form>
                </div>
                <div class='col-md-12'>                  
                    <br><br><br>
                    <div class='row'>
                        <div class='col-md-4 pull-right'>
                            <h3>Total</h3>
                            <table class='table table-bordered'>
                                <tr>
                                    <th>Total</th>
                                    <td>Rp. <?php echo $total_rp ?></td>
                                </tr>
                            </table>
                            <a href='page.php?act=checkout' class='btn btn-default pull-right'>Lanjutkan ke checkout</a>
                        </div>
                    </div>
                </div>
              </div>
                <br>
                <hr>
<?php
}
elseif($act=="checkout"){ ?>

                <div class="row">
                <div class="col-md-6">
                    <p class="lead lates">Checkout Product</p>     
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb pull-right">
                      <?php include "breadcrumb.php"; ?>
                    </ol>
                </div>
                <div class="col-md-12">
                    <form action="page.php?act=selesai" method="post" onSubmit="return validasi($this)">
                    <h4>&nbsp;&nbsp;&nbsp;Rincian penagihan</h4>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nama">Nama lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama lengkap">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                          </div>
                        </div>
                        

                        <!-- Jasa Pengiriman (progress)
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="perusahaan">Jasa pengiriman</label>
                            <select class="form-control" name="jasa_pengiriman">
                                <option value="0">Pilih jasa pengiriman..</option>
                                //<?php  
                                //$query = mysqli_query($db,"SELECT * FROM pengiriman ORDER BY id_perusahaan");
                                //    while($data=mysqli_fetch_array($query)){
                                //    echo "<option value='$data[id_perusahaan]'>$data[nama_perusahaan]</option>";
                                //    } 
                                ?>
                            </select>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kota">Kota</label>
                            <select class='form-control' name="ongkir" id="ongkir">
                                <option value="0">Pilih jasa pengiriman terlebih dahulu</option>
                            </select>
                          </div>
                        </div>
                        Jasa Pengiriman (progress) -->

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" cols="20" rows="5"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="text" class="form-control" name='telp' placeholder="No telp">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kode_pos">Kode pos</label>
                            <input type="text" class="form-control" name="kode_pos" placeholder="Kode pos">
                          </div>
                        </div>
                        
                        <?php  
                        $ids     = session_id();
                        $pesanan = mysqli_query($db,"SELECT * FROM cart,produk WHERE id_session='$ids' AND 
                                   cart.id_produk=produk.id_produk");
                        ?>
                        <div class="col-md-12">
                            <h4>Pesanan anda</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th class='text-center'>No</th>
                                    <th>Produk</th>
                                    <th class='text-center'>Jumlah</th>
                                    <th class='text-center'>Sub Total</th>
                                </tr>
                                <?php 
                                $total=0;
                                $no=1; 
                                while($data=mysqli_fetch_array($pesanan)){
                                $disc        = ($data['diskon']/100)*$data['harga'];
                                $hargadisc   = number_format(($data['harga']-$disc),0,",",".");
                                $subtotal    = ($data['harga']-$disc) * $data['jumlah'];
                                $total       += $subtotal;  
                                $subtotal_rp = rupiah($subtotal);
                                $total_rp    = rupiah($total);
                                $harga       = rupiah($data['harga']);
                                echo "
                                <tr>
                                    <td class='text-center'>$no</td>
                                    <td>$data[nama_produk]</td>
                                    <td class='text-center'>$data[jumlah]</td>
                                    <td class='text-center'>Rp. $subtotal_rp</td>
                                </tr>";
                                $no++;
                                 }
                                 ?>
                                <tr>
                                    <th colspan="3" class='text-center'>Total</th>
                                    <td class='text-center'>Rp. <?php echo $total_rp; ?></td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="radio-inline">
                                          <label for="setuju">
                                            <input type="radio" name="setuju" id="setuju" value="option1" aria-label="...">Setuju
                                          </label>
                                        </div>
                                    </div>
                                    <p class="bg-success pad-10">No. Rekening Bank dan jumlah total pembayaran 
                                    (Harga Produk+Biaya Pengiriman) akan diberitahukan via e-mail setelah anda selesai mengisi form chekout,
                                     terima kasih :)</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <input type="submit" class="btn btn-primary btn-lg pull-right" value='BUAT PESANAN'>
                                </th>
                            </tr>
                            </table>
                        </div>
                    </form>                 
                </div>
                </div>
                <br>
                <hr>
<?php
}
elseif ($act=="selesai") {
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];

function isi_keranjang(){
    $db            = mysqli_connect('localhost','root','','ibelanja');
    $isi_keranjang = array();
    $ids           = session_id();
    $cart          = mysqli_query($db,"SELECT * FROM cart WHERE id_session='$ids'");

    while($icart=mysqli_fetch_array($cart)){
        $isi_keranjang[] = $icart;
    }
    return $isi_keranjang;
}

    //simpan data pemesanan
    $query= mysqli_query($db,"INSERT INTO orders   (nama_costumer, 
                                                    alamat,
                                                    telepon, 
                                                    email, 
                                                    tgl_order, 
                                                    jam_order) 
                        VALUES                     ('$nama',
                                                    '$alamat',
                                                    '$telp',
                                                    '$email',
                                                    '$tgl_sekarang',
                                                    '$jam_sekarang')");

    //nomor order
    $id_order=mysqli_insert_id($db);

    //panggil fungsi keranjang dan menghitung jumlah produk yng di pesan
    $isi_keranjang=isi_keranjang();
    $jumlah=count($isi_keranjang);

    //simpan ke order detail
    for($a=0;$a<$jumlah;$a++){
        mysqli_query($db,"INSERT INTO order_detail (id_orders,id_produk,jumlah) VALUES
                     ('$id_order','{$isi_keranjang[$a]['id_produk']}','{$isi_keranjang[$a]['jumlah']}')");
    }
    //hapus file cart yang telah di simpan ke order detail
    for($a=0;$a<$jumlah;$a++){
        mysqli_query($db,"DELETE FROM cart WHERE id_orders={$isi_keranjang[$a]['id_orders']}");
    }
?>

            <div class="row">
                <div class="col-md-6">
                    <p class="lead lates">Selesai belanja</p>     
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb pull-right">
                      <?php include "breadcrumb.php"; ?>
                    </ol>
                </div>
                <div class="col-md-12">
                <h4>Terima kasih, pesanan anda telah di terima.</h4>
                </div>
                <div class="col-md-6">
                    <p>No. Order : <?php echo $id_order; ?></p>
                </div>
                <div class="col-md-6">
                    <p class='pull-right'>Tanggal : <?php echo tgl_indo(date("Y-m-d")); ?></p>
                </div>
                        <?php  
                        $pesanan = mysqli_query($db,"SELECT * FROM order_detail,produk WHERE
                                   id_orders=$id_order AND 
                                   order_detail.id_produk=produk.id_produk");
                        ?>
                        	<div class="col-md-12">
                            <h4>Pesanan anda</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th class='text-center'>No</th>
                                    <th>Produk</th>
                                    <th class='text-center'>Jumlah</th>
                                    <th class='text-center'>Sub Total</th>
                                </tr>
                                <?php 
                                $total=0;
                                $total_rp=0;
                                $no=1; 
                                while($data=mysqli_fetch_array($pesanan)){
                                $disc        = ($data['diskon']/100)*$data['harga'];
                                $hargadisc   = number_format(($data['harga']-$disc),0,",",".");
                                $subtotal    = ($data['harga']-$disc) * $data['jumlah'];
                                $total       += $subtotal;  
                                $subtotal_rp = rupiah($subtotal);
                                $total_rp    = rupiah($total);
                                $harga       = rupiah($data['harga']);
                                echo "
                                <tr>
                                    <td class='text-center'>$no</td>
                                    <td>$data[nama_produk]</td>
                                    <td class='text-center'>$data[jumlah]</td>
                                    <td class='text-center'>Rp. $subtotal_rp</td>
                                </tr>";
                                $no++;
                                 }
                                 ?>
                                <tr>
                                    <th colspan="3" class='text-center'>Total</th>
                                    <td class='text-center'>Rp. <?php echo $total_rp; ?></td>
                                </tr>
                            </table>
                            </div>
                <div class="col-md-12">
                <h4>Rincian Pelanggan</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>E-mail</th>
                        <td><?php echo $_POST['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><?php echo $_POST['telp']; ?></td>
                    </tr>
                </table>
                </div><br>
                <div class="col-md-12">
                <h4>Alamat Penagihan</h4>
                <address>
                  <strong><?php echo $_POST['nama']; ?></strong><br>
                  <?php echo $_POST['alamat']; ?><br>
                </address>
                </div>
                    
                <br>
                <hr>
            </div><!--close div row selesai-->

<?php
}
elseif($act=="detail_product"){ ?>
			<div class="row">
                <div class="col-md-6">
                <p class="lead lates">Detail Product</p>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb pull-right">
                      <?php include "breadcrumb.php"; ?>
                    </ol>
                </div>
                <?php 
				$query=mysqli_query($db,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
                $data=mysqli_fetch_array($query);

                $harga=rupiah($data['harga']);
                $diskon=($data['diskon']/100)*$data['harga'];
                $harga_diskon=number_format(($data['harga']-$diskon),2,",",".");
                $stock=$data['stok'];
                $beli="<a href='cart.php?act=add&id=$data[id_produk]' class='btn btn-primary'>Beli!</a>";
                ?>
                    <div class="col-md-5">
                        <div class="thumbnail">
                            <img src="assets/img/product/<?php echo $data['gambar']; ?>" alt="">           
                        </div>
                    </div>

                    <div class="col-md-7">
                       <h2><?php echo $data['nama_produk']; ?></h2>
                       <h4>Rp. <?php echo $harga_diskon; ?></h4>
						<p><?php echo $data['deskripsi']; ?></p>
                        <?php echo $beli ?>
                        <br>
                        
                    </div>
            </div>
            <br>
            <hr>
<?php
}
elseif($_GET['act']=="kategori"){ 
    $query = mysqli_query($db,"SELECT * FROM kategori_produk WHERE id_kategori=$_GET[id]");
    $data  = mysqli_fetch_array($query);
    ?>
                <div class="row">

                    <div class="col-md-6">
                    <p class="lead lates">Category : <?php echo $data['kategori']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb pull-right">
                          <?php include "breadcrumb.php"; ?>
                        </ol>
                    </div>  


<?php
                $query=mysqli_query($db,"SELECT * FROM produk WHERE id_kategori='$_GET[id]'");
                while($data=mysqli_fetch_array($query)){

                $harga=rupiah($data['harga']);
                $diskon=($data['diskon']/100)*$data['harga'];
                $harga_diskon=number_format(($data['harga']-$diskon),2,",",".");
                $stock=$data['stok'];

                $beli="<a href='cart.php?act=add&id=$data[id_produk]' class='btn btn-primary btn-xs'>Beli!</a>";
                $habis="<a href='#' class='btn btn-success btn-xs'>Stock Habis</a>";
                $detail = "<a href='page.php?act=detail_product&id=$data[id_produk]' class='btn btn-default btn-xs'>Detail</a>";

                if($stock != "0"){
                    $btn=$beli;
                }
                else{
                    $btn=$habis;
                }

                $dis=$data['diskon'];
                $harga_tetap="<h5 class='text-center'>Rp. $harga_diskon</h5>";
                $harga_dis="<h5 class='text-center text-muted' style='text-decoration:line-through;'>Rp. $harga</h5>
                            <h5 class='text-center'>Rp. $harga_diskon</h5>";

                if($dis != "0"){
                    $harga_asli=$harga_dis;
                }
                else{
                    $harga_asli=$harga_tetap;
                }
?>         
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail pro">
                            <img src="assets/img/product/<?php echo $data['gambar']; ?>" alt="">
                            <div class="caption">
                                <h5 class="text-center"><a href="#"><?php echo $data['nama_produk']; ?></a></h5>
                                <?php echo $harga_asli; ?>   
                                <div class="tombol">
                                <?php echo $btn; ?> 
                                <?php echo $detail; ?>
                                </div>
                            </div>                    
                        </div>
                    </div>

                <?php } ?>
                </div>
<br><br><hr>
<?php
}
elseif($act=="cari"){ 

$kata = trim($_GET['kata']);
$kata = htmlentities(htmlspecialchars($kata),ENT_QUOTES);
$pisah_kata = explode(" ",$kata);
$jml_katakan = (integer)count($pisah_kata);
$jml_kata = $jml_katakan-1;

$cari = "SELECT * FROM produk WHERE";
    for($i=0; $i<=$jml_kata; $i++){
        $cari .= "deskripsi LIKE '%$pisah_kata[i]%' OR nama_produk LIKE '%$pisah_kata[i]%'";
        if($i < $jml_kata){
            $cari .= " OR ";
        }
    }
$cari = "ORDER BY id_produk DESC LIMIT 6";
$hasil = mysqli_query($db,$cari);
$ketemu = mysqli_num_rows($hasil);

echo "<h3>Hasil pencarian</h3>";

if($ketemu > 0){
    echo "<h4>Ditemukan <b>$ketemu</b> produk dengan kata <b>$kata</b></h4>";
    while($data=mysqli_fetch_array($hasil)){
        $isi_produk = htmlentities(strip_tags($data['deskripsi']));
        $isi        = substr($isi_produk, 0,250);
        $isi        = substr($isi_produk,0, strrpos);

        echo "<div class='row'>
                
                <div class='col-md-12>
                    <h4>$data[nama_produk]</h4>
                    <p>$data[deskripsi]</p>
                </div>
                
              </div>";
    }
}
else{
    echo "<p>kata tidak di temukan</p>";
}


?>

<?php
}
?>