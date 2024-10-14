<?php
$servername = "localhost";  // atau IP dari server database
$username = "root";         // username database
$password = "";             // password database
$dbname = "shirmpcare";  // nama database

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
