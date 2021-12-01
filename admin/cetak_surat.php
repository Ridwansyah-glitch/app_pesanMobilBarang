
<?php 
    include "../koneksi.php";
    $ambil = $koneksi->query("SELECT * FROM transaksi, tarif, pelanggan WHERE transaksi.id_pelanggan=pelanggan.id_pelanggan AND tarif.id_tarif=transaksi.id_tarif AND transaksi.id_transaksi='$_GET[id]'");
    $data = $ambil->fetch_assoc();

    $tanggal_sekarang=date('d-m-Y');
?><center>
<table border="0">
<tr>
      <th><img src="img/surat.jpg"><hr>
      <h3>Surat Jalan</h3>
      <hr><br>
      </th>
  </tr>
</table>
  <table border=0 width=700>
 
    <tr><td>ID Transaksi</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td><?php echo $data['id_transaksi'];?></td></tr>
    <tr><td>Nama Pelanggan</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td><?php echo $data['nama'];?></td></tr>
    <tr><td>Alamat Ambil Barang</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td><?php echo $data['alamat'];?></td></tr>
    <tr><td>Alamat Kirim Barang</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td><?php echo $data['alamat_tujuan'];?></td></tr>
    <tr><td>No Telepon</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td><?php echo $data['no_tlp'];?></td></tr>
    <tr><td>Tanggal Angkut</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td>
  <?php
  $tanggal=$data['tanggal']; 
  echo date("d-m-Y", strtotime($tanggal));
  ?>
  </td></tr>
  <tr><td>Kota Asal</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td><?php echo $data['kota_asal'];?></td></tr>
  <tr><td>Kota Tujuan</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td><?php echo $data['kota_tujuan'];?></td></tr>
  <tr><td>Downpayment</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td>
  <?php
  $jumlah=$data['dp'];
  $jumlah_desimal="2";
  $pemisah_desimal=",";
  $pemisah_ribuan=".";
  echo "Rp ".number_format($jumlah,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan);
  ?>
  </td></tr>
  <tr><td>Sisa Pembayaran</td><td>&nbsp;&nbsp;: &nbsp;&nbsp;</td><td>
  <?php
  $jumlah=$data['sisa'];
  $jumlah_desimal="2";
  $pemisah_desimal=",";
  $pemisah_ribuan=".";
  echo "Rp ".number_format($jumlah,$jumlah_desimal,$pemisah_desimal,$pemisah_ribuan);
  ?>
  </td></tr>
  </table>
  <br>
 
  <br><br>
  </td></tr>
  <tr><th>
  Purwakarta, <?= $tanggal_sekarang;?>
  <br><br><br>
  Admin CV. Merdeka Transport
  <tr><th>
  <script>  
    window.load = print_d();  
    function print_d(){  
    window.print();  
    }  
  </script>
  </center>