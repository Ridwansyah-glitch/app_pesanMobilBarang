<?php
    session_start();
    include "koneksi.php";    

    if (empty($_SESSION['pelanggan']) OR !isset($_SESSION['pelanggan'])){
        echo "<script>alert('Anda Belum login,silahkan login terlebih dahulu');</script>";
        echo "<script>location='index.php';</script>";
    }

 $username = $_SESSION['pelanggan']['username'];
   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>CV Merdeka Transport</title>
  </head>
  <body>
 <!-- navbar -->
 <?php include "menu.php" ?>
<br><br><br><br><br><br><br>



      <section class="site-section py-sm">
        <div class="container">
        <h2 class="text-center">HISTORY TRANSAKSI</h2>
        <hr>
            <table class="table table-striped">
              <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Tanggal Angkut</th>
                <th>Tarif Angkut</th>
                <th>Status Transaksi</th>
              </tr>
            <?php $ambil = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE username='$username'");
                  $data = mysqli_fetch_assoc($ambil);
                  $id_pelanggan = $data['id_pelanggan']; 
                    
                  $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan JOIN tarif ON transaksi.id_tarif=tarif.id_tarif WHERE transaksi.id_pelanggan ='$id_pelanggan'
                                                  "); 
                  ?>

                    
                
              
            <?php $nomor=1; ?>
            <?php while($row = mysqli_fetch_array($query)) : ?>
            <tr>
              <td><?= $nomor; ?> </td>
              <td><?= $row['id_transaksi'] ?></td>
              <td><?= $row['nama'] ?></td>
              <td><?= $row['kota_asal'] ?></td>
              <td><?= $row['kota_tujuan'] ?></td>
              <td>
              <?= date("d F Y", strtotime($row['tanggal']));?>
              </td>
              <td> Rp. <?= number_format($row['harga']); ?></td>
              <?php if ($row['status_transaksi'] == 3) : ?>
                <td><span class="badge bg-primary">Sedang Proses Penjemputan Barang</span></td>
              <?php elseif($row['status_transaksi'] == 4): ?>
                <td><span class="badge bg-success">Sudah Sampai</span></td>
              <?php endif; ?>
              <td></td>
            </tr>
            <?php $nomor++; ?>
            <?php endwhile; ?>
            </table>
                </div>
      </section>
    

<!-- footer -->
<?php include "footer.php"; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
