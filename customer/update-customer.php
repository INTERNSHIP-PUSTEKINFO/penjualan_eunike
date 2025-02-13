<?php

//include koneksi database
include('../koneksi.php');

//get data dari form
$id = $_POST['id'];
$nama         = $_POST['nama'];
$alamat       = $_POST['alamat'];
$kontak       = $_POST['kontak'];
$jenis_kelamin = $_POST['jenis_kelamin'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE customer SET nama = '$nama', alamat = '$alamat', kontak = '$kontak', jenis_kelamin = '$jenis_kelamin' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>