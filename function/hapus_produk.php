<?php
include_once('koneksi.php');
// Mengambil id_produk dari parameter
$id_produk = $_GET['id_produk'];

// Penghapusan data menggunakan SQL
$sql = "DELETE FROM produk WHERE id_produk = $id_produk";
mysqli_query($conn, $sql);

// Mendapatkan halaman referer (halaman sebelumnya)
$referer = $_SERVER['HTTP_REFERER'];

// Mengecek apakah halaman referer adalah produk_kopi_kekinian.php
if (strpos($referer, 'produk_kopi_kekinian.php') !== false) {
    // Jika halaman referer adalah produk_kopi_kekinian.php, arahkan kembali pengguna ke halaman tersebut
    header("Location: ../administrator/produk_kopi_kekinian.php");
} elseif (strpos($referer, '../administrator/produk_bubuk_kopi.php') !== false) {
    // Jika halaman referer adalah produk_bubuk_kopi.php, arahkan kembali pengguna ke halaman tersebut
    header("Location: ../administrator/produk_bubuk_kopi.php");
} else {
    // Jika halaman referer tidak ditemukan, arahkan pengguna ke halaman produk_kopi_kekinian.php secara default
    header("Location: ../administrator/produk_kopi_kekinian.php");
}

exit();
