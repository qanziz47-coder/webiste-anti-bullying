<?php
session_start();
session_destroy();
require __DIR__ . '/../config/db.php';
header('Location: ' . BASE_URL . 'admin/login.php');
exit;