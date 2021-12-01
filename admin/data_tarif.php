 <!-- Content Row -->
<div class="row">
<div class="col-lg-12">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Tarif</h1>
    <a href="index.php?halaman=tambah_data_tarif" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Tarif</a>
</div>
</div>
<div class="col-lg-12 shadow">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kota Asal</th>
                    <th scope="col">Kota Tujuan</th>
                    <th scope="col">Max Kapasitas</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $nomor =1; ?>
            <?php $ambil = $koneksi->query("SELECT * FROM tarif"); ?>
            <?php while($data = $ambil->fetch_assoc()) :?>
            <tr>
                <th scope="row"><?= $nomor; ?></th>
                <td><?= $data['kota_asal']; ?></td>
                <td><?= $data['kota_tujuan']; ?></td>
                <td><?= $data['max_kapasitas']; ?></td>
                <td>Rp.<?= number_format($data['harga']); ?></td>
                <td>
                    <a href="index.php?halaman=hapus_data_tarif&id=<?= $data['id_tarif']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus')"><i class="fas fa-trash-alt"></i></a>
                    <a href="index.php?halaman=edit_data_tarif&id=<?= $data['id_tarif']; ?>" class="btn btn-info"><i class="fa fa-edit "></i></a>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php endwhile;?>
        </tbody>
        </table>
    </div>
</div>

<!-- Content Row -->
                 

             