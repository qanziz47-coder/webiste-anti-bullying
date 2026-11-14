<?php
require_once 'config/db.php';
$judul = 'Buat Laporan';
include 'partials/head.php';
?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      
      <h2 class="fw-bold mb-4">Formulir Laporan Bullying</h2>

      <!-- Notifikasi -->
      <?php if (isset($_GET['sukses'])): ?>
        <div class="alert alert-success border-0 shadow-sm mb-4">
          <h5 class="fw-bold mb-2">Laporan Diterima</h5>
          <p class="mb-2">Simpan kode rahasia ini untuk mengecek status:</p>
          <div class="fs-4 fw-bold text-success mb-3" style="letter-spacing:2px;"><?= e($_GET['kode']) ?></div>
          <a href="cek_status.php?kode=<?= e($_GET['kode']) ?>" class="btn btn-sm btn-success">Cek Status</a>
        </div>
      <?php endif; ?>

      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger border-0 shadow-sm mb-4"><?= e($_GET['error']) ?></div>
      <?php endif; ?>

      <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">
          <form action="lapor_proses.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
              <label class="form-label fw-bold">Jenis Bullying</label>
              <select name="jenis" class="form-select" required>
                <option value="">Pilih...</option>
                <option value="Verbal">Verbal</option>
                <option value="Fisik">Fisik</option>
                <option value="Sosial">Sosial</option>
                <option value="Cyberbullying">Online</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Ceritakan Kejadiannya</label>
              <textarea name="kronologi" rows="4" class="form-control" required placeholder="Sebutkan waktu, tempat, dan siapa yang terlibat..."></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Bukti (Opsional)</label>
              <input type="file" name="bukti" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
            </div>

            <div class="p-3 bg-light rounded mb-3">
              <div class="form-check">
                <input type="checkbox" name="anonim" value="1" class="form-check-input" id="anonim" onchange="document.getElementById('identitas').style.display = this.checked ? 'none' : 'block';">
                <label class="form-check-label fw-bold" for="anonim">Saya melapor secara anonim</label>
              </div>
            </div>

            <div id="identitas" class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">Nama Pelapor</label>
                <input type="text" name="nama_pelapor" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Kontak (WA/Email)</label>
                <input type="text" name="kontak" class="form-control">
              </div>
            </div>

            <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">Kirim Laporan</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php include 'partials/footer.php'; ?>
</body>
</html>