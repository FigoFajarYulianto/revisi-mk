<?php
$conn = mysqli_connect("wsjti.com", "u1011496_rudibonsai", "rudibonsai2020", "u1011496_db_rudibonsai");

if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit;
}
