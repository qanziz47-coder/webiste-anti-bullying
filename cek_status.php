<?php
require_once 'config/db.php';
$judul = 'Cek Status';
include 'partials/head.php';

$data = null;
$kodeInput = $_GET['kode'] ?? '';
if ($kodeInput !== '') {
    $stmt = $pdo->prepare("SELECT kode, jenis, status, created_at FROM laporan WHERE kode = ?");
    $stmt->execute([$kodeInput]);
    $data = $stmt->fetch();
}
?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      
      <!-- Header -->
      <div class="text-center mb-4">
        <h1 class="fw-bolder mb-2" style="letter-spacing: -0.5px;">Cek Status Laporan</h1>
        <p class="text-secondary">Masukkan kode tracking yang kamu terima setelah mengirim laporan.</p>
      </div>

      <!-- Form Cek Status -->
      <div class="card border-light-subtle shadow-sm mb-5" style="border-radius: 12px;">
        <div class="card-body p-4 p-md-5">
          <form method="GET">
            <label class="form-label fw-bold">Kode Tracking</label>
            <div class="input-group input-group-lg mb-3">
              <input type="text" name="kode" class="form-control" placeholder="Contoh: LAP-20231025-A1B2C3" value="<?= e($kodeInput) ?>" required>
              <button class="btn btn-danger px-4 fw-bold" type="submit">Cek</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Hasil Pencarian -->
      <?php if ($kodeInput !== '' && !$data): ?>
        <div class="alert alert-warning border-0 shadow-sm text-center">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>Kode tracking tidak ditemukan. Pastikan Anda mengetiknya dengan benar.
        </div>
      <?php endif; ?>

      <?php if ($data): ?>
        <div class="card border-success shadow-sm" style="border-radius: 12px; border-left: 5px solid #198754 !important;">
          <div class="card-header bg-white border-0 pt-4 pb-0">
            <h5 class="fw-bold mb-0 text-success"><i class="bi bi-check-circle-fill me-2"></i>Laporan Ditemukan</h5>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-sm mb-0">
              <tr>
                <td class="text-secondary" width="140">Kode Tracking</td>
                <td class="fw-bold"><?= e($data['kode']) ?></td>
              </tr>
              <tr>
                <td class="text-secondary">Jenis Laporan</td>
                <td class="fw-bold"><?= e($data['jenis']) ?></td>
              </tr>
              <tr>
                <td class="text-secondary">Tanggal Dilaporkan</td>
                <td><?= date('d M Y - H:i', strtotime($data['created_at'])) ?></td>
              </tr>
              <tr>
                <td class="text-secondary">Status Saat Ini</td>
                <td>
                  <?php
                  $badge = ['diterima'=>'secondary','diproses'=>'warning','selesai'=>'success'][$data['status']] ?? 'secondary';
                  $teks  = ['diterima'=>'Diterima (Menunggu Diproses)','diproses'=>'Sedang Ditangani oleh Guru BK','selesai'=>'Selesai Ditangani'][$data['status']] ?? $data['status'];
                  ?>
                  <span class="badge bg-<?= $badge ?> px-3 py-2" style="font-size: 0.85rem;"><?= $teks ?></span>
                </td>
              </tr>
            </table>
          </div>
        </div>
      <?php endif; ?>

      <!-- Panduan Tambahan (Mengisi ruang kosong) -->
      <div class="mt-5 p-4 rounded-3 bg-light border border-light-subtle">
        <h6 class="fw-bold mb-3">Lupa kode tracking kamu?</h6>
        <ul class="text-secondary small mb-0 ps-3">
          <li class="mb-2">Kode tracking diberikan <strong>tepat setelah kamu selesai mengirim laporan</strong> di halaman formulir.</li>
          <li class="mb-2">Pastikan kamu sudah menyalin atau mengambil screenshot kode tersebut.</li>
          <li>Jika kamu benar-benar kehilangannya, silakan buat laporan baru atau hubungi Guru BK secara langsung.</li>
        </ul>
      </div>

    </div>
  </div>
</div>

<?php include 'partials/footer.php'; ?>
</body>
</html>