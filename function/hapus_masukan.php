<?php
include_once('koneksi.php');
// Mengambil id_produk dari parameter
$id_masukan = $_GET['id_masukan'];

// Penghapusan data menggunakan SQL
$sql = "DELETE FROM masukan WHERE id_masukan = $id_masukan";
mysqli_query($conn, $sql);

// Setelah proses penghapusan selesai, arahkan kembali pengguna ke halaman sebelumnya
header("Location: ../administrator/masukan.php");
exit();
