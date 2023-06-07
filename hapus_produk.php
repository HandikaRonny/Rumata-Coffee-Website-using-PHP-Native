<?php
include_once('koneksi.php');
// Mengambil id_produk dari parameter
$id_produk = $_GET['id_produk'];

// Penghapusan data menggunakan SQL
$sql = "DELETE FROM produk WHERE id_produk = $id_produk";
mysqli_query($conn, $sql);

// Setelah proses penghapusan selesai, arahkan kembali pengguna ke halaman sebelumnya
header("Location: produk_kopi_kekinian.php");
exit();
