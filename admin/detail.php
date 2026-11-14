<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/auth.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM laporan WHERE id = ?");
$stmt->execute([$id]);
$l = $stmt->fetch();
if (!$l) { die('Laporan tidak ditemukan.'); }

// Proses kalau Admin menyimpan perubahan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? 'diterima';
    $balasan = trim($_POST['balasan_admin'] ?? '');
    
    if (in_array($status, ['diterima','diproses','selesai'])) {
        $up = $pdo->prepare("UPDATE laporan SET status = ?, balasan_admin = ? WHERE id = ?");
        $up->execute([$status, $balasan, $id]);
        $_SESSION['pesan_sukses'] = "Status dan balasan berhasil diperbarui!";
        header('Location: detail.php?id=' . $id); exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Detail Laporan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"></head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark"><div class="container">
  <a href="dashboard.php" class="navbar-brand fw-bold">← Kembali</a>
  <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
</div></nav>

<div class="container py-4" style="max-width:820px;">
  <?php if (isset($_SESSION['pesan_sukses'])): ?>
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show">
      <i class="bi bi-check-circle-fill me-2"></i> <?= $_SESSION['pesan_sukses'] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['pesan_sukses']); ?>
  <?php endif; ?>

  <div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0"><?= e($l['kode']) ?></h4>
        <span class="badge bg-<?= ['diterima'=>'secondary','diproses'=>'warning','selesai'=>'success'][$l['status']] ?> px-3 py-2">
          Status: <?= ucfirst($l['status']) ?>
        </span>
      </div>

      <table class="table table-sm table-borderless">
        <tr><td class="fw-semibold text-secondary" width="150">Jenis Laporan</td><td><?= e($l['jenis']) ?></td></tr>
        <tr><td class="fw-semibold text-secondary">Tanggal</td><td><?= date('d M Y - H:i', strtotime($l['created_at'])) ?></td></tr>
        <tr><td class="fw-semibold text-secondary">Anonim</td><td><?= $l['anonim'] ? 'Ya' : 'Tidak' ?></td></tr>
        <?php if (!$l['anonim']): ?>
        <tr><td class="fw-semibold text-secondary">Nama Pelapor</td><td><?= e($l['nama_pelapor'] ?: '-') ?></td></tr>
        <tr><td class="fw-semibold text-secondary">Kontak</td><td><?= e($l['kontak'] ?: '-') ?></td></tr>
        <?php endif; ?>
        <tr><td class="fw-semibold text-secondary">Kronologi</td><td><?= nl2br(e($l['kronologi'])) ?></td></tr>
        <tr>
          <td class="fw-semibold text-secondary">Bukti</td>
          <td>
            <?php if ($l['bukti']): ?>
              <a href="<?= BASE_URL ?>uploads/lihat.php?f=<?= e($l['bukti']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Bukti</a>
            <?php else: ?>—<?php endif; ?>
          </td>
        </tr>
      </table>

      <hr class="my-4">

      <!-- FORM UBAH STATUS & BALASAN -->
      <form method="POST" class="bg-light p-4 rounded-3 border">
        <h5 class="fw-bold mb-3"><i class="bi bi-chat-dots-fill text-primary me-2"></i>Berikan Tanggapan / Balasan</h5>
        
        <div class="mb-3">
          <label class="form-label fw-bold">Ubah Status Laporan</label>
          <select name="status" class="form-select">
            <?php foreach (['diterima','diproses','selesai'] as $s): ?>
              <option value="<?= $s ?>" <?= $l['status']===$s?'selected':'' ?>><?= ucfirst($s) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold">Pesan Balasan (Akan dilihat oleh pelapor via Kode Tracking)</label>
          <textarea name="balasan_admin" rows="4" class="form-control" placeholder="Contoh: Halo, laporanmu sudah kami terima."><?= e($l['balasan_admin'] ?? '') ?></textarea>
        </div>

        <button class="btn btn-danger fw-bold px-4"><i class="bi bi-save me-2"></i>Simpan Status & Balasan</button>
      </form>

    </div>
  </div>
</div>
</body></html>