<?php

// Include koneksi database
include('../koneksi.php');

// Get data dari form
$nama       = $_POST['nama'];
$harga      = $_POST['harga'];
$stok       = $_POST['stok'];
$berat      = $_POST['berat'];
$id_supplier      = $_POST['id_supplier'];
$kategori      = $_POST['kategori'];

// Query insert data ke dalam database
$query = "INSERT INTO produk (id_supplier, nama, harga, stok, berat, kategori) 
VALUES ('$id_supplier', '$nama', '$harga', '$stok', '$berat', '$kategori')";

// Kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($connection->query($query)) {
    // Redirect ke halaman index.php 
    header("location: index.php");
} else {
    // Pesan error gagal insert data
    echo "Data Gagal Disimpan! Error: " . $connection->error;
}

?>
