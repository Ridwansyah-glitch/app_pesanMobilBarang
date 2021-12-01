
<!-- Content Row -->
<div class="row">
                <div class="col-lg-12">
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Tambah Data Tarif</h1>
                    </div>
                </div>
<div class="col-lg-12 shadow">
<form  method="POST">
    <div class="form-group">
        <label for="asal">Kota Asal</label>
        <select name="asal" id="asal" class="form-control">
            <option value="bandung">Bandung</option>
            <option value="sukabumi">Sukabumi</option>
            <option value="cianjur">Cianjur</option>
            <option value="tasikmalaya">Tasikmalaya</option>
            <option value="bekasi">Bekasi</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="tujuan">Kota Tujuan</label>
        <select name="tujuan" id="tujuan" class="form-control">
            <option value="bandung">Bandung</option>
            <option value="sukabumi">Sukabumi</option>
            <option value="cianjur">Cianjur</option>
            <option value="tasikmalaya">Tasikmalaya</option>
            <option value="bekasi">Bekasi</option>
        </select>
    </div>
    <div class="form-group">
        <label for="max_kapasitas">Kapasitas </label>
        <input type="text" name="max_kapasitas" id="max_kapasitas" class="form-control">
    </div>
    <div class="form-group">
        <label for="harga">Harga </label>
        <input type="number" name="harga" id="harga" class="form-control">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

</div>
</div>
<?php 

if (isset($_POST['save'])) {
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $kapasitas = $_POST['max_kapasitas'];
    $harga = $_POST['harga'];

    $koneksi->query("INSERT INTO tarif (kota_asal,kota_tujuan,max_kapasitas,harga) 
                    VALUES ('$asal','$tujuan','$kapasitas','$harga')");

    
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_tarif'>";

}

?>