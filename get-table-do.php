 <?php
   include "koneksi.php";

   // Query untuk mengambil data dari tabel sensor_data
    $sql = "SELECT * FROM sensor_data  ORDER BY timestamp DESC"; // Ambil data dissolveOxygen yang tidak null
    $result = $conn->query($sql);
    $no = 1;

    // Jika ada data, tampilkan dalam bentuk tabel
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                                <td>" . $no++ . "</td> 
                                <td>" . $row["dissolveOxygen"] . "</td> 
                                <td>" . $row["timestamp"] . "</td> 
                                </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data available</td></tr>";
    }
    ?>