<?php 
    session_start();

    include "koneksi.php";

    if (empty($_SESSION['pelanggan']) OR !isset($_SESSION['pelanggan'])){
        echo "<script>alert('Anda Belum login,silahkan login terlebih dahulu');</script>";
        echo "<script>location='index.php';</script>";
    }
    

    $username = $_SESSION['pelanggan']['username'];
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username='$username'");
    $data = $ambil->fetch_array();


    
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
<div class="container section-padding">
    <div class="row justify-content-center">
        <div class="col-lg-10 ">
            <h1 class="text-center">Pesan Mobil Angkut</h1>
        </div>
        <div class="col-lg-10">
   

            <form action="proses_transaksi.php" method="post">
                
            <input type="hidden" name="id_pelanggan" value="<?= $data['id_pelanggan'];?>" class="form-control">
            <div class="mb-3 row">
                <label for="kota_asal" class="col-sm-2 col-form-label">Kota Asal</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Kota Asal" name="kota_asal">
                    <option selected><-- Pilih Kota Asal --></option>
                    <option value="bandung">Bandung</option>
                    <option value="sukabumi">Sukabumi</option>
                    <option value="tasikmalaya">Tasikmalaya</option>
                    <option value="cianjur">Cianjur</option>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kota_tujuan" class="col-sm-2 col-form-label">Kota Tujuan</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Kota Asal" name="kota_tujuan">
                    <option selected><-- Pilih Kota Tujuan --></option>
                    <option value="bandung">Bandung</option>
                    <option value="sukabumi">Sukabumi</option>
                    <option value="tasikmalaya">Tasikmalaya</option>
                    <option value="cianjur">Cianjur</option>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Angkut</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat_tujuan" class="col-sm-2 col-form-label">Alamat Lengkap Tujuan</label>
                <div class="col-sm-10">
                <textarea name="alamat_tujuan" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
            </form>
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
