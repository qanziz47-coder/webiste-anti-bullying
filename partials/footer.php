<footer class="bg-dark text-light pt-5 pb-3 mt-5">
  <div class="container">
    <div class="row g-4">
      
      <!-- Identitas -->
      <div class="col-md-4">
        <h5 class="fw-bold"><i class="bi bi-shield-check text-danger me-2"></i>AntiBullying</h5>
        <p class="small text-secondary">Platform pelaporan bullying yang aman, anonim, dan dilindungi hukum.</p>
      </div>

      <!-- Kontak Bantuan -->
      <div class="col-md-4">
        <h5 class="fw-bold">Kontak Bantuan</h5>
        <p class="small mb-2"><i class="bi bi-envelope me-2 text-secondary"></i>sapa129@kemenpppa.go.id</p>
        <p class="small mb-2"><i class="bi bi-telephone me-2 text-secondary"></i>08111-129-129</p>
        <p class="small mb-0"><i class="bi bi-clock me-2 text-secondary"></i>Layanan 24 Jam</p>
      </div>

      <!-- Link -->
      <div class="col-md-4">
        <h5 class="fw-bold">Tautan</h5>
        <ul class="list-unstyled small mb-0">
          <li class="mb-1"><a href="<?= BASE_URL ?>lapor.php" class="text-secondary text-decoration-none">Laporkan</a></li>
          <li class="mb-1"><a href="<?= BASE_URL ?>cek_status.php" class="text-secondary text-decoration-none">Cek Status</a></li>
          <li class="mb-1"><a href="<?= BASE_URL ?>angket.php" class="text-secondary text-decoration-none">Angket Nasional</a></li>
          <li><a href="<?= BASE_URL ?>halaman/hukum.php" class="text-secondary text-decoration-none">Ketentuan Hukum</a></li>
        </ul>
      </div>

    </div>

    <!-- Kotak kecil Perlindungan Perempuan -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="p-3 rounded-3" style="background-color: rgba(255,255,255,0.05); border-left: 3px solid var(--merah);">
          <p class="small text-secondary mb-0">
            <i class="bi bi-gender-female me-2" style="color: var(--merah);"></i> 
            Korban perempuan berhak mendapatkan perlindungan khusus dari <strong>Pusat Pelayanan Terpadu Pemberdayaan Perempuan dan Anak (P2TP2A)</strong> setempat.
          </p>
        </div>
      </div>
    </div>

    <hr class="border-secondary mt-4">
    
    <!-- COPYRIGHT & REFERENSI -->
    <div class="row">
      <div class="col-md-6 text-center text-md-start">
        <p class="small text-secondary mb-0">
          &copy; <?= date('Y') ?> Proyek Kelompok PPKn - Fajri. Hak cipta dilindungi.
        </p>
      </div>
      <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
        <p class="small text-secondary mb-0">
          <strong>Sumber Referensi:</strong> 
          <a href="https://stopbullying.gov" target="_blank" class="text-secondary text-decoration-none">StopBullying.gov</a> | 
          <a href="https://perundungan.kemkes.go.id" target="_blank" class="text-secondary text-decoration-none">Kemkes RI</a> | 
          <a href="https://sapa129.kemenpppa.go.id" target="_blank" class="text-secondary text-decoration-none">KemenPPPA</a>
        </p>
      </div>
    </div>

  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>