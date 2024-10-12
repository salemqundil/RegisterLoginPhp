<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=classa", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $alertLogin = "Connected successfully";
} catch(PDOException $e) {
  $alertLogin = "Connection failed: " . $e->getMessage();
}
?>