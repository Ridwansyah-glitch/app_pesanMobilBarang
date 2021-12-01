
                    <!-- Content Row -->
                    <div class="row">

                    <div class="col-lg-12">
                             <!-- Page Heading -->
                             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Supir</h1>
                            <a href="index.php?halaman=tambah_data_sopir" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Sopir</a>
                        </div>

                    </div>
                        <div class="col-lg-12 shadow">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Supir</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Hp</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor =1; ?>
                                    <?php $ambil = $koneksi->query("SELECT * FROM sopir"); ?>
                                    <?php while($data = $ambil->fetch_assoc()) :?>
                                    <tr>
                                        <th scope="row"><?= $nomor; ?></th>
                                        <td><?= $data['nama_sopir']; ?></td>
                                        <td><?= $data['alamat']; ?></td>
                                        <td><?= $data['no_tlp']; ?></td>
                                        <td>
                                            <a href="index.php?halaman=hapus_data_sopir&id=<?= $data['id_sopir']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus')"><i class="fas fa-trash-alt"></i></a>
                                            <a href="index.php?halaman=edit_data_sopir&id=<?= $data['id_sopir']; ?>" class="btn btn-info"><i class="fa fa-edit "></i></a>
                                        </td>
                                    </tr>
                                    <?php $nomor++; ?>
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                

                    <!-- Content Row -->
                 
