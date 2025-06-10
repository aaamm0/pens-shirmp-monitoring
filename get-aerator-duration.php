<?php
include "koneksi.php";

// Fungsi konversi detik ke format waktu
function formatDuration($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $seconds = $seconds % 60;
    return sprintf('%02dh %02dm %02ds', $hours, $minutes, $seconds);
}

// Ambil satu baris terakhir
$sql = "SELECT aerator1_duration, aerator2_duration, timestamp 
        FROM sensor_data 
        ORDER BY timestamp DESC 
        LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Konversi string durasi ke integer (jika disimpan sebagai string angka detik)
    $aerator1_sec = (int)$row['aerator1_duration'];
    $aerator2_sec = (int)$row['aerator2_duration'];

    echo json_encode([
        'aerator1_duration' => formatDuration($aerator1_sec),
        'aerator2_duration' => formatDuration($aerator2_sec)
    ]);
} else {
    echo json_encode([
        'message' => '❌ Tidak ada data ditemukan.'
    ]);
}

$conn->close();
?>
