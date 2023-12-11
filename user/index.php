<?php 
    include('head.php');
    require ('../database/helpers.php');
    $id = $_SESSION["id"];
    if(isset($_POST['ubah'])){
        $data = array(
            "id" => $_POST["id"],
            "nama" => $_POST["nama"],
            "nim" => $_POST["nim"],
            "angkatan" => $_POST["angkatan"],
            "jurusan" => $_POST["jurusan"]            
        );
        $result = ubah($data);
    }
    if (isset($_FILES['cv']) || isset($_FILES['ktm'])) {
        $cv = $_FILES ['cv'];
        $ktm = $_FILES ['ktm'];
        $result = uploadFile($cv, $ktm, $id);
    }

    $psrt = query("SELECT * FROM peserta WHERE id = $id")[0];
    $tampil= query("SELECT * FROM file_peserta WHERE peserta_id = $id")[0];
?>
            <form action="" method="post" enctype="multipart/form-data">
                <h2 style="margin:20px 0px;">Biodata Peserta</h2>
            <table>
                <input type="hidden" name="id" id="id" value="<?php echo $psrt["id"]; ?>">
                <tr>
                    <td><h4>Nama Lengkap:</h4></td>
                    <td><input type="text" size="50" id="nama" name="nama" value="<?php echo $psrt["nama"]; ?>"></td>
                </tr>
                <tr>
                    <td><h4>NIM:</h4></td>
                    <td><input type="text" id="nim" name="nim" value="<?php echo $psrt["nim"]; ?>"></td>
                </tr>
                <tr>
                    <td><h4>Angkatan:</h4></td>
                    <td><input type="radio" id="angkatan22" name="angkatan" value="2022" checked>
                        <label for="angkatan22">2022</label><br>
                        <input type="radio" id="angkatan23" name="angkatan" value="2023">
                        <label for="angkatan23">2023</label><br>
                    </td>
                </tr>
                <tr>
                    <td><h4>Jurusan:</h4></td>
                    <td><input type="text" size="30" id="jurusan" name="jurusan" value="<?php echo $psrt["jurusan"]; ?>"></td>
                </tr>
            </table>
            
            <div class="menu">
                    <h3>Kelengkapan Administrasi</h3>
                    <h4>CV: </h4> <br>
                    
                    <?php 
                        if ($tampil['cv']) {
                            if ($tampil['cv'] == "../file/cv/") {
                                echo "<span style='color: red; font-style: italic'>Silahkan Upload CV</span>";
                            } else {
                                $jenisFileCV = pathinfo($tampil['cv'], PATHINFO_EXTENSION);
                                if ($jenisFileCV == "jpg" || $jenisFileCV == "jpeg" || $jenisFileCV == "png" || $jenisFileCV == "gif") {
                                    echo '<p style="color: green;">File telah diUpload</p>';
                                } else {
                                    echo '<p style="color: green;">File telah diUpload</p>';
                                }
                            }
                        } else {
                            echo "<span style='color: red; font-style: italic'>Silahkan Upload CV</span>";
                        }
                    ?>
                    <input type="file" id="cv" name="cv">
                    <br>
                    <h4 >KTM: </h4> <br>
                        <?php 
                            if ($tampil['ktm']) {
                                if ($tampil['ktm'] == "../file/ktm/") {
                                    echo "<span style='color: red; font-style: italic'>Silahkan Upload KTM</span>";
                                } else {
                                    $jenisFileKTM = pathinfo($tampil['ktm'], PATHINFO_EXTENSION);
                                    if ($jenisFileCV == "jpg" || $jenisFileCV == "jpeg" || $jenisFileCV == "png" || $jenisFileCV == "gif") {
                                        echo '<p style="color: green;">File telah diUpload</p>';
                                    } else {
                                        echo '<p style="color: green;">File telah diUpload</p>';
                                    }
                                }
                            } else {
                                echo "<span style='color: red; font-style: italic'>Silahkan Upload KTM</span>";
                            }
                        ?>
                    <input type="file" id="ktm" name="ktm"> <br>
                    <button type="submit" name="ubah" class="maroon-button" style="float: right;">Submit</button>
            </form>
            </div>
        </div>
    </div>
   
</body>
</html>