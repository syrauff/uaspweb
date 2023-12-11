<?php

require ('koneksi.php');
// Mendapatkan data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$angkatan = $_POST['angkatan'];
$jurusan = $_POST['jurusan'];

$dirfile1 = $_FILES["cv"]["tmp_name"];

// Query untuk menambah data
$sql = "INSERT INTO peserta (id, nama, nim, angkatan, jurusan) VALUES ('$id', '$nama', '$nim', '$angkatan', '$jurusan')";
$run_sql = mysqli_query($mysqli, $sql);


$targetcv = "../file/cv/"; 
$targetktm = "../file/ktm/"; 
$targetFile2 = $targetktm . basename($_FILES["ktm"]["name"]);
$targetFile = $targetcv . basename($_FILES["cv"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile & $targetFile2, PATHINFO_EXTENSION));

if (file_exists($targetFile || "")) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}
if (file_exists($targetFile2 || "")) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}


if ($_FILES["cv"]["size"] > 1000000) {
    echo "Maaf, file terlalu besar. ";
    $uploadOk = 0;
}
if ($_FILES["ktm"]["size"] > 1000000) {
    echo "Maaf, file terlalu besar. ";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Maaf, file tidak diunggah.";
} else {
    if (move_uploaded_file($dirfile1, $targetFile)) {
        $sql = "INSERT INTO file_peserta (peserta_id, cv, ktm) VALUES ('$peserta_id', '$targetFile', '$targetFile2')";
        echo "File berhasil diunggah.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
        
    }
}
?>