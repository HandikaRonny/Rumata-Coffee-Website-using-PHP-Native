<?php
session_start();
include_once('koneksi.php');

// Mendapatkan ID admin yang sedang login
if (isset($_SESSION['is_logged_in'])) {
    $id_admin = $_SESSION['id_admin'];
} else {
    echo "<script>
        alert('Silahkan login terlebih dahulu!');
        window.location.href = '../feedback.php';
    </script>";
}

// Mendapatkan data dari form
$nama_produk = $_POST['nama_produk'];
$kategori_produk = $_POST['kategori_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];
$harga_produk = $_POST['harga_produk'];
$berat_produk = $_POST['berat_produk'];
$stok_produk = $_POST['stok_produk'];
$gambar_produk = $_FILES['gambar_produk']['name'];

// Upload gambar produk
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES['gambar_produk']['name']);
move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file);

// Menyimpan data ke database
$query = "INSERT INTO produk (nama_produk, kategori_produk, deskripsi_produk, harga_produk, berat_produk, stok_produk, gambar_produk, id_admin) VALUES ('$nama_produk', '$kategori_produk', '$deskripsi_produk', '$harga_produk', '$berat_produk', '$stok_produk', '$gambar_produk', '$id_admin')";
if (mysqli_query($conn, $query)) {
    header('Location: ../administrator/produk_bubuk_kopi.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi database
mysqli_close($conn);
