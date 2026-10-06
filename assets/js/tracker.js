function siramPohon() {
    fetch('api/siram.php')
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            document.getElementById('stok-air').innerText = data.stok_air;
            document.getElementById('progress-bar').style.width = data.progress + '%';
            document.getElementById('progress-text').innerText = data.progress + '%';
            document.getElementById('tree-image').src = data.img;
        } else {
            alert(data.message);
        }
    });
}

// Heartbeat tiap 60 detik
setInterval(() => {
    fetch('api/heartbeat.php');
}, 60000);