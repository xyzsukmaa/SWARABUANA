<?php 
require_once 'includes/config.php'; 
include 'includes/header.php'; 

$query = mysqli_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
?>

<h2>📚 Portal Edukasi Lingkungan</h2>
<p>Baca artikel di bawah ini untuk mendapatkan bonus <strong>+2 Siraman Air 💧</strong>!</p>

<div class="article-grid" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center; margin-top: 20px;">
    <?php while($row = mysqli_fetch_assoc($query)): ?>
        <div class="card" style="background: white; padding: 15px; border-radius: 8px; width: 280px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3><?= htmlspecialchars($row['judul']) ?></h3>
            <p><?= substr(htmlspecialchars($row['isi']), 0, 100) ?>...</p>
            <a href="artikel.php?id=<?= $row['id'] ?>" class="btn" style="display:inline-block; margin-top:10px; background:#27ae60; color:white; padding:8px 12px; text-decoration:none; border-radius:4px;">Baca Selengkapnya</a>
        </div>
    <?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>