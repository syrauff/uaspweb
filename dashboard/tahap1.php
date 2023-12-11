<?php include ('head.php') 
    
?>
    <?php include ('sidebar.php') ?>
    <div class="latar">
        <div class="konten">

        <?php include('tahapan.php');
         
        ?>
            <?php include('data.php') ?>
            <div class="menu">
                <form action="" method="post">
                <h3>Kelengkapan Administrasi</h3>
                <h4 href="">CV:</h4> <br>
                <?php 
                include ('../database/helpers.php');
                $tampil= query("SELECT * FROM file_peserta WHERE peserta_id = $id")[0];
                $nilai = query("SELECT tahap1 FROM hasil WHERE peserta_id = $id")[0];
                if ($tampil['cv']) {
                    if ($tampil['cv'] == "../file/cv/") {
                        echo "<span style='color: red; font-style: italic'>Silahkan Upload CV</span>";
                    } else {
                        $jenisFileCV = pathinfo($tampil['cv'], PATHINFO_EXTENSION);
                        if ($jenisFileCV == "jpg" || $jenisFileCV == "jpeg" || $jenisFileCV == "png" || $jenisFileCV == "gif") {
                            echo '<img src="' . $tampil['cv'] . '" alt="CV" width="300" height="400" style="margin-left: 30px;">';
                        } else {
                            echo '<a href="' . $tampil['cv'] . '" download style="color: blue; text-decoration: none; border: 1px solid blue; padding: 5px; border-radius: 4px;">Unduh CV</a>';
                        }
                    }
                } else {
                    echo "<span style='color: red; font-style: italic'>Silahkan Upload CV</span>";
                }
                ?>
                <br>
                <h4 href="">KTM:</h4>
                <?php 
                
                            if ($tampil['ktm']) {
                                if ($tampil['ktm'] == "../file/ktm/") {
                                    echo "<span style='color: red; font-style: italic'>Belum diupload</span>";
                                } else {
                                    $jenisFileKTM = pathinfo($tampil['ktm'], PATHINFO_EXTENSION);
                                    if ($jenisFileKTM == "jpg" || $jenisFileKTM == "jpeg" || $jenisFileKTM == "png" || $jenisFileKTM == "gif") {
                                        echo '<img src="' . $tampil['ktm'] . '" alt="KTM" width="300" height="400" style="margin-left: 30px;">';
                                    } else {
                                        echo '<a href="' . $tampil['ktm'] . '" download style="color: blue; text-decoration: none; border: 1px solid blue; padding: 5px; border-radius: 4px;">Unduh KTM</a>';
                                    }
                                }
                            } else {
                                echo "<span style='color: red; font-style: italic'>Belum diUpload</span>";
                            }
                ?>
                <br>
                <?php 
                $tahap1 = "SELECT * FROM hasil WHERE peserta_id = $id";
                $jalan = mysqli_query($mysqli, $tahap1);
                if($jalan){
                    $row = mysqli_fetch_assoc($jalan);
                }    
                
            ?>
                <h4>Hasil: </h4><input type="number" min="0" max="10" name="tahap1" value="<?= $row['tahap1'] ?>"><br>
                <button class="maroon-button" name="nilai" style="float: right;">Upload</button>
                </form>

                <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nilai = intval($_POST['tahap1']);

                    $tahap1 = "UPDATE hasil 
                    SET 
                        tahap1 = '$nilai'
                    WHERE peserta_id = $id";

                    $run_sql3 = mysqli_query($mysqli, $tahap1);
                }
                ?>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>