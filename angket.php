<?php
require 'config/db.php';
$judul = 'Angket Nasional';
include 'partials/head.php';
?>
<div class="container py-5" style="max-width:640px;">
  <h1 class="fw-bold mb-2">Angket Nasional Bullying</h1>
  <p class="text-secondary mb-4">Bantu kami memetakan bullying di sekolah. Jawaban anonim.</p>

  <?php if (isset($_GET['sukses'])): ?>
    <div class="alert alert-success">Terima kasih! Jawabanmu sudah tercatat.</div>
  <?php endif; ?>

  <form action="angket_proses.php" method="POST" class="card p-4 shadow-sm">
    <div class="mb-3"><label class="form-label fw-semibold">Kelas</label><input type="text" name="kelas" class="form-control" required placeholder="Contoh: XI RPL 1"></div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Pernah mengalami bullying?</label>
      <select name="pernah_dibully" class="form-select" required>
        <option value="1">Ya</option><option value="0">Tidak</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Jenis bullying yang dialami</label>
      <select name="jenis_bullying" class="form-select">
        <option value="">— Tidak ada —</option>
        <option>Verbal</option><option>Fisik</option><option>Sosial</option><option>Cyberbullying</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Tempat kejadian</label>
      <select name="tempat" class="form-select">
        <option value="">— Tidak ada —</option>
        <option>Kelas</option><option>Kantin</option><option>Lapangan</option><option>Online</option><option>Lainnya</option>
      </select>
    </div>
    <button class="btn btn-danger btn-lg fw-semibold">Kirim Jawaban</button>
  </form>
</div>
<?php include 'partials/footer.php'; ?>
</body>
</html>