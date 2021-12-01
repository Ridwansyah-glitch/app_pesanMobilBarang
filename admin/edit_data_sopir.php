<?php
    $ambil = $koneksi->query("SELECT * FROM sopir WHERE id_sopir='$_GET[id]'");
    $data = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-lg-12">
                             <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Supir</h1>
        </div>

    </div>
    <div class="col-lg-12 shadow p-4">
    <form  method="POST">
    <div class="form-group">
        <label for="nama_sopir">Nama</label>
        <input type="text" name="nama_sopir" id="nama_sopir" class="form-control" value="<?= $data['nama_sopir'] ?>">
    </div>
    
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" id="deskripsi"  rows="10" ><?= $data['alamat'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="stok">No Hp </label>
        <input type="text" name="no_tlp" id="stok" class="form-control" value="<?= $data['no_tlp'] ?>">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

    </div>
</div>
<?php 

    if (isset($_POST['save'])) {
        $koneksi->query("UPDATE sopir SET nama_sopir='$_POST[nama_sopir]',alamat='$_POST[alamat]',no_tlp='$_POST[no_tlp]' WHERE id_sopir='$_GET[id]'");
        echo "<script> alert('Data Telah Diubah') </script>";
        echo "<script> location='index.php?halaman=data_sopir'; </script>";
    }
?>