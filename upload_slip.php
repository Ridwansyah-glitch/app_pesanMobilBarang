<?php
session_start();
include "koneksi.php";


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
     <div class="row justify-content-center">
         <div class="col-lg-8">
            <h4 class="text-center mb-3">Input Bukti Pembayaran</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <input hidden name="id" value="<?= $_GET['id'];?>" class="form-control"/>
                <div class="form-group">
                    <label for="gambar">Upload Photo</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </form>
            <?php 
                
                if (isset($_POST['simpan'])) {
                    $id_transaksi=$_POST['id'];

                    // print_r($_FILES);
                    $lokasi_file = $_FILES['gambar']['tmp_name'];
                    $tipe_file   = $_FILES['gambar']['type'];
                    $nama_file   = $_FILES['gambar']['name'];
                    $direktori   = "admin/img/$nama_file";
                    if (!empty($lokasi_file)) {
                        move_uploaded_file($lokasi_file,$direktori);  
                        $koneksi->query("UPDATE transaksi SET bukti_pembayaran='$nama_file',status_transaksi=2 WHERE id='$id_transaksi'");
                        
                        echo "<script> alert ('Upload bukti pembayaran berhasil')
                            location.replace('riwayat_transaksi.php')</script>";
                    }else {
                        echo "<script>alert('Gagal Upload Bukti Pembayaran');</script>";
                    }
                }

            ?>

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
