<?php
require_once 'config/db.php';
$judul = 'Buat Laporan';
include 'partials/head.php';
?>

<div class="container py-5 mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      
      <div class="text-center mb-5">
        <h2 class="fw-bolder mb-2" style="letter-spacing: -0.5px;">Form Pengaduan Online</h2>
        <p class="text-secondary">Tindak perundungan pada siswa. Identitas Anda dilindungi.</p>
      </div>

      <!-- Notifikasi PHP -->
      <?php if (isset($_GET['sukses'])): ?>
        <div class="alert alert-success border-0 shadow-sm mb-4 rounded-3">
          <h5 class="fw-bold mb-2">Laporan Diterima</h5>
          <p class="mb-2">Simpan kode rahasia ini untuk mengecek status:</p>
          <div class="fs-4 fw-bold text-success mb-3" style="letter-spacing:2px;"><?= e($_GET['kode']) ?></div>
          <a href="cek_status.php?kode=<?= e($_GET['kode']) ?>" class="btn btn-sm btn-success">Cek Status</a>
        </div>
      <?php endif; ?>
      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger border-0 shadow-sm mb-4 rounded-3"><?= e($_GET['error']) ?></div>
      <?php endif; ?>

      <!-- Kotak Form -->
      <div class="card border-light-subtle shadow-sm" style="border-radius: 16px;">
        <div class="card-body p-4 p-md-5">
          
          <!-- Progress Bar -->
          <div class="mb-4">
            <div class="d-flex justify-content-between text-secondary small fw-bold mb-2">
              <span id="step-text">Langkah 1 dari 6</span>
              <span id="step-percent">16%</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div id="progress-bar" class="progress-bar bg-danger" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <!-- FORM php post -->
          <form action="lapor_proses.php" method="POST" enctype="multipart/form-data" id="formLapor">
            
            <!-- ================= STATUS DARURAT ================= -->
            <div class="form-step active" id="step-1">
              <label class="form-label fw-bold fs-4 mb-2">Apakah kamu dalam keadaan DARURAT? <span class="text-danger">*</span></label>
              <p class="text-secondary small mb-4">Pilih salah satu dibawah ini:</p>
              
              <div class="row g-4 mb-4">
                <!-- Darurat -->
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="status_darurat" id="daruratYa" value="Darurat" required onchange="tampilkanModalDarurat()">
                  <label class="btn w-100 p-4 text-center custom-radio-card" for="daruratYa" style="--warna: #fa5364; --bg-muda: #fa5364; color: white;">
                    <div class="emoji-icon mb-2" style="font-size: 3rem;"><img src="<?= BASE_URL ?>assets/img/alarm.webp" width="50px" ></div>
                    <h5 class="fw-bold mb-1 text-white">DARURAT!</h5>
                    <small class="text-white opacity-75">Klik disini jika membutuhkan bantuan secepatnya.</small>
                  </label>
                </div>
                <!-- Tidak Darurat -->
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="status_darurat" id="daruratTidak" value="Tidak Darurat" required>
                  <label class="btn w-100 p-4 text-center custom-radio-card" for="daruratTidak" style="--warna: #ffc107; --bg-muda: #ffc107; color: white;">
                    <div class="emoji-icon mb-2" style="font-size: 3rem;"><img src="<?= BASE_URL ?>assets/img/worried.webp" width="50px" ></div>
                    <h5 class="fw-bold mb-1 text-white">Tidak</h5>
                    <small class="text-white opacity-75">Saya butuh bantuan, tetapi tidak dalam keadaan darurat.</small>
                  </label>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger px-4 fw-bold" onclick="nextStep(2)">Lanjutkan <i class="bi bi-arrow-right ms-1"></i></button>
              </div>
            </div>

            <!-- ================= TINGKAT KHAWATIR ================= -->
            <div class="form-step" id="step-2" style="display: none;">
              <label class="form-label fw-bold fs-4 mb-2">Nilai tingkat kehawatiran Anda <span class="text-danger">*</span></label>
              <p class="text-secondary small mb-4">Pilih salah satu dibawah ini:</p>
              
              <div class="row g-3 mb-4">
                <!-- Sedikit -->
                <div class="col-md-4">
                  <input type="radio" class="btn-check" name="kehawatiran" id="khawatirSedikit" value="Sedikit Khawatir" required>
                  <label class="btn w-100 p-3 text-center custom-radio-card" for="khawatirSedikit" style="--warna: #0dcaf0; --bg-muda: #0dcaf0; color: white;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/bit-worried.webp" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-white">SEDIKIT KHAWATIR</h6>
                    <small class="text-white opacity-75" style="font-size: 0.75rem;">Saya sedikit merasa khawatir.</small>
                  </label>
                </div>
                <!-- Khawatir -->
                <div class="col-md-4">
                  <input type="radio" class="btn-check" name="kehawatiran" id="khawatirCukup" value="Khawatir" required>
                  <label class="btn w-100 p-3 text-center custom-radio-card" for="khawatirCukup" style="--warna: #ffc107; --bg-muda: #ffc107; color: white;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/bit-worried.webp" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-white">KHAWATIR</h6>
                    <small class="text-white opacity-75" style="font-size: 0.75rem;">Saya cukup merasa khawatir.</small>
                  </label>
                </div>
                <!-- Sangat -->
                <div class="col-md-4">
                  <input type="radio" class="btn-check" name="kehawatiran" id="khawatirSangat" value="Sangat Khawatir" required>
                  <label class="btn w-100 p-3 text-center custom-radio-card" for="khawatirSangat" style="--warna: #dc3545; --bg-muda: #dc3545; color: white;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/fear.webp" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-white">SANGAT KHAWATIR</h6>
                    <small class="text-white opacity-75" style="font-size: 0.75rem;">Sangat mengerikan, butuh bantuan.</small>
                  </label>
                </div>
              </div>

              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-light fw-bold" onclick="prevStep(1)"><i class="bi bi-arrow-left me-1"></i> Kembali</button>
                <button type="button" class="btn btn-danger px-4 fw-bold" onclick="nextStep(3)">Lanjutkan <i class="bi bi-arrow-right ms-1"></i></button>
              </div>
            </div>

            <!-- ================= SIAPA KORBANNYA ================= -->
            <div class="form-step" id="step-3" style="display: none;">
              <label class="form-label fw-bold fs-5 mb-3">3. Siapa Korbannya? <span class="text-danger">*</span></label>
              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="korban" id="korbanSaya" value="Saya Sendiri" required>
                  <label class="btn w-100 p-3 text-center custom-radio-card" for="korbanSaya" style="--warna: #dc3545; --bg-muda: #f8d7da;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/abused.webp" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-dark">SAYA SENDIRI</h6>
                    <small class="text-secondary">Saya mengalami perundungan.</small>
                  </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="korban" id="korbanOrang" value="Orang Lain" required>
                  <label class="btn w-100 p-3 text-center custom-radio-card" for="korbanOrang" style="--warna: #ffc107; --bg-muda: #fff3cd;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/calling.webp" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-dark">ORANG LAIN</h6>
                    <small class="text-secondary">Saya melihat teman dirundung.</small>
                  </label>
                </div>
              </div>

              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-light fw-bold" onclick="prevStep(2)"><i class="bi bi-arrow-left me-1"></i> Kembali</button>
                <button type="button" class="btn btn-danger px-4 fw-bold" onclick="nextStep(4)">Lanjutkan <i class="bi bi-arrow-right ms-1"></i></button>
              </div>
            </div>

            <!-- ================= JENIS BULLYING ================= -->
            <div class="form-step" id="step-4" style="display: none;">
              <label class="form-label fw-bold fs-5 mb-3">4. Apa jenis perundungannya? <span class="text-danger">*</span></label>
              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="jenis" id="jenisVerbal" value="Verbal" required>
                  <label class="btn w-100 p-3 text-start custom-radio-card" for="jenisVerbal" style="--warna: #0d6efd; --bg-muda: #cfe2ff;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/verbal.png" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-dark">Verbal</h6>
                    <small class="text-secondary">Ejekan, ancaman, julukan.</small>
                  </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="jenis" id="jenisFisik" value="Fisik" required>
                  <label class="btn w-100 p-3 text-start custom-radio-card" for="jenisFisik" style="--warna: #dc3545; --bg-muda: #f8d7da;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/fisik.png" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-dark">Fisik</h6>
                    <small class="text-secondary">Pukulan, dorongan.</small>
                  </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="jenis" id="jenisSosial" value="Sosial" required>
                  <label class="btn w-100 p-3 text-start custom-radio-card" for="jenisSosial" style="--warna: #ffc107; --bg-muda: #fff3cd;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/sosical.png" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-dark">Sosial</h6>
                    <small class="text-secondary">Dikucilkan, rumor.</small>
                  </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" class="btn-check" name="jenis" id="jenisOnline" value="Cyberbullying" required>
                  <label class="btn w-100 p-3 text-start custom-radio-card" for="jenisOnline" style="--warna: #6f42c1; --bg-muda: #e2d9f3;">
                    <div class="emoji-icon"><img src="<?= BASE_URL ?>assets/img/cyber.png" width="50px" ></div>
                    <h6 class="fw-bold mb-1 text-dark">Cyberbullying</h6>
                    <small class="text-secondary">Hinaan di medsos.</small>
                  </label>
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-light fw-bold" onclick="prevStep(3)"><i class="bi bi-arrow-left me-1"></i> Kembali</button>
                <button type="button" class="btn btn-danger px-4 fw-bold" onclick="nextStep(5)">Lanjutkan <i class="bi bi-arrow-right ms-1"></i></button>
              </div>
            </div>

            <!-- ================= KRONOLOGI ================= -->
            <div class="form-step" id="step-5" style="display: none;">
              <label class="form-label fw-bold fs-5 mb-3">5. Ceritakan kejadiannya <span class="text-danger">*</span></label>
              <textarea name="kronologi" id="kronologi" rows="6" class="form-control bg-light border-0 mb-3" placeholder="Ceritakan apa yang terjadi, kapan, di mana, dan siapa yang terlibat..." required></textarea>
              <div class="form-text mb-4"><i class="bi bi-info-circle me-1"></i>Ceritakan sedetail mungkin agar Satgas Anti-Bullying mudah memahaminya.</div>
              
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-light fw-bold" onclick="prevStep(4)"><i class="bi bi-arrow-left me-1"></i> Kembali</button>
                <button type="button" class="btn btn-danger px-4 fw-bold" onclick="nextStep(6)">Lanjutkan <i class="bi bi-arrow-right ms-1"></i></button>
              </div>
            </div>

            <!-- ================= BUKTI & IDENTITAS ================= -->
            <div class="form-step" id="step-6" style="display: none;">
              <div class="mb-4">
                <label class="form-label fw-bold fs-5 mb-3">6. Bukti Pendukung (Opsional)</label>
                <input type="file" name="bukti" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                <div class="form-text mt-2">Maksimal 5 MB. Format: JPG, PNG, PDF.</div>
              </div>

              <hr class="my-4">

              <div class="mb-4">
                <label class="form-label fw-bold fs-5 mb-3">Identitas Pelapor</label>
                <div class="p-3 bg-light rounded-3 mb-3 border">
                  <div class="form-check form-switch">
                    <input type="checkbox" name="anonim" value="1" class="form-check-input" id="anonim" onchange="toggleIdentitas()">
                    <label class="form-check-label fw-bold ms-2" for="anonim">Saya melapor secara anonim (Tanpa Nama)</label>
                  </div>
                </div>

                <div id="identitas" class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" class="form-control bg-light border-0" placeholder="Nama lengkap / panggilan">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Kontak (Email / WA)</label>
                    <input type="text" name="kontak" class="form-control bg-light border-0" placeholder="Contoh: 0812...">
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-light fw-bold" onclick="prevStep(5)"><i class="bi bi-arrow-left me-1"></i> Kembali</button>
                <button type="submit" class="btn btn-danger px-4 fw-bold"><i class="bi bi-send-fill me-2"></i> Kirim Laporan</button>
              </div>
            </div>

          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!-- ================= pop up darurat ================= -->
