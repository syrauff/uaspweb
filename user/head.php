<?php require_once ('..\database\koneksi.php'); 
    session_start();
    if (!isset($_SESSION["login"])){
        header("Location: ../login.php");
        exit;
    }

    if(isset($_GET['logout'])) {
        // Menampilkan konfirmasi logout
        session_unset();

        // Hancurkan session
        session_destroy();

        // Redirect ke halaman utama atau halaman login (sesuaikan dengan kebutuhan)
        header("Location: ../index.php");
        
        echo '<script>
                if(confirm("Apakah Anda yakin ingin logout?")) {
                    
                    window.location.href = "logout.php";
                } else {
                    window.history.back();
                }
              </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\src\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>UKM Risti</title>

    <style>
        input[type="submit"] {
            margin-left:auto; padding:10px; background-color: red; border:none; border-radius:5px; color:aliceblue; font-weight:600
        }
        input[type="submit"]:hover{
            background-color: #FF6969;

        }

        input, label{
            display: inline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="..\src\img\RISTI.png" alt="" width="50" height="50">
            <h3>Risti UNG</h3>
        </div>
        <div class="nav-links">
            
        </div>
        <div class="login">
        <a href="?logout=1"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <p>Home</p>
        <a href="#" class="sidebar-link active"><i class="fa-solid fa-bars-progress"></i>&ensp; Progress</a>
        
    </div>

    <div class="latar">
        <div class="konten">
            <div class="menu">
                <a href="index.php">Tahap 1</a>
                <a href="tahap2.php">Tahap 2</a>
                <a href="tahap3.php">Tahap 3</a>
            </div>