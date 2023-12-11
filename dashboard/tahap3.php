<?php include ('head.php') ?>

<?php include ('../database/helpers.php'); ?>
<?php include ('sidebar.php') ?>



    <div class="latar">
        <div class="konten">
             <?php include('tahapan.php') ?>

             
             <?php include('data.php') ?>
            <div class="menu">

            <?php 
                $tahap3 = "SELECT * FROM hasil WHERE peserta_id = $id";
                $jalan = mysqli_query($mysqli, $tahap3);
                if($jalan){
                    $row = mysqli_fetch_assoc($jalan);
                }    
                
            ?>

                <form action="" method="post" id="tahap3">
                <div class="absen">
                <h3>Materi Programming</h3>
                    <h4 >Partisipasi: </h4>
                     
                    <label for="tahap3_absen1">Hadir</label>
                        <input type="radio" name="tahap3_absen1" value="1" <?php if ($row['tahap3_absen1'] == "1") echo "checked"; ?>>Tidak Hadir
                        <input type="radio" name="tahap3_absen1" value="0" <?php if ($row['tahap3_absen1'] == "0") echo "checked"; ?>><br><br>

                        <h3>Materi Design Graphic</h3>
                        <h4>Partisipasi: </h4>
                        <label for="tahap3_absen2">Hadir</label>
                        <input type="radio" name="tahap3_absen2" value="1" <?php if ($row['tahap3_absen2'] == "1") echo "checked"; ?>>Tidak Hadir
                        <input type="radio" name="tahap3_absen2" value="0" <?php if ($row['tahap3_absen2'] == "0") echo "checked"; ?>><br><br>

                        <h3>Materi NOS</h3>
                        <h4>Partisipasi: </h4>
                        <label for="tahap3_absen3">Hadir</label>
                        <input type="radio" name="tahap3_absen3" value="1" <?php if ($row['tahap3_absen3'] == "1") echo "checked"; ?>>Tidak Hadir
                        <input type="radio" name="tahap3_absen3" value="0" <?php if ($row['tahap3_absen3'] == "0") echo "checked"; ?>><br><br>

                        <h3>Materi Cinematography</h3>
                        <h4>Partisipasi: </h4>
                        <label for="tahap3_absen4">Hadir</label>
                        <input type="radio" name="tahap3_absen4" value="1" <?php if ($row['tahap3_absen4'] == "1") echo "checked"; ?>>Tidak Hadir
                        <input type="radio" name="tahap3_absen4" value="0" <?php if ($row['tahap3_absen4'] == "0") echo "checked"; ?>><br><br>

                        <h3>Materi Manajemen dan Keorganisasian</h3>
                        <h4>Partisipasi: </h4>
                        <label for="tahap3_absen5">Hadir</label>
                        <input type="radio" name="tahap3_absen5" value="1" <?php if ($row['tahap3_absen5'] == "1") echo "checked"; ?>>Tidak Hadir
                        <input type="radio" name="tahap3_absen5" value="0" <?php if ($row['tahap3_absen5'] == "0") echo "checked"; ?>><br><br>
                     
                    <br>
                    <button type="submit" name="upload" class="maroon-button" style="float: right;">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php


$peserta = query("SELECT * FROM peserta WHERE id = $id")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $tahap3_absen1 = '';
    // $tahap3_absen2 = '';
    // $tahap3_absen3 = '';
    // $tahap3_absen4 = '';
    // $tahap3_absen5 = '';
    // $tahap3_nilai1 = '';
    // $tahap3_nilai2 = '';
    // $tahap3_nilai3 = '';
    // $tahap3_nilai4 = '';
    // $tahap3_nilai5 = '';

    

    $tahap3_absen1 = intval($_POST['tahap3_absen1']); 
    $tahap3_absen2 = intval($_POST['tahap3_absen2']); 
    $tahap3_absen3 = intval($_POST['tahap3_absen3']); 
    $tahap3_absen4 = intval($_POST['tahap3_absen4']); 
    $tahap3_absen5 = intval($_POST['tahap3_absen5']);

    $peserta_id = $id;

    $hasilpsrt = "UPDATE hasil 
    SET 
        tahap3_absen1 = '$tahap3_absen1', 
        tahap3_absen2 = '$tahap3_absen2', 
        tahap3_absen3 = '$tahap3_absen3', 
        tahap3_absen4 = '$tahap3_absen4', 
        tahap3_absen5 = '$tahap3_absen5'
    WHERE peserta_id = '$peserta_id'";
        $run_sql3 = mysqli_query($mysqli, $hasilpsrt);
}
?>
   
   
   <?php include('footer.php') ?>