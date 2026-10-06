<?php
require_once '../includes/config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Belum login']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Cek stok air
$u_res = mysqli_query($conn, "SELECT stok_siraman FROM users WHERE id = $user_id");
$u_data = mysqli_fetch_assoc($u_res);

if ($u_data['stok_siraman'] <= 0) {
    echo json_encode(['success' => false, 'message' => 'Stok air habis!']);
    exit();
}

// Cek pohon
$t_res = mysqli_query($conn, "SELECT id, progress FROM trees WHERE user_id = $user_id AND status = 'growing' LIMIT 1");
$t_data = mysqli_fetch_assoc($t_res);

$new_stok = $u_data['stok_siraman'] - 1;
$new_progress = min(100, $t_data['progress'] + 10);

// Update database
mysqli_query($conn, "UPDATE users SET stok_siraman = $new_stok WHERE id = $user_id");
mysqli_query($conn, "UPDATE trees SET progress = $new_progress WHERE id = {$t_data['id']}");

// Tentukan gambar baru
$img = "assets/img/tahap1.jpg";
if ($new_progress > 80) $img = "assets/img/tahap5.jpg";
elseif ($new_progress > 60) $img = "assets/img/tahap4.jpg";
elseif ($new_progress > 40) $img = "assets/img/tahap3.jpg";
elseif ($new_progress > 20) $img = "assets/img/tahap2.jpg";

echo json_encode([
    'success' => true,
    'stok_air' => $new_stok,
    'progress' => $new_progress,
    'img' => $img
]);
?>