<?php
$conn = mysqli_connect("localhost", "root", "", "u1011496_db_rudibonsai");

if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit;
}