<?php 

// Deklarasi variabel
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "penjualan";

// Membuat Koneksi
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Cek koneksi
if (!$connection) {
    die("Koneksi Gagal! : " . mysqli_connect_error());
}

?>
