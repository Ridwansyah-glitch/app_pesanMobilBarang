<?php 
     $datakategori =[];
     $ambil = $koneksi->query("SELECT * FROM sopir");
     while($data = $ambil->fetch_assoc()) {
         $datasopir[] =$data;
     }

?>
<div class="row">
    <div class="col-md-12  align-self-center">
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <center>
                <div class="content-row">
                    <h2 class="content-row-title">UPDATE TRANSAKSI ANGKUT BARANG</h2><hr>
                    <form method="post">
                        <input type="hidden" name="id_transaksi" value="<?= $_GET['id']?>">
                        <div class="form-group">
                            <select name="id_sopir" id="id_sopir" class="form-control">
                                <option value=""><-- Pilih Kategori --></option>
                                <option value="4">Transaksi Selesai</option>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit" name="save">Save</button>
                    </form>

                </div><!-- content -->
                </center>
            </div>
        </div>
    </div>
</div>
<?php 

    if (isset($_POST['save'])) {
       $koneksi->query("UPDATE transaksi SET status_transaksi='4' WHERE id_transaksi='$_GET[id]'");
        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_transaksi'>";
    }
                        
                        
?>