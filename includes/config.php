<?php
session_start();

$host     = "localhost";
$user     = "root";
$password = "";
$database = "swarabuana";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>