<?php
$servername = "localhost";   
$username = "aam";         
$password = "aam123";            
$dbname = "aam_shirmp";    
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
