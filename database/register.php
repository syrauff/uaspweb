<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan koneksi ke database dilakukan di sini
    
    include ('koneksi.php');

       
    switch($_POST['action']){
        case 'registrasi':
            $email = $_POST['email'];

            $input_email = $_POST['email']; 
            if (isset($_POST['role'])) {
                $role = $_POST['role'];
                    
                    $table = '';
                    if ($role === 'peserta') {
                        $table = 'peserta';
                        $check_query = "SELECT * FROM $table WHERE email = '$input_email'";
                        $result = mysqli_query($mysqli, $check_query);

                        if(mysqli_num_rows($result) > 0) {
                            // Email sudah ada di basis data, berikan pesan kesalahan kepada pengguna
                            echo "Email sudah terdaftar. Silakan gunakan email lain.";
                            session_start();
                            $_SESSION['pesan'] = "Email sudah ada, silahkan gunakan email lain!";
                            header("Location: ../login.php");
                            exit();
                        } 
                    } elseif ($role === 'pengurus') {
                        $table = 'pengurus';
                        $check_query = "SELECT * FROM $table WHERE email = '$input_email'";
                        $result = mysqli_query($mysqli, $check_query);

                        if(mysqli_num_rows($result) > 0) {
                            // Email sudah ada di basis data, berikan pesan kesalahan kepada pengguna
                            echo "Email sudah terdaftar. Silakan gunakan email lain.";
                            header("Location: ../login.php");
                            exit();
                        } 
                    }
                } 
                else {
                    echo "tidak ada email";
                }

            // Batas

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $lastId = $row['id'];
            } else {
                $lastId = 0;
            }
            $id = $lastId + 1;



            $sql = "INSERT INTO $table (id, email, password) VALUES ('$id', '$email', '$password')";
            
            
            
            $run_sql1 = mysqli_query($mysqli, $sql);

            $peserta_id = $id;
            $filepsrt = "INSERT INTO file_peserta (peserta_id) VALUES ('$peserta_id')";
            $run_sql2 = mysqli_query($mysqli, $filepsrt);

            // $peserta_id = $id;
            // $filepsrt = "INSERT INTO file_peserta (peserta_id, cv, ktm, karya) VALUES ('$peserta_id', '$cv', '$ktm', '$karya')";
            // $run_sql2 = mysqli_query($mysqli, $filepsrt);

            
            $hasilpsrt = "INSERT INTO hasil (peserta_id) VALUES ('$peserta_id')";
            $run_sql3 = mysqli_query($mysqli, $hasilpsrt);
            if ($run_sql3) {
                $id_hasil = "SELECT id FROM hasil WHERE peserta_id = $peserta_id";
                $hasil_tim = "INSERT INTO tim_penilai (hasil_id) VALUES ('$id_hasil')";
            }
            $hasilpsrt = "INSERT INTO hasil (peserta_id, tahap1, tahap2_absen, tahap2_nilai, tahap3_absen1, tahap3_absen2, tahap3_absen3, tahap3_absen4, tahap3_absen5) VALUES ('$peserta_id', 0, 0, 0, 0, 0, 0, 0, 0)";
            $run_sql3 = mysqli_query($mysqli, $hasilpsrt);
            
            $hasilakhir = "INSERT INTO hasilakhir (peserta_id, tahap1, tahap2, tahap3) VALUES ('$peserta_id', 0, 0, 0)";
            $run_sql = mysqli_query($mysqli, $hasilakhir);

            


            if ($run_sql){
                header("location: ../login.php");
            }
            break;
        case 'login':
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $email = $_POST['email']; // Ambil email yang dicari

// Cari email di tabel peserta
$query_peserta = "SELECT * FROM peserta WHERE email = '$email'";
$run_sql = mysqli_query($mysqli, $query_peserta);

if(mysqli_num_rows($run_sql) > 0) {
    // Jika ditemukan di tabel peserta
    $data = mysqli_fetch_assoc($run_sql);
    $variabel_hasil = $data['email'];
    $id = $data['id'];
    $tmp_email = "peserta";
    echo "peserta";
} else {
    // Jika tidak ditemukan di tabel peserta, cari di tabel pengurus
    $query_pengurus = "SELECT * FROM pengurus WHERE email = '$email'";
    $run_sql = mysqli_query($mysqli, $query_pengurus);

    if(mysqli_num_rows($run_sql) > 0) {
        // Jika ditemukan di tabel pengurus
        $data = mysqli_fetch_assoc($run_sql);
        $variabel_hasil = $data['email'];
        $id = $data['id'];
        $tmp_email = "pengurus";
        echo "pengurus";
    } else {
        // Jika tidak ditemukan di kedua tabel
        echo "<script>alert('Email tidak terdaftar!')</script>";
    }
    
}

            if(mysqli_num_rows($run_sql)>0){
                    if(password_verify($password, $data['password'])){
                        $email = $data['email'];
                        if($tmp_email === "peserta"){
                            header("location: ../user");
                            $_SESSION["login"]=true;
                            $_SESSION["id"]= $id;
                        } elseif ($tmp_email === "pengurus"){
                            header("location: ../dashboard");
                            $_SESSION["login"]=true;
                            $_SESSION["id"]= $id;
                        } else {
                            header("location: ../login.php");
                        }
                    } else {
                        echo "<script>alert('Password salah!')</script>";
                    }
                
            } 
        default:

        break;
    }
   
    
}

?>