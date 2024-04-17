<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "car_showroom(2)";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
