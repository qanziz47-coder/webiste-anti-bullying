<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/auth.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM laporan WHERE id = ?");
$stmt->execute([$id]);
$l = $stmt->fetch();
if (!$l) { die('Laporan tidak ditemukan.'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? 'diterima';
    if (in_array($status, ['diterima','diproses','selesai'])) {
        $up = $pdo->prepare("UPDATE laporan SET status = ? WHERE id = ?");
        $up->execute([$status, $id]);
        header('Location: detail.php?id=' . $id . '&ok=1'); exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Detail Laporan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark"><div class="container">
  <a href="dashboard.php" class="navbar-brand fw-bold">← Kembali</a>
  <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
</div></nav>
<div class="container py-4" style="max-width:820px;">
  <?php if (isset($_GET['ok'])): ?><div class="alert alert-success">Status diperbarui.</div><?php endif; ?>
  <div class="card p-4">
    <h4 class="fw-bold mb-3"><?= e($l['kode']) ?></h4>
    <table class="table table-sm">
      <tr><td class="fw-semibold" width="160">Jenis</td><td><?= e($l['jenis']) ?></td></tr>
      <tr><td class="fw-semibold">Tanggal</td><td><?= e($l['created_at']) ?></td></tr>
      <tr><td class="fw-semibold">Anonim</td><td><?= $l['anonim'] ? 'Ya' : 'Tidak' ?></td></tr>
      <tr><td class="fw-semibold">Nama</td><td><?= e($l['nama_pelapor'] ?: '-') ?></td></tr>
      <tr><td class="fw-semibold">Kontak</td><td><?= e($l['kontak'] ?: '-') ?></td></tr>
      <tr><td class="fw-semibold">Kronologi</td><td><?= nl2br(e($l['kronologi'])) ?></td></tr>
      <tr><td class="fw-semibold">Bukti</td><td>
        <?php if ($l['bukti']): ?>
          <a href="<?= BASE_URL ?>uploads/<?= e($l['bukti']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Bukti</a>
        <?php else: ?>—<?php endif; ?>
      </td></tr>
    </table>

    <form method="POST" class="d-flex gap-2 align-items-end mt-3">
      <div class="flex-grow-1">
        <label class="form-label fw-semibold">Ubah Status</label>
        <select name="status" class="form-select">
          <?php foreach (['diterima','diproses','selesai'] as $s): ?>
            <option value="<?= $s ?>" <?= $l['status']===$s?'selected':'' ?>><?= ucfirst($s) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button class="btn btn-danger">Simpan</button>
    </form>
  </div>
</div>
</body></html>