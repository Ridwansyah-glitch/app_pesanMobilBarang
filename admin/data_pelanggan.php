<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
                                <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
        
        </div>

    </div>
    <div class="col-lg-12 shadow">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $nomor =1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
                <?php while($data = $ambil->fetch_assoc()) :?>
                <tr>
                    <th scope="row"><?= $nomor; ?></th>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['no_tlp']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <?php
                    if($data['status']=="1"){
                    ?>
                    <td><span class="badge bg-warning text-white">Belum Konfirmasi</span></td>
                    <td><a href="index.php?halaman=konfirmasi&id=<?= $data['id_pelanggan'];?>" title="Konfirmasi"><button type="submit" class="btn btn-primary" name="konfirmasi">Konfirmasi</button></a></td>
                    <?php
                    } else {
                    ?>
                    <td><span class="badge bg-primary text-white">Sudah Konfirmasi</span></td>
                    <td><span class="badge bg-info text-white">Tidak Ada</span></td>
                    <?php
                    }
                    ?>
                </tr>
                <?php $nomor++; ?>
                <?php endwhile;?>
            </tbody>
                </table>
    </div>
</div>
<!-- Content Row -->
                 
