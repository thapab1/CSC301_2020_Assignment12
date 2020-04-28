<?php
// I used MAMP, so the connection string is different
$conn = mysqli_connect("localhost:8082","root","root","roomsforrent");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>