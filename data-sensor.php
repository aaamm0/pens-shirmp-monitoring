<?php
include "koneksi.php"; // Pastikan file koneksi sudah benar

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "ONLY POST METHOD";
    $conn->close();
    die;
}

// Jika ada data POST yang diterima
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['ph']) &&
    isset($_POST['salinity']) &&
    isset($_POST['temperature']) &&
    isset($_POST['dissolveOxygen']) &&
    isset($_POST['aerator1']) &&
    isset($_POST['aerator2']) &&
    isset($_POST['durasiaerator']) &&
    isset($_POST['durasiaerator2'])
) {
    // Ambil data dari POST
    $ph = $_POST['ph'];
    $salinity = $_POST['salinity'];
    $temperature = $_POST['temperature'];
    $dissolveOxygen = $_POST['dissolveOxygen'];
    $aerator1 = $_POST['aerator1'];
    $aerator2 = $_POST['aerator2'];

    $durasiaerator1 = $_POST['durasiaerator'];
    $durasiaerator2 = $_POST['durasiaerator2'];

    // Cek apakah timestamp dikirim
    if (isset($_POST['timestamp']) && !empty($_POST['timestamp'])) {
        $timestamp = $_POST['timestamp'];
    } else {
        $timestamp = date('Y-m-d H:i:s'); // Pakai timestamp sekarang
    }

    // Simpan data ke database
    $sql = "INSERT INTO sensor_data (temperature, ph, salinity, dissolveOxygen, aerator1, aerator2, timestamp, aerator1_duration, aerator2_duration) 
            VALUES ('$temperature', '$ph', '$salinity', '$dissolveOxygen', '$aerator1', '$aerator2', '$timestamp', '$durasiaerator1', '$durasiaerator2')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Data inserted successfully";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "⚠ Missing parameters";
}

// Tutup koneksi
$conn->close();
