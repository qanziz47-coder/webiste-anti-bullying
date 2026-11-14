<?php
require_once 'config/db.php';

$total    = (int) $pdo->query("SELECT COUNT(*) FROM laporan")->fetchColumn();
$selesai  = (int) $pdo->query("SELECT COUNT(*) FROM laporan WHERE status='selesai'")->fetchColumn();
$diproses = (int) $pdo->query("SELECT COUNT(*) FROM laporan WHERE status='diproses'")->fetchColumn();

$judul = 'Beranda';
include 'partials/head.php';
?>

<!-- ================= HERO ================= -->
<section id="tinggi" class="py-5" style="background-color: #fafafa; border-bottom: 1px solid #eaeaea;">
  <div class="container py-5">
    <div class="row align-items-center g-5">
      
      <div class="col-lg-6">
        <div class="text-uppercase small fw-bold mb-3" style="color: var(--merah); letter-spacing: 1px;">
          Layanan Anti Bullying
        </div>
        <!-- Typo "Perundungan" sudah diperbaiki menjadi "Perundungan" -->
        <h1 class="fw-bolder mb-3" style="font-size: clamp(2.2rem, 4vw, 3rem); line-height: 1.2; letter-spacing: -1px;">
          Hentikan<br>Perundungan
        </h1>
        <p class="text-secondary mb-4" style="font-size: 1.05rem; max-width: 500px;">
          Ketika orang dewasa merespons perilaku perundungan dengan cepat dan konsisten, mereka mengirimkan pesan bahwa hal itu tidak dapat diterima. Penelitian menunjukkan bahwa hal ini dapat menghentikan perilaku perundungan seiring waktu. Orang tua, staf sekolah, dan orang dewasa lainnya di komunitas dapat membantu anak-anak mencegah perundungan dengan membicarakannya, membangun lingkungan sekolah yang aman, dan menciptakan strategi pencegahan perundungan di seluruh komunitas.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <!-- Tanda seru dihapus -->
          <a href="lapor.php" class="btn btn-aksen btn-lg px-4 py-3 fw-bold" style="border-radius: 8px;">
            Buat Laporan
          </a>
          <a href="cek_status.php" class="btn btn-outline-dark btn-lg px-4 py-3 fw-bold" style="border-radius: 8px;">
            Cek Status
          </a>
        </div>
      </div>

      <div class="col-lg-6 text-center">
        <img src="<?= BASE_URL ?>assets/img/hero-dukungan.jpg" 
             alt="Siswa berdiskusi" 
             class="img-fluid rounded-4 shadow-sm"
             style="max-height: 400px; object-fit: cover; width: 100%;"
             onerror="this.style.display='none';">
      </div>

    </div>
  </div>
</section>

<!-- ================= STATISTIK ================= -->
<?php if ($total > 0): ?>
<section class="py-5 bg-white border-bottom">
  <div class="container">
    <div class="row text-center g-4">
      <div class="col-md-4">
        <h2 class="fw-bold mb-1"><?= $total ?></h2>
        <p class="text-secondary small mb-0 text-uppercase" style="letter-spacing: 1px;">Laporan Masuk</p>
      </div>
      <div class="col-md-4 border-start border-end d-none d-md-block">
        <h2 class="fw-bold mb-1"><?= $diproses ?></h2>
        <p class="text-secondary small mb-0 text-uppercase" style="letter-spacing: 1px;">Sedang Ditangani</p>
      </div>
      <div class="col-md-4">
        <h2 class="fw-bold mb-1"><?= $selesai ?></h2>
        <p class="text-secondary small mb-0 text-uppercase" style="letter-spacing: 1px;">Laporan Selesai</p>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================= JENIS BULLYING (EDUKASI) ================= -->
<section class="py-5">
  <div class="container py-4">
    <div class="row g-4">
      
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border border-light-subtle shadow-sm" style="border-radius: 12px;">
          <div class="card-body p-4">
            <i class="bi bi-laptop fs-3 text-dark mb-3 d-block"></i>
            <h5 class="fw-bold mb-2">Perundungan Siber</h5>
            <p class="text-secondary small mb-0">Pelajari apa itu cyberbullying, bagaimana cara mencegahnya, dan cara menghadapinya di media sosial.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border border-light-subtle shadow-sm" style="border-radius: 12px;">
          <div class="card-body p-4">
            <i class="bi bi-hammer fs-3 text-dark mb-3 d-block"></i>
            <h5 class="fw-bold mb-2">Dasar Hukum</h5>
            <p class="text-secondary small mb-0">Perundungan dapat dijerat pidana. Pelajari UU ITE dan UU Perlindungan Anak yang berlaku di Indonesia.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border border-light-subtle shadow-sm" style="border-radius: 12px;">
          <div class="card-body p-4">
            <i class="bi bi-building fs-3 text-dark mb-3 d-block"></i>
            <h5 class="fw-bold mb-2">Peran Sekolah</h5>
            <p class="text-secondary small mb-0">Guru dan staf sekolah menetapkan aturan yang jelas untuk menciptakan lingkungan belajar yang aman.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border border-light-subtle shadow-sm" style="border-radius: 12px;">
          <div class="card-body p-4">
            <i class="bi bi-people fs-3 text-dark mb-3 d-block"></i>
            <h5 class="fw-bold mb-2">Peran Siswa</h5>
            <p class="text-secondary small mb-0">Kamu bisa membantu menghentikan perundungan dengan saling menjaga dan melaporkan jika melihatnya.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= DAMPAK ================= -->
