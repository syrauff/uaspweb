    
<?php require_once ('..\database\koneksi.php'); 
    session_start();
    if (!isset($_SESSION["login"])){
        header("Location: ../login.php");
        exit;
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
            <a href=".."><i class="fa-solid fa-right-from-bracket"></i> Logout </a>
        </div>
    </div>