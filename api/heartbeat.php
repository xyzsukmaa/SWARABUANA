<?php
require_once '../includes/config.php';
header('Content-Type: application/json');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    mysqli_query($conn, "UPDATE users SET detik_aktif = detik_aktif + 60 WHERE id = $user_id");
    
    // Cek jika sudah 5 menit (300 detik)
    $res = mysqli_query($conn, "SELECT detik_aktif, stok_siraman FROM users WHERE id = $user_id");
    $data = mysqli_fetch_assoc($res);
    
    if ($data['detik_aktif'] >= 300) {
        mysqli_query($conn, "UPDATE users SET stok_siraman = stok_siraman + 1, detik_aktif = 0 WHERE id = $user_id");
    }
}
echo json_encode(['status' => 'ok']);
?>