<div class="modal fade" id="modalDarurat" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
      <div class="modal-header bg-danger text-white border-0 p-4">
        <h5 class="modal-title fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Anda Dalam Bahaya?</h5>
      </div>
      <div class="modal-body p-4 text-center">
        <p class="mb-4">Jika Anda atau teman Anda berada dalam bahaya langsung (fisik), sangat disarankan untuk menghubungi layanan darurat pemerintah <strong>SAPA 129</strong> sekarang juga.</p>
        <div class="d-grid gap-2">
          <a href="https://wa.me/628111129129" target="_blank" class="btn btn-danger btn-lg fw-bold">
            <i class="bi bi-whatsapp me-2"></i>Hubungi SAPA 129 Sekarang
          </a>
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Tetap Lanjut Mengisi Form
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
    .custom-radio-card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        min-height: 170px; 
        border: 2px solid transparent;
        border-radius: 12px;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        background-color: var(--bg-muda);
    }
    
    .custom-radio-card:hover {
        background-color: var(--bg-muda) !important;
        border-color: var(--warna) !important;
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        filter: brightness(0.95); 
    }
    
    .btn-check:checked + .custom-radio-card {
        background-color: var(--bg-muda) !important;
        border-color: var(--warna) !important;
        box-shadow: 0 0 0 3px var(--warna); 
        transform: scale(1.02);
    }
    
    .btn-check + .custom-radio-card:hover .text-dark,
    .btn-check + .custom-radio-card:hover .text-secondary,
    .btn-check + .custom-radio-card:hover .text-white {
        color: inherit;
    }
    .emoji-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60px; 
        margin-bottom: 15px;
    }

    .emoji-icon img {
        max-height: 50px; 
        width: auto;     
        object-fit: contain;
    }
    
    .form-step { animation: fadeIn 0.4s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<!-- JAVASCRIPT MULTI-STEP CARD -->
<script>
    function updateProgress(currentStep) {
        const percent = Math.round((currentStep / 6) * 100); // 6 Langkah
        document.getElementById('progress-bar').style.width = percent + '%';
        document.getElementById('step-percent').innerText = percent + '%';
        document.getElementById('step-text').innerText = 'Langkah ' + currentStep + ' dari 6';
    }

    function tampilkanModalDarurat() {
        var myModal = new bootstrap.Modal(document.getElementById('modalDarurat'));
        myModal.show();
    }

    function nextStep(step) {
        if (step === 2) {
            if (!document.querySelector('input[name="status_darurat"]:checked')) {
                alert("Pilih status darurat terlebih dahulu!"); return;
            }
        }
        if (step === 3) {
            if (!document.querySelector('input[name="kehawatiran"]:checked')) {
                alert("Pilih tingkat kehawatiran Anda!"); return;
            }
        }
        if (step === 4) {
            if (!document.querySelector('input[name="korban"]:checked')) {
                alert("Pilih siapa korbannya!"); return;
            }
        }
        if (step === 5) {
            if (!document.querySelector('input[name="jenis"]:checked')) {
                alert("Pilih jenis perundungan!"); return;
            }
        }
        if (step === 6) {
            if (document.getElementById('kronologi').value.trim() === '') {
                alert("Ceritakan kejadiannya terlebih dahulu!"); return;
            }
        }
        document.querySelectorAll('.form-step').forEach(el => el.style.display = 'none');
        document.getElementById('step-' + step).style.display = 'block';
        updateProgress(step);
    }

    function prevStep(step) {
        document.querySelectorAll('.form-step').forEach(el => el.style.display = 'none');
        document.getElementById('step-' + step).style.display = 'block';
        updateProgress(step);
    }

    function toggleIdentitas() {
        const anonim = document.getElementById('anonim').checked;
        document.getElementById('identitas').style.display = anonim ? 'none' : 'flex';
    }
</script>

<?php include 'partials/footer.php'; ?>
</body>
</html>