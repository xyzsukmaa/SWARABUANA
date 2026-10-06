<?php require_once 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>
<h2>📊 Visualisasi Data Deforestasi & Karbon</h2>
<canvas id="iklimChart" width="400" height="200"></canvas>

<script>
const ctx = document.getElementById('iklimChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['2021', '2022', '2023', '2024'],
        datasets: [{
            label: 'Kehilangan Hutan (Hektar)',
            data: [450000, 410000, 380000, 350000],
            borderColor: 'red',
            fill: false
        }]
    }
});
</script>
<?php include 'includes/footer.php'; ?>