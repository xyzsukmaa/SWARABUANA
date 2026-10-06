<?php
require_once 'includes/config.php';
include 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = mysqli_query($conn, "SELECT * FROM articles WHERE id = $id");
$article = mysqli_fetch_assoc($query);

if (!$article) {
    echo "<h3>Artikel tidak ditemukan.</h3>";
    include 'includes/footer.php';
    exit();
}

// Cek dan berikan bonus air jika user sudah login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $check = mysqli_query($conn, "SELECT * FROM article_reads WHERE user_id = $user_id AND article_id = $id");
    
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "INSERT INTO article_reads (user_id, article_id) VALUES ($user_id, $id)");
        mysqli_query($conn, "UPDATE users SET stok_siraman = stok_siraman + 2 WHERE id = $user_id");
        echo "<script>alert('Selamat! Kamu mendapatkan +2 Siraman Air karena membaca artikel ini! 💧');</script>";
    }
}
?>

<div class="article-detail" style="background: white; padding: 20px; border-radius: 8px; text-align: left;">
    <h2><?= htmlspecialchars($article['judul']) ?></h2>
    <small>Diterbitkan pada: <?= $article['created_at'] ?></small>
    <hr>
    <p style="line-height: 1.6; margin-top: 15px;"><?= nl2br(htmlspecialchars($article['isi'])) ?></p>
    <br>
    <a href="edukas.php">← Kembali ke daftar edukasi</a>
</div>

<?php include 'includes/footer.php'; ?>