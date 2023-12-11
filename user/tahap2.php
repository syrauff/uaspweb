<?php include('head.php');
    require ('../database/helpers.php');
    $id = $_SESSION["id"];
    if(isset($_POST['upload'])){
        $karya = $_FILES['karya'];
        $result = uploadFile2($karya, $id);
    }

    $id = $_SESSION["id"];

    $psrt = query("SELECT * FROM hasil WHERE peserta_id = $id")[0];
    $tampilKarya = query("SELECT karya FROM file_peserta WHERE peserta_id = $id")[0];

?>
    
      
            
            <div class="menu">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2>Study Grup</h2>
                <h4>Partisipasi: <?php if($psrt['tahap2_absen'] == 1){ echo "Hadir";} else { echo "Tidak Hadir";}  ?></h4>
                
                <br>
                <h4>Karya: </h4> <br>
        <?php   
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
                echo "<span style='color: red; font-style: italic'>Silahkan Upload Karya</span>";
            }
        ?> <br>        
                <input type="file" id="karya" name="karya">
                <button type="submit" name="upload" class="maroon-button" style="margin-left: 5px; font-size: 15px; padding: 5px; font-weight:500;">Upload</button>
                <br>
                <h4 href="">Hasil: </h4>
                </form>
            </div>
        </div>
    </div>

    <script>
     
    </script>
</body>
</html>