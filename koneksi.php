<?php
// Koneksi ke database
$host           = "localhost";
$username       = "root";
$password       = "";
$namadatabase   = "webgis";
$conn           = mysqli_connect($host, $username, $password);




// Aktifkan database
mysqli_select_db($conn, $namadatabase);
?>
