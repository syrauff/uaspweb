<?php 
	include 'koneksi.php';

function query($sql) {
	global $mysqli;
	$result = mysqli_query($mysqli, $sql);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function store($data) {
	global $mysqli;

	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$sql = "INSERT INTO mahasiswa
				VALUES
			('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";

	mysqli_query($mysqli, $sql);

	return mysqli_affected_rows($mysqli);
}

function ubah($data) {
	global $mysqli;

	$id = $data["id"];

	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$angkatan = htmlspecialchars($data["angkatan"]);
	$jurusan = htmlspecialchars($data["jurusan"]);


	$sql = "UPDATE peserta SET
			nama = '$nama',
			nim = '$nim',
			angkatan = '$angkatan',
			jurusan = '$jurusan'
		WHERE
			id = $id
	";
	mysqli_query($mysqli, $sql);

	return mysqli_affected_rows($mysqli);
}


function uploadFile($cv, $ktm, $peserta_id) {
	global $mysqli;
	$targetcv = "../file/cv/";
	$targetktm = "../file/ktm/";
	$targetFile = $targetcv . basename($cv["name"]);
	$targetFile2 = $targetktm . basename($ktm["name"]);
	$uploadOk = 1;

	$tFile = "SELECT cv, ktm FROM file_peserta WHERE peserta_id = $peserta_id";
	$ambilkan = mysqli_query($mysqli, $tFile);

	$susun = $ambilkan->fetch_assoc();

	if ($cv["size"] > 1000000 || $ktm["size"] > 1000000 ) {
		echo "Maaf, file terlalu besar.";
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Maaf, file tidak diunggah.";
	} else {

		if (!empty($cv["tmp_name"]) || !empty($ktm["tmp_name"])) {
			// Check if $cv or $ktm is not empty (at least one file is uploaded)
			$targetFile = $susun["cv"];
			$targetFile2 = $susun["ktm"];
		
			if (!empty($cv["tmp_name"])) {
				// Upload CV file
				$targetFile = $targetcv . basename($cv["name"]);
				if (move_uploaded_file($cv["tmp_name"], $targetFile)) {
					echo "CV file berhasil diunggah.";
				} else {
					echo "Gagal mengunggah CV file.";
				}
			}
		
			if (!empty($ktm["tmp_name"])) {
				// Upload KTM file
				$targetFile2 = $targetktm . basename($ktm["name"]);
				if (move_uploaded_file($ktm["tmp_name"], $targetFile2)) {
					echo "KTM file berhasil diunggah.";
				} else {
					echo "Gagal mengunggah KTM file.";
				}
			}
	
			$sql = "UPDATE file_peserta SET
						cv = '$targetFile',
						ktm = '$targetFile2'
					WHERE
						peserta_id = $peserta_id
					";
			echo "File berhasil diunggah.";

			mysqli_query($mysqli, $sql);

			return mysqli_affected_rows($mysqli);
		} else {
			echo "Tidak ada file yang diunggah.";
		}		
	}
}

function uploadFile2($karya, $peserta_id) {
	global $mysqli;
	$targetkarya = "../file/karya/";
	$targetFileKarya = $targetkarya . basename($_FILES["karya"]["name"]);
	$uploadOk = 1;

	if (file_exists($targetFileKarya)) {
		echo "Maaf, file sudah ada.";
		$uploadOk = 0;
	}

	if ($karya["size"] > 1000000) {
		echo "Maaf, file terlalu besar.";
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Maaf, file tidak diunggah.";
	} else {
		if (move_uploaded_file($karya["tmp_name"], $targetFileKarya)) {
			$sql = "UPDATE file_peserta SET
						karya = '$targetFileKarya'
					WHERE
						peserta_id = $peserta_id
					";
			echo "File berhasil diunggah.";

			mysqli_query($mysqli, $sql);

			return mysqli_affected_rows($mysqli);
		} else {
			echo "Maaf, terjadi kesalahan saat mengunggah file.";
		}
	}
}
function hapus($id) {
	global $mysqli;
	mysqli_query($mysqli, "delete from peserta where id = $id");

	return mysqli_affected_rows($mysqli);
}