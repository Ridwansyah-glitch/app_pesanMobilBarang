<?php 
        include "../koneksi.php";

        $koneksi->query("UPDATE pelanggan SET status=2 WHERE id_pelanggan='$_GET[id]'");
        echo "<script>alert('Sudah Konfirmasi')</script>";
        echo "<script>location='index.php?halaman=data_pelanggan';</script>";
             
                   
