<?php
header('Content-Type: application/json');

// Simulasi hasil deteksi AI
$mock_results = [
    ['nama' => 'Kantung Semar (Nepenthes)', 'akurasi' => '96%'],
    ['nama' => 'Bunga Raflesia (Rafflesia arnoldii)', 'akurasi' => '92%'],
    ['nama' => 'Edelweiss Jawa (Anaphalis javanica)', 'akurasi' => '89%']
];

$random = $mock_results[array_rand($mock_results)];

echo json_encode([
    'success' => true,
    'tanaman' => $random['nama'],
    'akurasi' => $random['akurasi']
]);
?>