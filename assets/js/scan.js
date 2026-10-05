const input = document.getElementById('foto');
const preview = document.getElementById('preview');
const hasil = document.getElementById('hasil');

input.addEventListener('change', async () => {
  const file = input.files[0];
  if (!file) return;
  preview.src = URL.createObjectURL(file);
  hasil.textContent = 'Menganalisis...';

  const fd = new FormData();
  fd.append('image', file);
  const res = await fetch('api/identify.php', { method: 'POST', body: fd });
  const d = await res.json();

  hasil.innerHTML = d.nama_ilmiah
    ? `<b>${d.nama_umum}</b> (<i>${d.nama_ilmiah}</i>)<br>Akurasi: ${d.akurasi}%`
    : 'Tanaman tidak dikenali, coba foto lebih jelas.';
});