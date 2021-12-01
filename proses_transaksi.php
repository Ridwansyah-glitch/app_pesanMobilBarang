<?php
session_start();
include "koneksi.php";


    $username =$_SESSION['pelanggan']['username'];


$ambildata = $koneksi->query("SELECT max(id) as maxID FROM transaksi");
$dataid = $ambildata->fetch_array();
$kode = $dataid['maxID'];
$kode++;
$ket = "TRX";
$kode_auto = $ket . sprintf("%04s",$kode);



echo $id_pelanggan = $_POST['id_pelanggan'];
$asal = $_POST['kota_asal'];
$tujuan = $_POST['kota_tujuan'];

$tanggal = $_POST['tanggal'];
$alamat = $_POST['alamat_tujuan'];

                        $ambil = $koneksi->query("SELECT * FROM tarif WHERE kota_asal='$asal' AND kota_tujuan='$tujuan'");
                      if(mysqli_num_rows($ambil)==0){
                          echo "<script> alert ('Maaf, kota asal dan tujuan yang anda masukan tidak tersedia. Silahkan melakukan pengisian ulang data')
                          location.replace('pesan-mobil.php')</script>";
                      } else {
                          $data=mysqli_fetch_array($ambil);
                          $id_tarif=$data['id_tarif'];
                          $harga=$data['harga'];
                          $dp=$harga*0.1;
                          $sisa=$harga-$dp;

                          $insert = $koneksi->query("INSERT INTO transaksi (id_transaksi,id_pelanggan,id_tarif,id_sopir,tanggal,alamat_tujuan,dp,sisa,bukti_pembayaran,status_transaksi) 
                                                    VALUES ('$kode_auto','$id_pelanggan','$id_tarif',0,'$tanggal','$alamat','$dp','$sisa','Belum upload bukti',1)");
                                            if ($insert != 0){
                                                echo "<script> alert ('Transaksi pemesanan angkut barang berhasil.')
                                                location.replace('konfirmasi-dp.php')</script>";	
                                            }
                                            else {
                                                echo "<script> alert ('Gagal disimpan')
                                                location.replace('pesan-mobil.php')</script>";
                                            }	
                      }

               



?>