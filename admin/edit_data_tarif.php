<?php
    $ambil = $koneksi->query("SELECT * FROM tarif WHERE id_tarif='$_GET[id]'");
    $data = $ambil->fetch_assoc();
?>
<!-- Content Row -->
<div class="row">
                <div class="col-lg-12">
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Tambah Data Tarif</h1>
                    </div>
                </div>
<div class="col-lg-12 shadow p-4">
<form  method="POST">
    <div class="form-group">
        <label for="asal">Kota Asal</label>
        <input type="text" name="kota_asal" id="asal" class="form-control" value="<?= $data['kota_asal']?>">
    </div>
    
    <div class="form-group">
        <label for="tujuan">Kota Tujuan</label>
        <input type="text" name="kota_tujuan" id="tujuan" class="form-control" value="<?= $data['kota_tujuan']?>">
    </div>
    <div class="form-group">
        <label for="max_kapasitas">Kapasitas </label>
        <input type="text" name="max_kapasitas" id="max_kapasitas" class="form-control" value="<?= $data['max_kapasitas']?>">
    </div>
    <div class="form-group">
        <label for="harga">Harga </label>
        <input type="number" name="harga" id="harga" class="form-control" value="<?= $data['harga']?>">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
     if (isset($_POST['save'])) {


        $koneksi->query("UPDATE tarif SET kota_asal='$_POST[kota_asal]',kota_tujuan='$_POST[kota_tujuan]',max_kapasitas='$_POST[max_kapasitas]',harga='$_POST[harga]' WHERE id_tarif='$_GET[id]'");
        echo "<script> alert('Data Telah Diubah') </script>";
        echo "<script> location='index.php?halaman=data_tarif'; </script>";
    }

?>
</div>
</div>