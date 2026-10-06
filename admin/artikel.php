<?php
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);

    mysqli_query($conn, "INSERT INTO articles (judul, isi) VALUES ('$judul', '$isi')");
    header("Location: artikel.php");
    exit();
}
?>

<h2>Kelola Artikel Edukasi</h2>
<form method="POST">
    <input type="text" name="judul" placeholder="Judul Artikel" style="width:300px;" required>
    <br><br>
    <textarea name="isi" placeholder="Isi Artikel Lengkap" style="width:400px; height:150px;" required></textarea>
    <br><br>
    <button type="submit">Publish Artikel</button>
</form>
<br>
<a href="index.php">← Dashboard Admin</a>