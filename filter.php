<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = isset($_POST["startDate"]) ? $_POST["startDate"] : "";
    $endDate = isset($_POST["endDate"]) ? $_POST["endDate"] : "";

    // Jika tanggal tidak diisi, ambil semua data
    if (empty($startDate) || empty($endDate)) {
        $sql = "SELECT * FROM sensor_data ORDER BY timestamp DESC";
    } else {
        // Hindari SQL Injection
        $startDate = mysqli_real_escape_string($conn, $startDate);
        $endDate = mysqli_real_escape_string($conn, $endDate);

        $sql = "SELECT * FROM sensor_data WHERE timestamp BETWEEN '$startDate' AND '$endDate' ORDER BY timestamp DESC";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Temperature</th>
                        <th>pH</th>
                        <th>Salinity</th>
                        <th>Dissolved Oxygen</th>
                        <th>Start Date</th>
                        <th>Aerator1</th>
                        <th>Aerator2</th>
                    </tr>
                </thead>
                <tbody>';
        $no = 1;
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
        echo '</tbody></table>';
    } else {
        echo "<p class='text-center text-danger'>No data found.</p>";
    }
}
