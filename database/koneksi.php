<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'tu'; 

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

?>