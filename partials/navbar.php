<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top navbar-profesional">
  <div class="container">
    
    <!-- BAGIAN LOGO -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?= BASE_URL ?>index.php">
      <i class="bi bi-shield-fill-check fs-4" style="color: var(--merah);"></i>
      <span class="fw-bold" style="font-size: 1.15rem; letter-spacing: -0.3px; color: var(--biru);">
        AntiBullying
      </span>
    </a>
    <!-- TONGGLE buat HP -->
    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU & TOMBOL -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>index.php#jenis">Jenis Bullying</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>page/dampak.php">Dampak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>page/hukum.php">Dasar Hukum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>cek_status.php">Cek Status</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>angket.php">Angket</a>
        </li>
      </ul>
      
      <div class="d-flex mt-3 mt-lg-0">
        <a href="<?= BASE_URL ?>lapor.php" class="btn btn-merah-profesional px-4 py-2">
          Buat Laporan
        </a>
      </div>
    </div>

  </div>
</nav>