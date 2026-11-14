<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $judul ?? 'Beranda' ?> — AntiBullying </title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="<?= BASE_URL ?>assets/img/favicon.ico" type="image/x-icon">
<style>
    :root {
        --biru: #1e3a5f;
        --merah: #c0392b;
        --abu: #fafafa;
        --teks: #1f2937;
    }
    
    body {
        font-family: 'Inter', system-ui, sans-serif;
        color: var(--teks);
        font-size: 15px;
        line-height: 1.65;
    }

    h1, h2, h3, h4, h5 { font-weight: 700; letter-spacing: -0.5px; }
    h1 { font-size: clamp(2rem, 4vw, 2.8rem); }
    h2 { font-size: 1.8rem; }
    
    .btn { 
        border-radius: 8px; 
        font-weight: 600; 
        transition: all 0.2s ease; 
    }
    .btn:hover { 
        transform: translateY(-2px); 
    }
    
    .btn-utama { 
        background: var(--biru); 
        color: #fff; 
        border: none; 
    }
    .btn-utama:hover { 
        background: #162c47; 
        color: #fff; 
    }
    
    .btn-aksen { 
        background: var(--merah); 
        color: #fff; 
        border: 2px solid transparent; 
    }
    .btn-aksen:hover { 
        background: #a5301f; 
        color: #fff; 
        box-shadow: 0 4px 12px rgba(192,57,43,0.3); 
    }

    .btn-outline-biru {
        color: var(--biru);
        border: 2px solid var(--biru);
        background-color: transparent;
    }
    .btn-outline-biru:hover {
        background-color: var(--biru);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(30, 58, 95, 0.2); 
    }

    .navbar-profesional {
        padding: 15px 0;
        border-bottom: 1px solid #e5e7eb;
        background-color: #ffffff;
    }

    .navbar-profesional .nav-link {
        font-size: 0.95rem;
        font-weight: 500;
        color: #4b5563 !important;
        padding: 8px 0;
        position: relative;
        transition: color 0.2s ease;
    }

    .navbar-profesional .nav-link:hover {
        color: var(--merah) !important;
    }

    .navbar-profesional .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: var(--merah);
        transition: width 0.3s ease;
    }
    .navbar-profesional .nav-link:hover::after {
        width: 100%;
    }

    .btn-merah-profesional {
        background-color: var(--merah);
        color: #fff;
        font-weight: 600;
        font-size: 0.9rem;
        border-radius: 6px;
        border: none;
    }
    .btn-merah-profesional:hover {
        background-color: #a5301f;
        color: #fff;
        box-shadow: 0 4px 12px rgba(192, 57, 43, 0.3);
    }

    .card-klik {
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .card-klik:hover {
        border-color: var(--merah) !important;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08) !important;
    }

    .bg-light-custom { background-color: var(--abu); }

    #tinggi{
        height: 80vh;
        justify-content: center;
        align-items: center;
    }
    .video-tengah{
        justify-content: center;
        align-items: center;
        width: 80%;
        margin: auto;
        border-radius: 20px;
        background: transparent;
        backdrop-filter: blur(10px);
        box-shadow: 0px 2px 12px rgba(0,0,0,0.5);
    }
    .text-kecil{
        color: black;
    }
</style>
</head>
<body>
<?php include __DIR__ . '/navbar.php'; ?>