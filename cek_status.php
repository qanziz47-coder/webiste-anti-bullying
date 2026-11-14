<?php
require_once 'config/db.php';
$judul = 'Cek Status';
include 'partials/head.php';

$data = null;
$kodeInput = $_GET['kode'] ?? '';
if ($kodeInput !== '') {
    $stmt = $pdo->prepare("SELECT * FROM laporan WHERE kode = ?");
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
      <div class="card border-light-subtle shadow-sm mb-4" style="border-radius: 12px;">
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

      <!-- Notifikasi Tidak Ditemukan -->
      <?php if ($kodeInput !== '' && !$data): ?>
        <div class="alert alert-warning border-0 shadow-sm text-center">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>Kode tracking tidak ditemukan. Pastikan Anda mengetiknya dengan benar.
        </div>
      <?php endif; ?>

      <!-- Hasil Pencarian -->
      <?php if ($data): ?>
        <div class="card border-success shadow-sm mb-4" style="border-radius: 12px; border-left: 5px solid #198754 !important;">
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
                  $teks  = ['diterima'=>'Diterima (Menunggu Diproses)','diproses'=>'Sedang Ditangani oleh Satgas Anti-Bullying','selesai'=>'Selesai Ditangani'][$data['status']] ?? $data['status'];
                  ?>
                  <span class="badge bg-<?= $badge ?> px-3 py-2" style="font-size: 0.85rem;"><?= $teks ?></span>
                </td>
              </tr>
            </table>
          </div>
        </div>

        <!-- BALASAN  -->
        <?php if (!empty($data['balasan_admin'])): ?>
          <div class="card border-primary shadow-sm mb-4" style="border-radius: 12px; border-left: 5px solid #0d6efd !important;">
            <div class="card-body p-4">
              <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-chat-left-text-fill me-2"></i>Balasan dari Satgas Anti-Bullying:</h6>
              <div class="p-3 rounded-3 bg-light">
                <p class="mb-0 text-dark" style="font-size: 0.95rem;"><?= nl2br(e($data['balasan_admin'])) ?></p>
              </div>
            </div>
          </div>
        <?php endif; ?>

      <?php endif; ?>

      <!-- Panduan Tambahan -->
      <div class="mt-4 p-4 rounded-3 bg-light border border-light-subtle">
        <h6 class="fw-bold mb-3">Lupa kode tracking kamu?</h6>
        <ul class="text-secondary small mb-0 ps-3">
          <li class="mb-2">Kode tracking diberikan <strong>tepat setelah kamu selesai mengirim laporan</strong> di halaman formulir.</li>
          <li class="mb-2">Pastikan kamu sudah menyalin atau mengambil screenshot kode tersebut.</li>
          <li>Jika kamu benar-benar kehilangannya, silakan buat laporan baru atau hubungi Satgas Anti-Bullying secara langsung.</li>
        </ul>
      </div>

    </div>
  </div>
</div>

<!-- ================= NOTIFIKASI CHATBOT  ================= -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
  <div id="chatbotToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #1e3a5f; color: white; border-radius: 12px;">
    <div class="toast-header bg-transparent text-white border-0">
      <i class="bi bi-robot me-2 fs-5"></i>
      <strong class="me-auto">Sistem Anti-Bullying</strong>
      <small>Baru saja</small>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <?php if ($data && $data['status'] == 'diproses'): ?>
        Halo! Laporanmu sedang ditangani oleh Satgas Anti-Bullying. Mohon tunggu dan tetap semangat ya!
      <?php elseif ($data && $data['status'] == 'selesai'): ?>
        Hore! Laporanmu sudah selesai ditangani. Tetap jaga lingkungan sekolah yang aman ya!
      <?php else: ?>
        Terima kasih sudah berani melapor. Laporanmu sudah masuk ke sistem dan akan segera kami proses.
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      var toastEl = document.getElementById('chatbotToast');
      if (toastEl) {
          var toast = new bootstrap.Toast(toastEl, { delay: 5000 });
          toast.show();
      }
  });
</script>

<?php include 'partials/footer.php'; ?>
</body>
</html>