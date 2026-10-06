<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWARABUANA - Pelestarian Lingkungan & Edukasi SDG</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo">🌱 SWARABUANA</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="scan.php">Scan AI</a></li>
            <li><a href="iklim.php">Data Iklim</a></li>
            <li><a href="ecotracker.php">EcoTracker</a></li>
            <li><a href="edukas.php">Edukasi</a></li>
            <li><a href="katalog.php">Katalog</a></li>
            <li><a href="donasi.php">Donasi</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php" class="btn-logout">Logout (<?= htmlspecialchars($_SESSION['nama'] ?? 'User') ?>)</a></li>
            <?php else: ?>
                <li><a href="login.php" class="btn-login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <main class="container">