<?php
include "koneksi.php";

// Query untuk mengambil data
$sql = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 10"; // Ambil 10 data terbaru
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
