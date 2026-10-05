setInterval(() => {
  if (document.visibilityState === 'visible') {
    fetch('api/heartbeat.php')
      .then(r => r.json())
      .then(d => {
        const el = document.getElementById('stok');
        if (el && d.stok !== undefined) el.textContent = d.stok;
      });
  }
}, 60000);