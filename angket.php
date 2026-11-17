<?php
require_once 'config/db.php';
$judul = 'Angket Nasional';
include 'partials/head.php';

$sukses = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kelas = trim($_POST['kelas'] ?? '');
    $pernah = (int)($_POST['pernah_dibully'] ?? 0);
    $jenis = trim($_POST['jenis_bullying'] ?? '');
    $tempat = trim($_POST['tempat'] ?? '');

    if ($kelas !== '') {
        $stmt = $pdo->prepare("INSERT INTO angket (kelas, pernah_dibully, jenis_bullying, tempat) VALUES (?, ?, ?, ?)");
        $stmt->execute([$kelas, $pernah, $jenis, $tempat]);
        $sukses = true;
    }
}
?>

<div class="container py-5 mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      
      <!-- Header -->
      <div class="text-center mb-5">
        <div class="d-inline-block bg-dark text-white px-3 py-1 text-uppercase fw-bold mb-3" style="letter-spacing: 2px; font-size: 0.8rem;">
          Survei Nasional
        </div>
        <h1 class="fw-black text-uppercase mb-2" style="letter-spacing: -1px;">Angket Perundungan</h1>
        <p class="text-muted fst-italic">Bantu kami memetakan kasus perundungan di sekolah. Jawaban bersifat anonim.</p>
      </div>

      <!-- Notifikasi Sukses -->
      <?php if ($sukses): ?>
        <div class="alert alert-success border-2 border-dark rounded-0 mb-4 text-center">
          <h5 class="fw-bold mb-1">Terima Kasih!</h5>
          <p class="mb-0">Jawaban Anda telah dicatat dalam sistem kami.</p>
        </div>
      <?php endif; ?>

      <!-- Form Angket -->
      <div class="card border-2 border-dark rounded-0 shadow-lg p-4 p-md-5">
        <form method="POST">
          
          <div class="mb-4">
            <label class="form-label fw-bold">Kelas Anda <span class="text-danger">*</span></label>
            <input type="text" name="kelas" class="form-control border-2 border-secondary rounded-0 bg-light" required placeholder="Contoh: XI RPL 1">
          </div>

          <div class="mb-4">
            <label class="form-label fw-bold">Apakah Anda pernah mengalami bullying? <span class="text-danger">*</span></label>
            <select name="pernah_dibully" class="form-select border-2 border-secondary rounded-0 bg-light" required>
              <option value="1">Ya, Pernah</option>
              <option value="0">Tidak Pernah</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label fw-bold">Jenis bullying apa yang dialami?</label>
            <select name="jenis_bullying" class="form-select border-2 border-secondary rounded-0 bg-light">
              <option value="">-- Pilih Jenis --</option>
              <option value="Verbal">Verbal (Ejekan, ancaman)</option>
              <option value="Fisik">Fisik (Pukulan, dorongan)</option>
              <option value="Sosial">Sosial (Dikucilkan, rumor)</option>
              <option value="Cyberbullying">Online (Hinaan di medsos)</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label fw-bold">Di mana kejadiannya sering terjadi?</label>
            <select name="tempat" class="form-select border-2 border-secondary rounded-0 bg-light">
              <option value="">-- Pilih Tempat --</option>
              <option value="Kelas">Di dalam Kelas</option>
              <option value="Kantin">Kantin</option>
              <option value="Lapangan">Lapangan / Olahraga</option>
              <option value="Online">Media Sosial / Online</option>
            </select>
          </div>

          <button type="submit" class="btn btn-dark w-100 py-3 fw-bold text-uppercase rounded-0 mt-4" style="letter-spacing: 1px;">
            Kirim Jawaban
          </button>

        </form>
      </div>

    </div>
  </div>
</div>

<?php include 'partials/footer.php'; ?>
</body>
</html>