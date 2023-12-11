<?php include ('head.php');

require '../database/helpers.php';
$peserta = query("SELECT * FROM peserta");
?>
<?php include ('sidebar.php') ?>
    <div class="latar">
        <h1>Peserta Pendaftar</h1>
        <div class="konten">

        
        
        <table border="1">
            <tr style="border-bottom: 2px solid black;">
            <th>No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>
            </tr>

            <?php $i = 1;?>
            <?php foreach ($peserta as $row) : ?>

            <tr>
            <td><?= $i; $i++ ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["jurusan"] ?></td>
            <td><a href="tahap1.php?id=<?= $row["id"];?>">Nilai</a> <a href="index.php?id=<?= $row["id"];?>" onclick="return confirm('yakin Hapus?')">Hapus</a></td>    
            </tr>
            <?php endforeach ?>
            <!-- Tambahkan baris sesuai dengan data yang ingin Anda tampilkan -->
        </table>

       
        </div>
        </div>
        <?php
            if(isset($_GET['id'])){
            $id = $_GET["id"];

            if( hapus($id) > 0 ) {
                echo "<script>
                        alert('data berhasil dihapus!');
                        document.location.href = 'index.php';
                    </script>";
            } else {
                echo "<script>
                        alert('data gagal dihapus!');
                        document.location.href = 'index.php';
                    </script>";
            }
            }
        ?>
        <?php include('footer.php') ?>