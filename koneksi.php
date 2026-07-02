<?php
$koneksi = mysqli_connect("localhost", "root", "", "foodorder");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?> 