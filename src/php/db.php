<?php
$host = "localhost";
$port = "5432";
$dbname = "desapp";
$user = "postgres";
$password = "12345678"; // ganti dengan password kamu

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
}
?>