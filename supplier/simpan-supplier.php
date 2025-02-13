<?php

// Include koneksi database
include('../koneksi.php');

// Get data dari form
$nama         = $_POST['nama'];
$alamat       = $_POST['alamat'];
$kontak       = $_POST['kontak'];
$email = $_POST['email'];

// Query insert data ke dalam database
$query = "INSERT INTO supplier (nama, alamat, kontak, email) 
VALUES ('$nama', '$alamat', '$kontak', '$email')";

// Kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($connection->query($query)) {
    // Redirect ke halaman index.php 
    header("location: index.php");
} else {
    // Pesan error gagal insert data
    echo "Data Gagal Disimpan! Error: " . $connection->error;
}

?>
