<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/auth.php';

// Ambil data laporan
$laporan = $pdo->query("SELECT * FROM laporan ORDER BY created_at DESC")->fetchAll();
$totalAngket = (int)$pdo->query("SELECT COUNT(*) FROM angket")->fetchColumn();
$totalSelesai = (int)$pdo->query("SELECT COUNT(*) FROM laporan WHERE status='selesai'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard Admin — AntiBullying</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body { background-color: #f8f9fa; font-family: 'Inter', system-ui, sans-serif; }
    .card-stat { border: 1px solid #eaeaea; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.02); }
    .table-custom th { background-color: #f1f3f5; font-size: 0.85rem; text-transform: uppercase; color: #6c757d; letter-spacing: 0.5px; }
    .table-custom td { vertical-align: middle; font-size: 0.95rem; }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark shadow-sm">
  <div class="container">
    <span class="navbar-brand fw-bold"><i class="bi bi-shield-lock me-2"></i>Dashboard Admin</span>
    <div class="text-white d-flex align-items-center">
      <span class="me-3 small">Halo, <strong><?= e($_SESSION['admin_username']) ?></strong></span>
      <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">
  
  <!-- Kartu Statistik -->
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card card-stat p-3">
        <small class="text-secondary fw-semibold">Total Laporan Masuk</small>
        <div class="fs-2 fw-bold text-dark mt-1"><?= count($laporan) ?></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-stat p-3">
        <small class="text-secondary fw-semibold">Total Angket Terkumpul</small>
        <div class="fs-2 fw-bold text-dark mt-1"><?= $totalAngket ?></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-stat p-3">
        <small class="text-secondary fw-semibold">Laporan Selesai</small>
        <div class="fs-2 fw-bold text-success mt-1"><?= $totalSelesai ?></div>
      </div>
    </div>
  </div>

  <!-- Tabel Laporan -->
  <div class="card card-stat">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
      <h5 class="fw-bold mb-0">Semua Laporan</h5>
      <input type="text" id="searchInput" class="form-control form-control-sm w-25" placeholder="Cari kode atau jenis...">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-custom mb-0" id="tabelLaporan">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Jenis</th>
              <th>Pelapor</th>
              <th>Kehawatiran</th>
              <th>Status</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php if (!$laporan): ?>
            <tr><td colspan="7" class="text-center text-secondary py-4">Belum ada laporan yang masuk.</td></tr>
          <?php endif; ?>
          <?php foreach ($laporan as $l): ?>
            <tr>
              <td class="fw-bold text-dark"><?= e($l['kode']) ?></td>
              <td><?= e($l['jenis']) ?></td>
              <td>
                <?php if ($l['anonim']): ?>
                  <span class="badge bg-secondary">Anonim</span>
                <?php else: ?>
                  <?= e($l['nama_pelapor'] ?: '-') ?>
                <?php endif; ?>
              </td>
              <td>
                <?php 
                  // Menampilkan tingkat kehawatiran jika kolomnya ada di database
                  $khawatir = $l['kehawatiran'] ?? '-';
                  if ($khawatir == 'Sangat Khawatir') echo '<span class="badge bg-danger">Sangat</span>';
                  elseif ($khawatir == 'Khawatir') echo '<span class="badge bg-warning text-dark">Khawatir</span>';
                  elseif ($khawatir == 'Sedikit Khawatir') echo '<span class="badge bg-info text-dark">Sedikit</span>';
                  else echo '<span class="text-muted small">-</span>';
                ?>
              </td>
              <td>
                <?php
                $badge = ['diterima'=>'secondary','diproses'=>'warning','selesai'=>'success'][$l['status']] ?? 'secondary';
                ?>
                <span class="badge bg-<?= $badge ?>"><?= ucfirst($l['status']) ?></span>
              </td>
              <td><small class="text-secondary"><?= date('d/m/y H:i', strtotime($l['created_at'])) ?></small></td>
              <td>
                <a href="detail.php?id=<?= (int)$l['id'] ?>" class="btn btn-sm btn-outline-danger fw-bold">
                  <i class="bi bi-eye"></i> Detail
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- Fitur Pencarian -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#tabelLaporan tbody tr');
    
    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>