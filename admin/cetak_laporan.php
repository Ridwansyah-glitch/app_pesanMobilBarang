<?php 

   include "../koneksi.php";

   $semuadata=[];
    $tglm= '-';
    $tgls= '-';

    if (isset($_POST['kirim'])) {
        
        $tglm = $_POST['tgl_mulai'];
        $tgls = $_POST['tgl_selesai'];
        
        $ambil = $koneksi->query("SELECT * FROM transaksi LEFT JOIN pelanggan ON
                                    transaksi.id_pelanggan=pelanggan.id_pelanggan 
                                    WHERE tanggal BETWEEN '$tglm' AND '$tgls'");
         while($data = $ambil->fetch_assoc()){
            $semuadata[]= $data;
        }

        // echo "<pre>";
        //     print_r($semuadata);
        // echo "</pre>";
    }

?>

<div class="row">
    <div class="col-lg-12">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Laporan transaksi dari : <?= date("d F Y", strtotime($tglm)); ?> sampai : <?= date("d F Y", strtotime($tgls)); ?></h2>
        </div>
    </div>
    <div class="col-lg-12 shadow p-4">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" id="tgl_mulai"  class="form-control" value="<?= $tglm;?>">
                </div>
            </div>
            <div class="col-md-5">
            <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" value="<?= $tglm;?>">
                </div>
            </div>
            <div class="col-md-2">
                <label for="">&nbsp;</label><br>
                <button class="btn btn-primary" name="kirim"><i class="fa fa-eye"></i> Lihat</button>
            </div>
        </div>
    </form>

    <table class="table table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Angkut</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php foreach($semuadata as $key => $value) : ?>
        
            <tr>
                <th><?= $key+1; ?></th>
                <td><?= $value['nama']; ?></td>
                <td><?= date("d F Y", strtotime($value['tanggal'])); ?></td>
                <td><?= $value['status_transaksi']; ?></td>
            </tr>
        <?php endforeach; ?> 
        </tbody>
        <tfoot>
            <tr>
        <th colspan="4">Total</th>
                <th>Rp. <?= number_format($total); ?></th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>