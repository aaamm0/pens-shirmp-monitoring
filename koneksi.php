<?php
$servername = "localhost";   
$username = "aam123";         
$password = "aam";            
$dbname = "aam_shirmp";    
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
