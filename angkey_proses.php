<?php
require 'config/db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: angket.php'); exit; }

$stmt = $pdo->prepare("INSERT INTO angket (kelas, pernah_dibully, jenis_bullying, tempat) VALUES (?,?,?,?)");
$stmt->execute([
    trim($_POST['kelas'] ?? ''),
    (int)($_POST['pernah_dibully'] ?? 0),
    trim($_POST['jenis_bullying'] ?? ''),
    trim($_POST['tempat'] ?? '')
]);

header('Location: angket.php?sukses=1');
exit;