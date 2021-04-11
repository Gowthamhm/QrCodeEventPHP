<?php
 // $servername = "localhost";
 // $username = "u514971509_root";
 // $password = "Gowthamhm001@";
 // $dbname="u514971509_qrcode";

$servername ="localhost";
$username ="root";
$password ="";
$dbname ="qrcode";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
// echo "Connected successfully";
}
?>
