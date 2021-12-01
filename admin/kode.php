<?php 

include "../koneksi.php";

$ambil = $koneksi->query("SELECT max(id) as maxID FROM kode");

$data = $ambil->fetch_array();

$kode = $data['maxID'];

$kode++;

$ket = "TRX";

$kode_auto = $ket . sprintf("%04s",$kode);

echo $kode_auto;