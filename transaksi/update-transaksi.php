<?php

//include koneksi database
include('../koneksi.php');

//get data dari form
$id         = $_POST['id'];
$tanggal       = $_POST['tanggal'];
$id_customer      = $_POST['id_customer'];
$id_produk       = $_POST['id_produk'];
$jumlah      = $_POST['jumlah'];
$total_harga      = $_POST['total_harga'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE transaksi SET tanggal = '$tanggal', id_customer = '$id_customer', id_produk = '$id_produk', jumlah = '$jumlah', total_harga = '$total_harga' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>