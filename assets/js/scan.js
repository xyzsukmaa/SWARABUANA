const video = document.getElementById('webcam');
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
        video.srcObject = stream;
    });
}

function takeSnapshot() {
    alert("Fitur AI Scan siap dihubungkan dengan PlantNet/Plant.id API!");
}