<?php
include "koneksi.php";

// Query untuk mengambil data terakhir (10 data terakhir)
$sql = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 20";

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'temperature' => $row["temperature"],
            'ph' => $row["ph"],
            'salinity' => $row["salinity"],
            'dissolveOxygen' => $row["dissolveOxygen"],
            'timestamp' => $row["timestamp"]
        ];
    }
} else {
    $data = [];
}

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
