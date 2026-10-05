<?php
require '../includes/config.php';
header('Content-Type: application/json');
if (!isset($_SESSION['user_id'])) { echo json_encode(['error'=>'login']); exit; }

$id = $_SESSION['user_id'];
$pdo->prepare("UPDATE users SET detik_aktif = detik_aktif + 60 WHERE id=?")->execute([$id]);

$u = $pdo->query("SELECT detik_aktif FROM users WHERE id=$id")->fetch();
if ($u['detik_aktif'] >= 600) {
  $pdo->prepare("UPDATE users SET detik_aktif = detik_aktif - 600, stok_siraman = stok_siraman + 1 WHERE id=?")->execute([$id]);
}
$s = $pdo->query("SELECT stok_siraman FROM users WHERE id=$id")->fetch();
echo json_encode(['stok' => $s['stok_siraman']]);