<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

$user_id = $_SESSION['user_id'];

// Ambil stok siraman user
$u_query = mysqli_query($conn, "SELECT stok_siraman FROM users WHERE id = $user_id");
$user = mysqli_fetch_assoc($u_query);

// Ambil progress pohon
$t_query = mysqli_query($conn, "SELECT * FROM trees WHERE user_id = $user_id AND status = 'growing' LIMIT 1");
$tree = mysqli_fetch_assoc($t_query);

if (!$tree) {
    mysqli_query($conn, "INSERT INTO trees (user_id, progress) VALUES ($user_id, 0)");
    header("Refresh:0");
    exit();
}

$progress = $tree['progress'];
// Tentukan tahap foto berdasarkan progress
$tahap_img = "assets/img/tahap1.jpg";
if ($progress > 80) $tahap_img = "assets/img/tahap5.jpg";
elseif ($progress > 60) $tahap_img = "assets/img/tahap4.jpg";
elseif ($progress > 40) $tahap_img = "assets/img/tahap3.jpg";
elseif ($progress > 20) $tahap_img = "assets/img/tahap2.jpg";
?>

<?php include 'includes/header.php'; ?>
<div class="tracker-card">
    <h2>🌲 Pohon Virtual Kamu</h2>
    <div class="tree-display">
        <img id="tree-image" src="<?= $tahap_img ?>" alt="Pohon Virtual" style="max-width:300px; border-radius:12px;">
    </div>
    
    <div class="progress-bar-container">
        <div id="progress-bar" style="width: <?= $progress ?>%; background: #2ecc71; height: 20px; border-radius: 10px;"></div>
    </div>
    <p><strong id="progress-text"><?= $progress ?>%</strong> Tumbuh</p>
    <p>Stok Air Kamu: <span id="stok-air"><?= $user['stok_siraman'] ?></span> Siraman 💧</p>

    <button id="btn-siram" onclick="siramPohon()">🚿 Siram Pohon (-1 Air)</button>
    
    <?php if ($progress >= 100): ?>
        <button id="btn-tukar" onclick="tukarPohon()">🌱 Tukar Jadi Pohon Asli!</button>
    <?php endif; ?>
</div>
<?php include 'includes/footer.php'; ?>