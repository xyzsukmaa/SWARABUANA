<?php require_once 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>
<h2>📸 Identifikasi Tanaman (AI)</h2>
<div class="scan-container">
    <video id="webcam" autoplay playsinline width="320" height="240"></video>
    <br>
    <button onclick="takeSnapshot()">Ambil Foto & Scan</button>
</div>
<div id="hasil-scan"></div>

<script src="assets/js/scan.js"></script>
<?php include 'includes/footer.php'; ?>