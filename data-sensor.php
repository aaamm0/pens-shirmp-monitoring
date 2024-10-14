<?php

include "koneksi.php";  // Pastikan koneksi benar

// Check if GET request contains all the parameters
if (isset($_GET['temperature']) && isset($_GET['ph']) && isset($_GET['salinity']) && isset($_GET['dissolveOxygen']) && isset($_GET['relay'])) {
    
    // Get the parameters from the request
    $temperature = $_GET['temperature'];
    $ph = $_GET['ph'];
    $salinity = $_GET['salinity'];
    $dissolveOxygen = $_GET['dissolveOxygen'];
    $relay = $_GET['relay'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO sensor_data (temperature, ph, salinity, dissolveOxygen, relay)
            VALUES ('$temperature', '$ph', '$salinity', '$dissolveOxygen', '$relay')";

    // Execute the query and check if it's successful
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
} else {
    echo "Missing parameters";
}

// Close the connection
$conn->close();
?>
