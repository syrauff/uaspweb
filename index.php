<?php 
include ('src/layout/nav.php'); 
?>

<div class="tentang" id="tentang">
    <div class="tentang2">
        <h2>Selamat datang di Website UKM RISTI UNG</h2>
        <h6>Unit Kegiatan Mahasiswa Riset Teknologi Informasi (RISTI) adalah sebuah UKM yang bergerak dalam bidang Teknologi Informasi yang mewadahi mahasiswa yang ingin belajar dan memiliki minat dan bakan di bidang IT untuk bisa lebih mengembangkan keterampilan atau soft skill yang mereka miliki khususnya di bidang IT. </h6>
        <p>"Technology make Simple"</p>
    </div>
</div>

<div class="container" id="bidang">
    <h1>Divisi dan Bidang</h1>
    <p>Beberapa bidang dan divisi sebagai pilihan untuk fokus belajar anggota selama berada di organisasi</p>
 <div class="bidang" >
    <div class="card">
        <img src="src\img\Humas.jpg" alt="">
        <h4>Bidang Hubungan Masyarakat</h4>
        <p>Divisi Humas merupakan divisi yang menjadi fasilisator, membangun komunikasi yang aktif dan menjalin kerjasama dengan pihak internal maupun eksternal.</p>
    </div>
    <div class="card">
        <img src="src\img\PO.jpg" alt="">
        <h4>Bidang Pengembangan Organisasi</h4>
        <p>Divisi Pengembangan Organisasi adalah bidang yang bertujuan untuk mengembangkan pengetahuan keorganisasian dan kinerja pengurus, kaderisasi, agar terbentuk organisasi yang mandiri, dinamis, kritis, progresif, dan inovatif.</p>
    </div>
    <div class="card">
        <img src="src\img\PK.png" alt="">
        <h4>Bidang Penalaran dan Keilmuan</h4>
        <p>Bidang penalaran dan keilmuan yaitu, program dan kegiatan kemahasiswaan yang bertujuan menanamkan sikap ilmiah, merangsang daya kreasi dan inovasi, meningkatkan kemampuan meneliti dan menulis karya ilmiah.</p>
    </div>
 </div>
 <div class="bidang">
    <div class="card">
    <img src="src\img\prog.jpg" alt="">
        <div class="desk">
        <h4>Divisi Programming</h4>
        <p>Divisi Programming membuat, menguji, dan mengelola kode untuk aplikasi dan sistem, memastikan fungsionalitas, keamanan, dan inovasi teknologi terkini.</p>
        </div>
    </div>
    <div class="card">
    <img src="src\img\nos.jpg" alt="">
        <div class="desk">
        <h4>Divisi Networking and Operating System</h4>
        <p>Divisi ini mengelola jaringan & sistem operasi untuk keamanan, kinerja, konektivitas, dan dukungan teknologi dalam organisasi.</p>
        </div>
    </div>
    <div class="card">
    <img src="src\img\desain.jpg" alt="">
        <div class="desk">
        <h4>Divisi Graphic Design</h4>
        <p>Divisi Design Graphic menciptakan visual menarik untuk komunikasi merek, menggabungkan kreativitas dengan desain fungsional untuk pesan yang kuat.</p>
        </div>
    </div>
    <div class="card">
        <img src="src\img\Cinema.jpg" alt="">
        <div class="desk">
        <h4>Divisi Cinematography</h4>
        <p>Divisi cinematography mempunyai fokus pada produksi dan penyuntingan video maupun pemotretan dengan teknik yang sesuai.</p>
        </div>
    </div>
    
 </div>
</div>

<div class="kontak" id="kontak">
    <h1 style="text-align: center;">Hubungi Kami</h1>
    <form action="proses.php" method="POST">
        <div class="form-group">
            <label for="name" class="kontak2">Nama:</label>
            <input type="text" id="name" name="name" size="50" required>
        </div>

        <div class="form-group">
            <label for="email" class="kontak2">Email:</label>
            <input type="email" id="email" name="email" size="50" required>
        </div>

        <div class="form-group">
            <label for="message" class="kontak2">Pesan:</label>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea>
        </div>

        <input type="submit" value="Kirim">
    </form>
</div>


<div class="footer">
    <div class="foot">
        <p><i class="fa-solid fa-hashtag fa-2xl"></i> Copyright &copy; 2023 - All right reserved</p>
    </div>
    <div class="foot">
        <i class="fa-brands fa-twitter fa-2xl"></i>
        <i class="fa-brands fa-facebook fa-2xl"></i>
        <i class="fa-brands fa-youtube fa-2xl"></i>
    </div>
</div>
<script>
    const links = document.querySelectorAll('.nav-links a');

links.forEach(link => {
    link.addEventListener('click', function(event) { // Untuk mencegah navigasi ke URL

        // Menghapus kelas 'active' dari semua tautan
        links.forEach(link => {
            link.classList.remove('active');
        });

        // Menambahkan kelas 'active' ke tautan yang diklik
        this.classList.add('active');
    });
});
</script>
</body>
</html>