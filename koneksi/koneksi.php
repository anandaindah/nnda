<?php

$host = 'localhost';
$username = 'root';
$password = "";
$database ='kasirnanda';

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}
?>