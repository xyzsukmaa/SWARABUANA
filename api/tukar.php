<?php
require_once '../includes/config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Belum login']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Ubah status pohon lama jadi 'ditukar'
mysqli_query($conn, "UPDATE trees SET status = 'ditukar' WHERE user_id = $user_id AND status = 'growing'");

// Buat pohon baru dengan progress 0%
mysqli_query($conn, "INSERT INTO trees (user_id, progress) VALUES ($user_id, 0)");

echo json_encode(['success' => true, 'message' => 'Pohon virtual berhasil ditukar dengan bibit pohon asli! Pohon baru kamu sudah mulai ditanam. 🌱']);
?>