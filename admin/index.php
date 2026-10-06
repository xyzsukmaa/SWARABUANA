<?php
require_once '../includes/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Akses ditolak! Khusus Admin.";
    exit();
}

$u_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"))['total'];
$t_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM trees WHERE status = 'ditukar'"))['total'];
$d_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) as total FROM donations"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin SWARABUANA</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="padding:20px;">
    <h1>Panel Pengelola Admin SWARABUANA</h1>
    <hr>
    <div style="display:flex; gap:20px; margin-top:20px;">
        <div class="card" style="background:#fff; padding:20px; border-radius:8px;">
            <h3>Total Pengguna</h3>
            <p style="font-size:24px; font-weight:bold;"><?= $u_count ?></p>
        </div>
        <div class="card" style="background:#fff; padding:20px; border-radius:8px;">
            <h3>Pohon Tertanam (Asli)</h3>
            <p style="font-size:24px; font-weight:bold;"><?= $t_count ?></p>
        </div>
        <div class="card" style="background:#fff; padding:20px; border-radius:8px;">
            <h3>Total Donasi</h3>
            <p style="font-size:24px; font-weight:bold;">Rp <?= number_format($d_count ?? 0, 0, ',', '.') ?></p>
        </div>
    </div>
    <br><br>
    <a href="../index.php">← Kembali ke Website Utama</a>
</body>
</html>