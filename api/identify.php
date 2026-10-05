<?php
require '../includes/config.php';
header('Content-Type: application/json');

if (empty($_FILES['image']['tmp_name'])) {
  echo json_encode(['error' => 'Tidak ada gambar']); exit;
}
$file = new CURLFile($_FILES['image']['tmp_name'], $_FILES['image']['type'], 'foto.jpg');

$ch = curl_init("https://my-api.plantnet.org/v2/identify/all?api-key=" . PLANTNET_KEY);
curl_setopt_array($ch, [
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => ['images' => $file, 'organs' => 'auto'],
  CURLOPT_RETURNTRANSFER => true,
]);
$res = json_decode(curl_exec($ch), true);
curl_close($ch);

$top = $res['results'][0] ?? null;
echo json_encode([
  'nama_ilmiah' => $top['species']['scientificNameWithoutAuthor'] ?? null,
  'nama_umum'   => $top['species']['commonNames'][0] ?? '-',
  'akurasi'     => round(($top['score'] ?? 0) * 100),
]);