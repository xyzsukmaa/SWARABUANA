<?php 
require_once 'includes/config.php'; 
include 'includes/header.php'; 

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nominal = (int)$_POST['nominal'];
    $tipe = $_POST['tipe'];
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "NULL";

    $query = "INSERT INTO donations (user_id, nama, nominal, tipe, status) VALUES ($user_id, '$nama', $nominal, '$tipe', 'lunas')";
    if (mysqli_query($conn, $query)) {
        $message = "Terima kasih atas donasi Anda! Kontribusi Anda sangat berarti bagi kelestarian bumi. 🌱";
    }
}
?>

<h2>🤝 Instant Plant & Open Donation</h2>
<p>Tanam pohon langsung tanpa menunggu progres virtual atau berikan donasi sukarela.</p>

<?php if ($message): ?>
    <div style="background:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:15px;"><?= $message ?></div>
<?php endif; ?>

<div class="auth-box">
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Donatur" required>
        <select name="tipe" style="width:100%; padding:10px; margin:10px 0;">
            <option value="instant_plant">Instant Plant (Tanam Pohon Langsung)</option>
            <option value="open">Open Donation (Sumbangan Sukarela)</option>
        </select>
        <input type="number" name="nominal" placeholder="Nominal (Rp)" min="10000" required>
        <button type="submit">Donasi Sekarang</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>