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
    <title>CV Merdeka Transport</title>
  </head>
  <body>
 <!-- navbar -->
 <?php include "menu.php" ?>
<br><br><br><br><br><br><br>
<div class="container section-padding">
    <div class="row">
    <div class="col-lg-12 shadow p-4">
            <h2 class="text-center">Informasi Tarif</h2>
        
            <br>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kota Asal</th>
                        <th scope="col">Kota Tujuan</th>
                        <th scope="col">Kapasitas Angkut</th>
                        <th scope="col">Harga</th>
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
                    <td><?= $data['harga']; ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php endwhile;?>
            </tbody>
                </table>
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
