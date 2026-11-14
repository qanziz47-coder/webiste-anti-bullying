<?php
require_once __DIR__ . '/../config/db.php';
$judul = 'Dampak Bullying';
include __DIR__ . '/../partials/head.php';
?>

<div class="container py-5" style="max-width:860px;">

  <div class="mb-4">
    <div class="text-uppercase small fw-semibold mb-2" style="color:var(--merah);letter-spacing:.08em;">
      Edukasi
    </div>
    <h1 class="mb-3">Dampak Negatif Bullying</h1>
    <p class="text-secondary">
      Bullying bukan sekadar "bercanda" atau "kenakalan biasa". Dampaknya bisa
      dirasakan jangka panjang, bukan hanya oleh korban, tetapi juga pelaku,
      saksi, dan lingkungan sekolah.
    </p>
  </div>

  <!-- DAMPAK PADA KORBAN -->
  <section class="mb-4">
    <h2 class="judul-garis mb-3">1. Dampak pada Korban</h2>

    <div class="card-bersih mb-3">
      <div class="fw-semibold mb-2">Dampak Psikologis</div>
      <ul class="text-secondary small mb-0 ps-3">
        <li>Rasa cemas, takut, dan waspada berlebihan</li>
        <li>Depresi dan perasaan tidak berharga</li>
        <li>Harga diri menurun, merasa diri lemah</li>
        <li>Gangguan tidur dan mimpi buruk</li>
        <li>Kehilangan minat pada hal yang disukai</li>
        <li>Muncul pikiran untuk menyakiti diri sendiri</li>
      </ul>
    </div>

    <div class="card-bersih mb-3">
      <div class="fw-semibold mb-2">Dampak Sosial</div>
      <ul class="text-secondary small mb-0 ps-3">
        <li>Menarik diri dari pergaulan</li>
        <li>Sulit percaya pada orang lain</li>
        <li>Kehilangan teman dan dukungan sosial</li>
        <li>Merasa terisolasi dan sendirian</li>
        <li>Menghindari kegiatan sekolah atau ekstrakurikuler</li>
      </ul>
    </div>

    <div class="card-bersih mb-3">
      <div class="fw-semibold mb-2">Dampak Akademis</div>
      <ul class="text-secondary small mb-0 ps-3">
        <li>Nilai menurun drastis</li>
        <li>Sulit konsentrasi di kelas</li>
        <li>Sering absen atau bolos sekolah</li>
        <li>Kehilangan motivasi belajar</li>
        <li>Berpotensi putus sekolah</li>
      </ul>
    </div>

    <div class="card-bersih">
      <div class="fw-semibold mb-2">Dampak Fisik</div>
      <ul class="text-secondary small mb-0 ps-3">
        <li>Luka, memar, atau cedera akibat kekerasan</li>
        <li>Sakit kepala dan sakit perut akibat stres</li>
        <li>Gangguan makan (makan berlebihan atau tidak mau makan)</li>
        <li>Kelelahan kronis</li>
      </ul>
    </div>
  </section>

  <!-- DAMPAK PADA PELAKU -->
  <section class="mb-4">
    <h2 class="judul-garis mb-3">2. Dampak pada Pelaku</h2>
    <p class="text-secondary small mb-3">
      Pelaku bullying juga merasakan dampak negatif, meskipun sering tidak disadari.
    </p>
    <div class="card-bersih">
      <ul class="text-secondary small mb-0 ps-3">
        <li>Berisiko terlibat masalah hukum (Pasal 45 UU ITE, UU Perlindungan Anak)</li>
        <li>Dikucilkan dari pergaulan sehat</li>
        <li>Kesulitan membangun hubungan yang baik</li>
        <li>Berisiko melakukan kekerasan yang lebih serius di masa depan</li>
        <li>Prestasi akademis terganggu karena sering dipanggil guru BK</li>
        <li>Citra diri buruk di mata teman dan guru</li>
      </ul>
    </div>
  </section>

  <!-- DAMPAK PADA SAKSI -->
  <section class="mb-4">
    <h2 class="judul-garis mb-3">3. Dampak pada Saksi</h2>
    <p class="text-secondary small mb-3">
      Siswa yang melihat bullying juga bisa terkena dampaknya.
    </p>
    <div class="card-bersih">
      <ul class="text-secondary small mb-0 ps-3">
        <li>Merasa bersalah karena tidak membantu</li>
        <li>Cemas dan takut menjadi korban berikutnya</li>
        <li>Menjadi tidak peka terhadap kekerasan</li>
        <li>Kehilangan rasa aman di sekolah</li>
        <li>Terganggu konsentrasi belajar</li>
      </ul>
    </div>
  </section>

  <!-- DAMPAK PADA SEKOLAH -->
  <section class="mb-4">
    <h2 class="judul-garis mb-3">4. Dampak pada Sekolah dan Lingkungan</h2>
    <div class="card-bersih">
      <ul class="text-secondary small mb-0 ps-3">
        <li>Suasana belajar menjadi tidak nyaman dan tidak aman</li>
        <li>Reputasi sekolah menurun</li>
        <li>Hubungan antara siswa, guru, dan orang tua menjadi tegang</li>
        <li>Meningkatnya kasus kekerasan lain di sekolah</li>
        <li>Membutuhkan biaya dan waktu lebih untuk penanganan</li>
      </ul>
    </div>
  </section>

  <!-- DAMPAK JANGKA PANJANG -->
  <section class="mb-4">
    <h2 class="judul-garis mb-3">5. Dampak Jangka Panjang</h2>
    <p class="text-secondary small mb-3">
      Jika tidak ditangani, dampak bullying bisa terbawa hingga dewasa.
    </p>
    <div class="row g-3">
      <div class="col-md-6">
        <div class="card-bersih h-100">
          <div class="fw-semibold mb-1">Bagi Korban</div>
          <p class="text-secondary small mb-0">
            Berisiko mengalami gangguan kecemasan, depresi, dan kesulitan
            membangun kepercayaan dalam hubungan sosial maupun kerja.
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-bersih h-100">
          <div class="fw-semibold mb-1">Bagi Pelaku</div>
          <p class="text-secondary small mb-0">
            Berisiko memiliki catatan kriminal, kesulitan mendapat pekerjaan,
            dan melanjutkan pola kekerasan dalam keluarga.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- AJAKAN -->
  <div class="p-4 rounded-3 text-white" style="background:var(--biru);">
    <h5 class="fw-bold mb-2">Jangan tunggu dampaknya makin parah.</h5>
    <p class="small mb-3 opacity-75">
      Kalau kamu atau temanmu mengalami bullying, laporkan sekarang.
      Laporan bisa dikirim tanpa nama dan akan ditangani oleh guru BK.
    </p>
    <a href="<?= BASE_URL ?>lapor.php" class="btn btn-light fw-semibold">Buat Laporan</a>
  </div>

  <div class="p-3 bg-light rounded-3 small text-secondary mt-4">
    <strong>Catatan:</strong> Halaman ini bersifat edukatif. Jika kamu atau seseorang
    yang kamu kenal mengalami dampak serius seperti depresi berat atau keinginan
    menyakiti diri, segera hubungi guru BK, orang tua, atau layanan konseling
    profesional.
  </div>

</div>

<script>
const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('show'); io.unobserve(e.target); } });
}, { threshold: 0.12 });
document.querySelectorAll('.judul-garis, .reveal').forEach(el => io.observe(el));
</script>

<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>