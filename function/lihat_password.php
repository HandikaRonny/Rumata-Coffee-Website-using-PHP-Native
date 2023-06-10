<?php
// Koneksi ke database
include_once('koneksi.php');

// Mengambil username dan email yang dikirimkan dari form
$username = $_POST['username'];
$email = $_POST['email'];

// Mengecek apakah username dan email ada dalam database
$query = "SELECT * FROM pelanggan WHERE username_pelanggan = '$username' AND email_pelanggan = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Username dan email ditemukan, ambil password dari hasil query
    $row = mysqli_fetch_assoc($result);
    $password = $row['password_pelanggan'];

    // Menampilkan password melalui pop-up menggunakan JavaScript
    echo "<script>alert('Password Anda adalah: $password');
    window.location.href = '../login.php';</script>";
} else {
    echo "Username atau email tidak ditemukan dalam database.";
}
