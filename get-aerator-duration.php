<?php
include "koneksi.php";

$durations = [
    'aerator1' => 0,
    'aerator2' => 0
];

// Ambil data 3 jam terakhir
$sql = "SELECT aerator1, aerator2, timestamp FROM sensor_data WHERE timestamp >= NOW() - INTERVAL 3 HOUR ORDER BY timestamp ASC";
$result = $conn->query($sql);

$prev = null;

while ($row = $result->fetch_assoc()) {
    if ($prev !== null) {
        $interval = strtotime($row['timestamp']) - strtotime($prev['timestamp']);
        if ($prev['aerator1'] == 1) {
            $durations['aerator1'] += $interval;
        }
        if ($prev['aerator2'] == 1) {
            $durations['aerator2'] += $interval;
        }
    }
    $prev = $row;
}

$conn->close();

function formatDuration($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $seconds = $seconds % 60;
    return sprintf('%02dh %02dm %02ds', $hours, $minutes, $seconds);
}

echo json_encode([
    'aerator1_duration' => formatDuration($durations['aerator1']),
    'aerator2_duration' => formatDuration($durations['aerator2'])
]);
