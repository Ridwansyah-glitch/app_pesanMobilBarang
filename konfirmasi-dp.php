<?php
session_start();
include "koneksi.php";
$username =$_SESSION['pelanggan']['username'];

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username='$username'");
$data = $ambil->fetch_array();
$id_pelanggan = $data['id_pelanggan']; 

$cek = $koneksi->query("SELECT * FROM transaksi ,tarif WHERE transaksi.id_tarif=tarif.id_tarif AND transaksi.status_transaksi='1'");

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
    <title>CV Merdeka Transport Halaman | Konfirmasi Pembayaran</title>
  </head>
  <body>
 <!-- navbar -->
 <?php include "menu.php" ?>
 <br><br><br>

 <div class="container">
     <div class="row justify-content-center ">
         <div class="col-lg-8 shadow p-4 mt-5">
         <h4 class="text-center mb-3">KONFIRMASI PEMBAYARAN DOWNPAYMENT</h4>
             <?php while ($row =$cek->fetch_assoc()) :?>
             <?php
                $harga=$row['harga'];
                $dp=$harga*0.1;
                $sisa=$harga-$dp;   
            
             ?>
            <table class="table table-striped">
                <tr>
                    <td>Kota Asal</td>
                    <td><?= $row['kota_asal']; ?></td>
                </tr>
                <tr>
                    <td>Kota Tujuan</td>
                    <td><?= $row['kota_tujuan']; ?></td>
                </tr>
                <tr>
                    <td>Kapasitas Angkut Maximal</td>
                    <td><?= $row['max_kapasitas']; ?> Kg</td></tr>
                <tr>
                    <td>Tanggal Angkut</td>
                    <td><?= $row['tanggal']; ?></td>
                </tr>
                <tr>
                    <td>Tarif Angkut</td>
                    <td>Rp <?= number_format($row['harga']); ?></td></tr>
                <tr>
                    <td>Downpayment</td>
                    <td>Rp <?= number_format($dp); ?></td></tr>
                <tr>
                    <td>Sisa Pembayaran</td>
                    <td>Rp <?= number_format($sisa); ?></td>
                </tr>
            </table> <a href="upload_slip.php?id=<?= $row['id']?>"><button class="btn btn-primary" type="submit">Konfirmasi Pembayaran</button></a>
            <?php endwhile; ?>
           
           
         </div>
     </div>
 </div>





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
