<h1>Tambah Data Sopir</h1>

<form  method="POST">
    <div class="form-group">
        <label for="nama_sopir">Nama</label>
        <input type="text" name="nama_sopir" id="nama_sopir" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" id="deskripsi"  rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="stok">No Hp </label>
        <input type="text" name="no_tlp" id="stok" class="form-control">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>


<?php 
    if (isset($_POST['save'])) {
        $nama_sopir = $_POST['nama_sopir'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];

        $koneksi->query("INSERT INTO sopir (nama_sopir,alamat,no_tlp) VALUES('$nama_sopir','$alamat','$no_tlp')");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_sopir'>";
    }
  

?>