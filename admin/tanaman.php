<?php
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lokal = mysqli_real_escape_string($conn, $_POST['nama_lokal']);
    $nama_ilmiah = mysqli_real_escape_string($conn, $_POST['nama_ilmiah']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $status = mysqli_real_escape_string($conn, $_POST['status_konservasi']);
    $daerah = mysqli_real_escape_string($conn, $_POST['daerah']);

    mysqli_query($conn, "INSERT INTO plants (nama_lokal, nama_ilmiah, deskripsi, status_konservasi, daerah) VALUES ('$nama_lokal', '$nama_ilmiah', '$deskripsi', '$status', '$daerah')");
    header("Location: tanaman.php");
    exit();
}
?>

<h2>Kelola Katalog Tanaman</h2>
<form method="POST" style="margin-bottom:20px;">
    <input type="text" name="nama_lokal" placeholder="Nama Lokal" required>
    <input type="text" name="nama_ilmiah" placeholder="Nama Ilmiah" required>
    <input type="text" name="daerah" placeholder="Daerah" required>
    <input type="text" name="status_konservasi" placeholder="Status Konservasi" required>
    <br><br>
    <textarea name="deskripsi" placeholder="Deskripsi Singkat" style="width:300px; height:80px;"></textarea>
    <br><br>
    <button type="submit">Tambah Tanaman</button>
</form>
<a href="index.php">← Dashboard Admin</a>