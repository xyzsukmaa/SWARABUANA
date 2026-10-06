<?php 
require_once 'includes/config.php'; 
include 'includes/header.php'; 

$query = mysqli_query($conn, "SELECT * FROM plants");
?>

<h2>🌿 Katalog Tanaman Lokal & Terancam Punah</h2>

<table border="1" cellpadding="10" cellspacing="0" style="width:100%; background:white; margin-top:20px; border-collapse:collapse;">
    <tr style="background:#27ae60; color:white;">
        <th>Nama Lokal</th>
        <th>Nama Ilmiah</th>
        <th>Daerah</th>
        <th>Status Konservasi</th>
        <th>Deskripsi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($query)): ?>
    <tr>
        <td><strong><?= htmlspecialchars($row['nama_lokal']) ?></strong></td>
        <td><em><?= htmlspecialchars($row['nama_ilmiah']) ?></em></td>
        <td><?= htmlspecialchars($row['daerah']) ?></td>
        <td><span style="color:red; font-weight:bold;"><?= htmlspecialchars($row['status_konservasi']) ?></span></td>
        <td><?= htmlspecialchars($row['deskripsi']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'includes/footer.php'; ?>