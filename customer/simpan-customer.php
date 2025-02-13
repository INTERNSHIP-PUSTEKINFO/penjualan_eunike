<?php

// Include koneksi database
include('../koneksi.php');

$nama         = $_POST['nama'];
$alamat       = $_POST['alamat'];
$kontak       = $_POST['kontak'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$query = "INSERT INTO customer (nama, alamat, kontak, jenis_kelamin) 
VALUES ('$nama', '$alamat', '$kontak', '$jenis_kelamin')";

if ($connection->query($query)) {
    
    header("location: index.php");
} else {
    
    echo "Data Gagal Disimpan! Error: " . $connection->error;
}

?>
