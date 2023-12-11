<?php include ('src/layout/nav.php'); 

?>

<div class="pengurus">
<h1>Struktur Kepengurusan</h1>
  <div class="rowstruk">
      <div class="card-profil">
        <h2>Sekretaris Umum</h2>
        <img src="src\img\sekum.jpg" alt="Foto Profil">
        <h3>Yasdil Lasoma</h3>
        <p>Divisi Programming</p>
      </div>
      <div class="card-profil">
        <h2>Ketua Umum</h2>
        <img src="src\img\ketua.jpg" alt="Foto Profil">
        <h3>Muliana Juni</h3>
        <p>Bidang Pengembangan Organisasi</p>
      </div>
      <div class="card-profil">
        <h2>Bendahara Umum</h2>
        <img src="src\img\noprofil.png" alt="Foto Profil">
        <h3>Salmi Qauly K. Pakaya</h3>
        <p>Divisi Cinematography</p>
      </div>
  </div>

  <h1>Ketua Bidang</h1>
  <div class="rowstruk">
      <div class="card-profil">
        <h2>Pengembangan Organisasi</h2>
        <img src="src\img\noprofil.png" alt="Foto Profil">
        <h3>Mohamad Zuwfadli Akbar Pakaya</h3>
      </div>
      <div class="card-profil">
        <h2>Hubungan Masyarakat</h2>
        <img src="src\img\kabidhumas.jpg" alt="Foto Profil">
        <h3>Mohamad Aqshal Safatullah Ibrahim</h3>
      </div>
      <div class="card-profil">
        <h2>Penalaran dan Keilmuan</h2>
        <img src="src\img\kabidpk.jpg" alt="Foto Profil">
        <h3>Sadli Fardiyansah tjiah</h3>
      </div>
  </div>

  <h1>Ketua Divisi</h1>
  <div class="rowstruk"">
      <div class="card-profil">
        <h2>Programming</h2>
        <img src="src\img\kadivprog.jpg" alt="Foto Profil">
        <h3>Mohamad Sultan Anwar</h3>
      </div>
      <div class="card-profil">
        <h2>Networkig and Operating System</h2>
        <img src="src\img\kadivnos.jpg" alt="Foto Profil">
        <h3>Firman Syahputra Laot</h3>
      </div>
      <div class="card-profil">
        <h2>Design Graphic</h2>
        <img src="src\img\noprofil.png" alt="Foto Profil">
        <h3>Mohamad Rivanska Adam</h3>
      </div>
      <div class="card-profil">
        <h2>Cinematography</h2>
        <img src="src\img\noprofil.png" alt="Foto Profil">
        <h3>Jessica Thiony Rura Koyansow</h3>
      </div>
  </div>
</div>
<script>
    const currentPage = window.location.href;

// Mendapatkan semua tautan dalam navigasi
const links = document.querySelectorAll('.nav-links a');

// Loop melalui setiap tautan untuk menandai tautan yang sesuai dengan URL saat ini
links.forEach(link => {
    if (link.href === currentPage) {
        link.classList.add('active');
    }
});
</script>
</body>
</html>