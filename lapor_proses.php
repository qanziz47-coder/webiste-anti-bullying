<?php
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { 
    header('Location: lapor.php'); 
    exit; 
}

$jenis     = trim($_POST['jenis'] ?? '');
$kronologi = trim($_POST['kronologi'] ?? '');
$anonim    = isset($_POST['anonim']) ? 1 : 0;
$nama      = $anonim ? null : trim($_POST['nama_pelapor'] ?? '');
$kontak    = $anonim ? null : trim($_POST['kontak'] ?? '');

if ($jenis === '' || $kronologi === '') {
    header('Location: lapor.php?error=' . urlencode('Jenis dan kronologi wajib diisi.')); 
    exit;
}

// Proses Upload Bukti
$namaFile = null;
if (!empty($_FILES['bukti']['name'])) {
    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];
    $ext = strtolower(pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION));
    
    if (!in_array($ext, $allowed)) {
        header('Location: lapor.php?error=' . urlencode('Format bukti tidak diizinkan. Gunakan JPG, PNG, atau PDF.')); 
        exit;
    }
    if ($_FILES['bukti']['size'] > 5 * 1024 * 1024) {
        header('Location: lapor.php?error=' . urlencode('Ukuran bukti maksimal 5 MB.')); 
        exit;
    }
    
    // Generate nama file unik
    $namaFile = 'bukti_' . date('Ymd') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    move_uploaded_file($_FILES['bukti']['tmp_name'], __DIR__ . '/uploads/' . $namaFile);
}

// Generate Kode Tracking
$kode = 'LAP-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));

// Simpan ke Database
$stmt = $pdo->prepare("INSERT INTO laporan (kode, jenis, kronologi, anonim, nama_pelapor, kontak, bukti) VALUES (?,?,?,?,?,?,?)");
$stmt->execute([$kode, $jenis, $kronologi, $anonim, $nama, $kontak, $namaFile]);

// Redirect kembali ke form dengan pesan sukses
header('Location: lapor.php?sukses=1&kode=' . urlencode($kode));
exit;