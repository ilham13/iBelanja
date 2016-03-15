<?php 
    $ongkir = mysqli_query($db,"SELECT * FROM ongkos_kirim WHERE id_perusahaan='$_GET[perusahaan]'
                            ORDER BY nama_kota");
    $r_ongkir = mysqli_num_rows($ongkir); 
    if($r_ongkir>0){
        echo "<select class='form-control' name='kota' id='kota'>";
            while($da=mysqli_fetch_array($ongkir)){
                echo "<option value='$da[id_kota]'>$da[nama_kota]</option>";
            }
        echo "</select>";
    }
    else{
        echo "<select class='form-control' name='kota'>
                <option value='0'>Pilih Jasa Pengirima dahulu</option>
              </select>";
    }
?>