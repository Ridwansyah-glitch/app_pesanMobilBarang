<!-- Content Row -->
<div class="row">
<div class="col-lg-12">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
    <a href="index.php?halaman=cetak_laporan" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-print text-white-100 "></i> Cetak Laporan</a>
</div>
</div>
<div class="col-lg-12 shadow">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Kota Asal</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Tanggal Angkut</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                                       
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor =1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM transaksi 
                                                    JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan 
                                                    JOIN tarif ON transaksi.id_tarif=tarif.id_tarif
                                                     "); ?>
                    <?php while($data = $ambil->fetch_assoc()) :?>
                    <tr>
                        <th scope="row"><?= $nomor; ?></th>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['kota_asal'];?></td>
                        <td><?= $data['alamat_tujuan']; ?></td>
                        <td><?= date("d F Y", strtotime($data['tanggal'])); ?></td>
                        <?php if ($data['status_transaksi'] == 2) { ?>
                            <td>Sudah Konfirmasi Pembayaran</td>
                            <td>
                                <a href="index.php?halaman=detail_transaksi&id=<?= $data['id_transaksi'];?>">
                                  <button class="btn btn-primary" type="submit">Detail</button>
                                </a>&nbsp;
                                <a href="index.php?halaman=input_sopir_angkut&id=<?= $data['id_transaksi'];?>">
                                <button class="btn btn-info" type="submit">Input Supir</button>
                                </a>
                            </td> 
                        <?php } elseif($data['status_transaksi'] == 3) { ?>
                            <td>Sukses</td>
                            <td>
                                <a href="index.php?halaman=detail_transaksi&id=<?= $data['id_transaksi'];?>">
                                  <button class="btn btn-primary" type="submit">Detail</button>
                                </a>&nbsp;
                                <a href="cetak_surat.php?id=<?= $data['id_transaksi'];?>">
                                <button class="btn btn-info" type="submit">Cetak Surat Jalan</button>
                                </a>
                                <a href="index.php?halaman=update_transaksi&id=<?= $data['id_transaksi'];?>">
                                <button class="btn btn-success" type="submit">Pengiriman Selesai</button>
                                </a>
                            </td> 
                        <?php } elseif($data['status_transaksi'] == 4) { ?>
                            <td>Selesai</td>
                            <td>
                            <a href="index.php?halaman=detail_transaksi&id=<?= $data['id_transaksi'];?>">
                                  <button class="btn btn-primary" type="submit">Detail</button>
                                </a>&nbsp;
                                <a href="cetak_surat.php?id=<?= $data['id_transaksi'];?>">
                                <button class="btn btn-info" type="submit">Cetak Surat Jalan</button>
                                </a>
                            </td>
                        <?php } else{ ?>
                            <td>Belum Konfirmasi Pembayaran</td>
                            <td>
                                <a href="index.php?halaman=detail_transaksi&id=<?= $data['id_transaksi'];?>">
                                  <button class="btn btn-primary" type="submit">Detail</button>
                                </a>&nbsp;
                            </td>
                        <?php } ?>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
                    <!-- Content Row -->
                 
