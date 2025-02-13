<?php

// Include koneksi database
include('../koneksi.php');

// Get data dari form
$tanggal       = $_POST['tanggal'];
$id_customer      = $_POST['id_customer'];
$id_produk       = $_POST['id_produk'];
$jumlah      = $_POST['jumlah'];
$total_harga      = $_POST['total_harga'];

// Query insert data ke dalam database
$query = "INSERT INTO transaksi (tanggal, id_customer, id_produk, jumlah, total_harga) 
VALUES ('$tanggal', '$id_customer', '$id_produk', '$jumlah', '$total_harga')";

// Kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($connection->query($query)) {
    // Redirect ke halaman index.php 
    header("location: index.php");
} else {
    // Pesan error gagal insert data
    echo "Data Gagal Disimpan! Error: " . $connection->error;
}

?>
