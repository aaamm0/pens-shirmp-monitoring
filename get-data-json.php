<?php
header('Content-Type: application/json');
include "koneksi.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Koneksi database gagal"]);
    exit;
}

// Query ambil data terakhir
$sql = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    $data = [
        "temperature" => "0",
        "ph" => "0",
        "salinity" => "0",
        "dissolveOxygen" => "0",
        "aerator1" => "0",
        "aerator2" => "0",
        "timestamp" => "0"
    ];
}

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
