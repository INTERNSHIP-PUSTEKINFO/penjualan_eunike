<?php

//include koneksi database
include('../koneksi.php');

//get data dari form
$id = $_POST['id'];
$nama         = $_POST['nama'];
$alamat       = $_POST['alamat'];
$kontak       = $_POST['kontak'];
$email = $_POST['email'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE supplier SET nama = '$nama', alamat = '$alamat', kontak = '$kontak', email = '$email' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>