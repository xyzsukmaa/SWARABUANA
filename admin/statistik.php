<?php
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tahun = (int)$_POST['tahun'];
    $kehilangan = (int)$_POST['kehilangan_ha'];

    mysqli_query($conn, "INSERT INTO deforestation_stats (tahun, kehilangan_ha) VALUES ($tahun, $kehilangan)");
    header("Location: statistik.php");
    exit();
}
?>

<h2>Kelola Data Deforestasi & Iklim</h2>
<form method="POST">
    <input type="number" name="tahun" placeholder="Tahun (misal: 2025)" required>
    <input type="number" name="kehilangan_ha" placeholder="Kehilangan Hutan (Hektar)" required>
    <button type="submit">Simpan Data</button>
</form>
<br>
<a href="index.php">← Dashboard Admin</a>