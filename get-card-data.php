<?php
include "koneksi.php";

// Query untuk mengambil data terbaru
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
        "timestamp" => "No Data"
    ];
}

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>

