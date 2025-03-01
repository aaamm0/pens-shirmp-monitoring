<?php
include "koneksi.php"; // Pastikan file koneksi sudah benar

// Jika ada data POST yang diterima
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['ph']) &&
    isset($_POST['salinity']) &&
    isset($_POST['temperature']) &&
    isset($_POST['dissolveOxygen']) &&  // Validasi untuk parameter DO
    isset($_POST['aerator1']) &&       // Validasi untuk aerator1
    isset($_POST['aerator2'])
) {       // Validasi untuk aerator2

    // Ambil data dari POST
    $ph = $_POST['ph'];
    $salinity = $_POST['salinity'];
    $temperature = $_POST['temperature'];
    $dissolveOxygen = $_POST['dissolveOxygen']; // Tangkap data DO
    $aerator1 = $_POST['aerator1'];  // Tangkap status aerator 1
    $aerator2 = $_POST['aerator2'];  // Tangkap status aerator 2

    // Simpan data ke database
    $sql = "INSERT INTO sensor_data (temperature, ph, salinity, dissolveOxygen, aerator1, aerator2) 
            VALUES ('$temperature', '$ph', '$salinity', '$dissolveOxygen', '$aerator1', '$aerator2')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request or missing parameters";
}

// Tutup koneksi
$conn->close();
