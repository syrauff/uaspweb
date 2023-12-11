    
<?php require_once ('..\database\koneksi.php'); 
    require ('..\database\helpers.php');
    $pengurus = query("SELECT * FROM pengurus");
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
            tr {
                border-bottom: 1px solid #ddd;
                height: 30px;
            }
            table {
                width: 70%;
                float: right;
                align-items: center;
                justify-self: center;
                margin-right: 10%;
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
                <a href="#">Tentang</a>
                <a href="#">Divisi & Bidang <i class="fa-solid fa-caret-down"></i></a>
                <a href="#">Struktur Kepengurusan</a>
                <a href="#">Kontak</a>
            </div>
            <div class="login">
                <a href=".."><i class="fa-solid fa-right-from-bracket"></i> Logout </a>
            </div>
        </div>

        <div class="sidebar" style="margin-top: 50px;">
        <p>Home</p>
        <a href="#"><i class="fa-regular fa-star"></i>&ensp; Tim Penilai</a>
        
        
    </div>

    <div class="container">
            <div class="list-pengurus">
                <h1>Tim Penilai</h1>
                <table >
                    <tr>
                        <th style="width:10%;">No</th>
                        <th style="width: 70%;">Nama</th>
                        <th>Tim Penilai</th>
                    </tr>
                    
                    <?php $i = 1;?>
                    <?php foreach ($pengurus as $row) : ?>
                    <tr>
                    <td><?= $i; $i++ ?></td>
                    <td><?= $row["email"] ?></td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>