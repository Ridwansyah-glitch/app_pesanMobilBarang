
<?php 

$ambil = $koneksi->query("SELECT * FROM transaksi 
                               JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan
                               JOIN tarif ON transaksi.id_tarif=tarif.id_tarif
                               JOIN sopir ON transaksi.id_sopir=sopir.id_sopir WHERE id_transaksi='$_GET[id]'"); 
                               
                               
        $data = $ambil->fetch_assoc();

        $dp=$data['harga'] * .10;

        $sisa = $data['harga'] - $dp;
   
?>

<div class="col-lg-12">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi : <?= $data['nama']?></h1>
    
</div>
</div>
<div class="row">
    <div class="col-lg-12 shadow p-4">
        <table class="table table-stripped">
        <tr>
                <td>No Transaksi </td>
                <td><?= $data['id_transaksi'] ?></td>
            </tr>
            <tr>
                <td>Nama Pelanggan  </td>
                <td><?= $data['nama'] ?></td>
            </tr>
            <tr>
                <td>Alamat Ambil Barang</td>
                <td><?= $data['alamat'] ?></td>
            </tr>
            <tr>
                <td>Alamat Kirim Barang</td>
                <td><?= $data['alamat_tujuan'] ?></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td><?= $data['no_tlp'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Angkut</td>
                <td><?= $data['tanggal'] ?></td>
            </tr>
            <tr>
                <td>Kota Asal</td>
                <td><?= $data['kota_asal'] ?></td>
            </tr>
            <tr>
                <td>Kota Tujuan</td>
                <td><?= $data['kota_tujuan'] ?></td>
            </tr>
            <tr>
                <td>Downpayment (10%)</td>
                <td>Rp. <?= number_format($dp) ?></td>
            </tr>
            <tr>
                <td>Sisa</td>
                <td>Rp. <?= number_format($sisa) ?></td>
            </tr>
            <tr>
                <td>Bukti Pembayaran</td>
                <td><?= $data['bukti_pembayaran'] ?></td>
            </tr>
        </table>

        <a href="index.php?halaman=data_transaksi"><button class="btn btn-primary" type="submit">Kembali</button></a>
    </div>
</div>