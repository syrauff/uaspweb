<?php include ('head.php');
    include ('../database/helpers.php');
?>
    <?php include ('sidebar.php') ?>
    <div class="latar">
        <div class="konten">
        <?php include('tahapan.php') ?>
        
        <?php include('data.php') ?>
            <div class="menu">
                <form action="" method="post">
                    <h3>Study Grup</h3>
                <h4>Partisipasi: </h4>
                <?php $hasil = query("SELECT * FROM hasil WHERE peserta_id = $id")[0]; ?>
                <label>
                    <input type="radio" name="tahap2_absen" value="1"  <?php if ($hasil['tahap2_absen'] == "1") echo "checked"; ?>>
                    Hadir
                </label>
            
                <label>
                    <input type="radio" name="tahap2_absen" value="0"  <?php if ($hasil['tahap2_absen'] == "0") echo "checked"; ?>>
                    Tidak Hadir
                </label>
                
                <br>
                <h4>Karya: </h4> <br>
                <?php  
                    $tampilKarya = query("SELECT karya FROM file_peserta WHERE peserta_id = $id")[0];
                    
                    if ($tampilKarya['karya']) {
                        if ($tampilKarya['karya'] == "../file/karya/") {
                            echo "<span style='color: red; font-style: italic'>Silahkan Upload Karya</span>";
                        } else {
                            $jenisFileKarya = pathinfo($tampilKarya['karya'], PATHINFO_EXTENSION);
                            if ($jenisFileKarya == "jpg" || $jenisFileKarya == "jpeg" || $jenisFileKarya == "png" || $jenisFileKarya == "gif") {
                                echo '<img src="' . $tampilKarya['karya'] . '" alt="Karya" width="300" height="400" style="margin-left: 30px;">';
                            } else {
                                echo '<a href="' . $tampilKarya['karya'] . '" download style="color: blue; text-decoration: none; border: 1px solid blue; padding: 5px; border-radius: 4px;">Unduh Karya</a>';
                            }
                        }
                    } else {
                        echo "<span style='color: red; font-style: italic'>Karya tidak diUpload</span>";
                    }
                    ?>
                <br>
                <h4 href="">Hasil</h4>
                <input type="number" name="tahap2_nilai" min="0" max="10" value="<?= $hasil['tahap2_nilai'] ?>">
                <button type="submit" class="maroon-button" name="upload" style="float: right;"> Upload</button>
                </form>

                <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $kehadiran = intval($_POST['tahap2_absen']);
                    $nilai = intval($_POST['tahap2_nilai']);
                    $nilaiTahap2 = query("SELECT * FROM peserta WHERE id = $id")[0];

                    $nilaiTahap2 = "UPDATE hasil 
                    SET 
                        tahap2_absen = '$kehadiran',
                        tahap2_nilai = '$nilai' 
                    WHERE peserta_id = $id";
                        $run_sql3 = mysqli_query($mysqli, $nilaiTahap2);
                }
                ?>
            </div>
        </div>
    </div>
<?php include('footer.php') ?>