<?php

//include koneksi database
include('../koneksi.php');

//get data dari form
$id         = $_POST['id'];
$nama       = $_POST['nama'];
$harga      = $_POST['harga'];
$stok       = $_POST['stok'];
$berat      = $_POST['berat'];
$kategori   = $_POST['kategori'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE produk SET nama = '$nama', harga = '$harga', stok = '$stok', berat = '$berat', kategori = '$kategori' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>