<section class="py-5" style="background-color: #fafafa; border-top: 1px solid #eaeaea; border-bottom: 1px solid #eaeaea;">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Dampak Bullying</h2>
        <p class="text-secondary mb-4">
          Bullying bukan sekadar "bercanda". Dampaknya bisa jangka panjang, bukan hanya bagi korban, tetapi juga pelaku dan lingkungan sekolah.
        </p>
        <ul class="list-unstyled mb-4">
          <li class="mb-2 d-flex gap-2"><i class="bi bi-dash text-dark"></i><span class="text-secondary">Cemas, depresi, dan harga diri menurun</span></li>
          <li class="mb-2 d-flex gap-2"><i class="bi bi-dash text-dark"></i><span class="text-secondary">Menarik diri dari pergaulan</span></li>
          <li class="mb-2 d-flex gap-2"><i class="bi bi-dash text-dark"></i><span class="text-secondary">Nilai akademis turun, sering bolos</span></li>
          <li class="d-flex gap-2"><i class="bi bi-dash text-dark"></i><span class="text-secondary">Berisiko masalah hukum bagi pelaku</span></li>
        </ul>
        <a href="page/dampak.php" class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">
          Baca dampak lengkap
        </a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="<?= BASE_URL ?>assets/img/dampak-sedih.jpg" 
             alt="Ilustrasi dampak bullying" 
             class="img-fluid rounded-4 shadow-sm"
             style="max-height:300px; object-fit:cover;"
             onerror="this.style.display='none';">
      </div>
    </div>
  </div>
</section>

<!-- ================= Dapatkan Bantuan ================= -->
<section class="py-5 bg-white" style="margin-bottom: 80px;">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
             style="width: 70px; height: 70px; background-color: #fee2e2; color: #b91c1c;">
          <i class="bi bi-life-preserver fs-2"></i>
        </div>

        <h2 class="fw-bold mb-3" style="letter-spacing: -0.5px;">Butuh Bantuan Sekarang?</h2>
        
        <p class="text-secondary mb-4" style="font-size: 1.05rem;">
          Jika kamu telah melakukan segala cara untuk menyelesaikan situasi ini namun tidak ada yang berhasil, atau jika kamu/temanmu berada dalam bahaya langsung, jangan tetap diam. Ada cara untuk mendapatkan bantuan.
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a href="lapor.php" class="btn btn-aksen btn-lg px-4 fw-bold" style="border-radius: 8px;">
            Buat Laporan Darurat
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= VIDEO EDUKASI ================= -->
<section class="py-5 video-tengah">
  <div class="container py-4">
    <div class="row align-items-center g-5">
      
      <div class="col-lg-6">
        <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg" style="border: 2px solid rgba(255,255,255,0.1);">
          <iframe src="https://www.youtube.com/embed/kMQzcsaRtyk" 
                  title="Gimana Cara Menghadapi Bullying atau Perundungan?" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen>
          </iframe>
        </div>
      </div>

      <div class="col-lg-6 text-black">
        <h2 class="fw-bold mb-3" style="line-height: 1.3; letter-spacing: -0.5px;">
          Gimana Cara Menghadapi Bullying?
        </h2>
        <p class="text-kecil opacity-75 mb-4" style="font-size: 1.05rem;">
          Tonton video edukasi singkat ini untuk memahami langkah-langkah yang bisa kamu ambil jika mengalami atau melihat tindakan perundungan di sekolah.
        </p>
        <a href="https://youtu.be/kMQzcsaRtyk" target="_blank" class="btn btn-aksen px-4 py-2 fw-bold shadow-sm" style="border-radius: 8px;">
          <i class="bi bi-play-fill fs-5 me-1"></i> Tonton di YouTube
        </a>
      </div>

    </div>
  </div>
</section>

<!-- ================= BANTUAN PEMERINTAH ================= -->
<section class="py-5 bg-light" style="margin-top: 120px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h4 class="fw-bold mb-3">Butuh Bantuan dari Pihak Luar Sekolah?</h4>
        <p class="text-secondary mb-4">
          Jika kamu merasa tidak aman melapor ke sekolah, kamu bisa menghubungi layanan resmi pemerintah secara anonim dan gratis.
        </p>
        
        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <!-- Layanan SAPA 129 (KemenPPPA) -->
          <a href="https://wa.me/628111129129" target="_blank" class="btn btn-outline-success btn-lg px-4 fw-bold" style="border-radius: 8px;">
            <i class="bi bi-whatsapp me-2"></i>SAPA 129 (KemenPPPA)
          </a>
          
          <!-- Layanan KPAI -->
          <a href="https://wa.me/6281110027727" target="_blank" class="btn btn-outline-primary btn-lg px-4 fw-bold" style="border-radius: 8px;">
            <i class="bi bi-shield-check me-2"></i>KPAI
          </a>
        </div>
        
        <p class="text-secondary small mt-3 mb-0">
          <i class="bi bi-lock-fill me-1"></i> Layanan ini dijamin kerahasiaannya oleh negara.
        </p>
      </div>
    </div>
  </div>
</section>

<?php include 'partials/footer.php'; ?>
</body>
</html>