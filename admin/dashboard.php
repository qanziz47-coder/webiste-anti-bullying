<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/auth.php';

$laporan = $pdo->query("SELECT * FROM laporan ORDER BY created_at DESC")->fetchAll();
$totalAngket = (int)$pdo->query("SELECT COUNT(*) FROM angket")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Dashboard Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"></head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark"><div class="container">
  <span class="navbar-brand fw-bold">Dashboard Admin</span>
  <div class="text-white">
    <span class="me-3 small">Halo, <?= e($_SESSION['admin_username']) ?></span>
    <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
  </div>
</div></nav>
<div class="container py-4">
  <div class="row g-3 mb-4">
    <div class="col-md-4"><div class="card p-3"><small class="text-secondary">Total Laporan</small><div class="fs-3 fw-bold"><?= count($laporan) ?></div></div></div>
    <div class="col-md-4"><div class="card p-3"><small class="text-secondary">Total Angket</small><div class="fs-3 fw-bold"><?= $totalAngket ?></div></div></div>
    <div class="col-md-4"><div class="card p-3"><small class="text-secondary">Selesai</small><div class="fs-3 fw-bold text-success"><?= count(array_filter($laporan, fn($l)=>$l['status']==='selesai')) ?></div></div></div>
  </div>

  <div class="card">
    <div class="card-header fw-bold">Semua Laporan</div>
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light"><tr><th>Kode</th><th>Jenis</th><th>Pelapor</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php if (!$laporan): ?>
          <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada laporan.</td></tr>
        <?php endif; ?>
        <?php foreach ($laporan as $l): ?>
          <tr>
            <td class="fw-semibold"><?= e($l['kode']) ?></td>
            <td><?= e($l['jenis']) ?></td>
            <td><?= $l['anonim'] ? '<span class="badge bg-secondary">Anonim</span>' : e($l['nama_pelapor'] ?: '-') ?></td>
            <td><span class="badge bg-<?= ['diterima'=>'secondary','diproses'=>'warning','selesai'=>'success'][$l['status']] ?>"><?= e($l['status']) ?></span></td>
            <td><small><?= e($l['created_at']) ?></small></td>
            <td><a href="detail.php?id=<?= (int)$l['id'] ?>" class="btn btn-sm btn-outline-danger">Detail</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body></html>