<?php

    $id = $_GET['id'];
    
    $koneksi->query("DELETE FROM sopir WHERE id_sopir='$id'");

    echo "<script>alert('Data sopir sudah terhapus');</script>";
    echo "<script>location='index.php?halaman=data_sopir'</script>";