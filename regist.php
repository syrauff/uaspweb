<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>UKM Risti</title>
    <style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background-color: #d1d1d195;
    }

    .bglogin {
        width: 500px;
        display: flex;
        flex-direction: column;
        padding: 20px;
        border-radius: 8px; 
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    }

    .boxatas {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 0px 30px;
        margin-bottom: 10px;
    }

    .boxatas img {
        margin: 0;
    }

    .boxbawah {
        width: 100%;
        padding: 0px 40px 20px 40px;
    }

    .boxbawah h1{
        margin: 0px 40px 0px 0px;
        opacity: 0.5;
    }

    .boxbawah p {
        margin-top: 10px;
        margin-bottom: 5px;
    }

    input {
        width: 85%;
        padding: 7px;
        margin-bottom: 10px;
        box-sizing: border-box;
        background-color: #E8F0FE;
        border: 1px solid gray;
        border-radius: 5px;
    }
    p input{
        margin: 0;
        padding: 5px;
    }
    button{
        margin-bottom: 10px;
    }
</style>
    </style>
</head>
<body>
    <div class="bglogin">
        <div class="boxatas">
            <img src="src\img\RISTI.png" alt="" width="70" height="70">
            <h3>UNIT KEGIATAN MAHASISWA <br> RISET TEKNOLOGI INFORMASI <br>UNIVERSITAS NEGERI GOTONTALO</h3>
        </div>
        
        <div class="boxbawah">
            <h1>Registrasi</h1>

             <form id="registrationForm" action="database/register.php" method="post">
                <input type="hidden" name="action" value="registrasi">
                <button type="button" onclick="setRole('peserta')">Daftar sebagai Peserta</button>
                <button type="button" onclick="setRole('pengurus')">Daftar sebagai Pengurus</button>
                
                <input type="text" id="roleInput" name="role" value="" readonly>
           
            <p>email:</p>
            <input type="email" id="email" name="email">
            <p>Password</p>
            <input type="password" id="password" name="password">
                <div style="display: flex; justify-content: space-between; width:400px; align-items: center;">
                <p style="display: flex; "><input type="checkbox">  Remember_me</p>
                </div>
            <input type="submit" value="Daftar" style="background-color: #ff3838; color: #E8F0FE; font-weight: 400; cursor: pointer;">
        </form>
        </div>
    
    </div>
    <script>
        function setRole(role) {
            document.getElementById('roleInput').value = role;
            
            
        }
    </script>
</body>
</html>