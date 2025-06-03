<?php
include "koneksi.php";

$sql = "SELECT * FROM sensor_data ORDER BY timestamp DESC LIMIT 20";
$result = $conn->query($sql);
$no = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row["temperature"] . "</td>
                <td>" . $row["ph"] . "</td>
                <td>" . $row["salinity"] . "</td>
                <td>" . $row["dissolveOxygen"] . "</td>
                <td>" . $row["timestamp"] . "</td>
                <td>" . $row["aerator1"] . "</td>
                <td>" . $row["aerator2"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No data available</td></tr>";
}
?>
