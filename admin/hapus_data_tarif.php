<?php 

    $id = $_GET['id'];

    $koneksi->query("DELETE FROM tarif WHERE id_tarif='$id'");

    echo "<script>alert('Data tarif
     sudah terhapus');</script>";
    echo "<script>location='index.php?halaman=data_tarif'</script>";