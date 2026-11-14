<?php
require 'config/db.php';
$judul = 'Cek Status Laporan';
include 'partials/head.php';

$data = null;
$kodeInput = $_GET['kode'] ?? '';
if ($kodeInput !== '') {
    $stmt = $pdo->prepare("SELECT kode, jenis, status, created_at FROM laporan WHERE kode = ?");
    $stmt->execute([$kodeInput]);
    $data = $stmt->fetch();
}
?>

<div class="container py-5" style="max-width:640px;">
  <h1 class="fw-bold mb-2">Cek Status Laporan</h1>
  <p class="text-secondary mb-4">Masukkan kode tracking yang kamu terima.</p>

  <form method="GET" class="card p-4 shadow-sm mb-4">
    <label class="form-label fw-semibold">Kode Tracking</label>
    <div class="input-group">
      <input type="text" name="kode" class="form-control" placeholder="LAP-20250701-A3F9C2" value="<?= e($kodeInput) ?>" required>
      <button class="btn btn-danger">Cek</button>
    </div>
  </form>

  <?php if ($kodeInput !== '' && !$data): ?>
    <div class="alert alert-warning">Kode tidak ditemukan. Periksa kembali.</div>
  <?php endif; ?>

  <?php if ($data): ?>
    <div class="card p-4 shadow-sm">
      <h5 class="fw-bold mb-3">Hasil</h5>
      <table class="table table-sm mb-0">
        <tr><td class="fw-semibold">Kode</td><td><?= e($data['kode']) ?></td></tr>
        <tr><td class="fw-semibold">Jenis</td><td><?= e($data['jenis']) ?></td></tr>
        <tr><td class="fw-semibold">Tanggal</td><td><?= e($data['created_at']) ?></td></tr>
        <tr><td class="fw-semibold">Status</td><td>
          <?php
          $badge = ['diterima'=>'secondary','diproses'=>'warning','selesai'=>'success'][$data['status']] ?? 'secondary';
          ?>
          <span class="badge bg-<?= $badge ?>"><?= e($data['status']) ?></span>
        </td></tr>
      </table>
    </div>
  <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>
</body>
</html>