<?php include('head.php') ?>
<?php 
require ('../database/helpers.php');
$id = $_SESSION["id"];
$hasil = query("SELECT * FROM hasil WHERE peserta_id = $id")[0];


    $absen1 = $hasil['tahap3_absen1']; 
    $absen2 = $hasil['tahap3_absen2']; 
    $absen3 = $hasil['tahap3_absen3']; 
    $absen4 = $hasil['tahap3_absen4']; 
    $absen5 = $hasil['tahap3_absen5'];
?>
            
            <div class="menu">
                <form action="">
                    <h2>Partisipasi Materi Pembelajaran</h2>
                    <h3>Materi Programming</h3>
                    <h4 href="">Partisipasi: <?php if ($absen1 == "1") {echo "Hadir";} else {echo "Tidak Hadir";}?></h4>
                    
                    <br>
                    

                    <h3>Materi Design Graphic</h3>
                    <h4 href="">Partisipasi: <?php if ($absen2 == "1") {echo "Hadir";} else {echo "Tidak Hadir";}?></h4>
                    
                    <br>
                    
                    

                    <h3>Materi NOS</h3>
                    <h4 href="">Partisipasi: <?php if ($absen3 == "1") {echo "Hadir";} else {echo "Tidak Hadir";}?></h4>
                    
                    <br>
                    
                    

                    <h3>Materi Cinematography</h3>
                    <h4 href="">Partisipasi: <?php if ($absen4 == "1") {echo "Hadir";} else {echo "Tidak Hadir";} ?></h4>
                    
                    <br>
                    
                    

                    <h3>Materi Manajemen dan Keorganisasian</h3>
                    <h4 href="">Partisipasi: <?php if ($absen5 == "1"){echo "Hadir";} else {echo "Tidak Hadir";}?></h4>
                    
                    <br>
                    
                    

                </form>
            </div>
        </div>
    </div>
</body>
</html>