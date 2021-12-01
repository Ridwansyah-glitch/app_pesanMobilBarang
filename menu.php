
<nav class="navbar navbar-expand-lg navbar-light fixed-top p-4" style="background-color: #e3f2fd;">
  <div class="container">
    <a class="navbar-brand" href="#">CV Merdeka Transport</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="informasi-tarif.php">Informasi Tarif</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Transaksi
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="pesan-mobil.php">Pesan Mobil</a></li>
            <li><a class="dropdown-item" href="riwayat_transaksi.php">Riwayat Transaksi</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link">About</a>
        </li>
        <?php
          if (isset($_SESSION['pelanggan'])) : ?>
            <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
            </li>
        <?php else  :?>
          <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
          </li> 
        <?php endif; ?>
     </ul>
    </div>
  </div>
</nav>