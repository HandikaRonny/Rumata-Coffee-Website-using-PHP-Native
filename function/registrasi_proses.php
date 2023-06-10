<?php
include_once('koneksi.php');

// Mendapatkan data dari form
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$no_telp_pelanggan = $_POST['no_telp_pelanggan'];
$email_pelanggan = $_POST['email_pelanggan'];
$username_pelanggan = $_POST['username_pelanggan'];
$password_pelanggan = $_POST['password_pelanggan'];

// Cek apakah no_telp_pelanggan sudah digunakan
$query = "SELECT * FROM pelanggan WHERE no_telp_pelanggan = '$no_telp_pelanggan'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<script>
            alert('Nomor telepon sudah digunakan. Silahkan gunakan nomor telepon yang lain.');
            window.location.href = '../registrasi.php';
          </script>";
    exit;
}

// Cek apakah email_pelanggan sudah digunakan
$query = "SELECT * FROM pelanggan WHERE email_pelanggan = '$email_pelanggan'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<script>
            alert('Email sudah digunakan. Silahkan gunakan email yang lain.');
            window.location.href = '../registrasi.php';
          </script>";
    exit;
}

// Cek apakah username_pelanggan sudah digunakan
$query = "SELECT * FROM pelanggan WHERE username_pelanggan = '$username_pelanggan'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<script>
            alert('Username sudah digunakan. Silahkan gunakan username yang lain.');
            window.location.href = '../registrasi.php';
          </script>";
    exit;
}

// Menyimpan data ke database
$query = "INSERT INTO pelanggan (nama_pelanggan, alamat_pelanggan, no_telp_pelanggan, email_pelanggan, username_pelanggan, password_pelanggan) VALUES ('$nama_pelanggan', '$alamat_pelanggan', '$no_telp_pelanggan', '$email_pelanggan', '$username_pelanggan', '$password_pelanggan')";
if (mysqli_query($conn, $query)) {
    echo "<script>
            alert('Akun berhasil diregistrasi. Silahkan login.');
            window.location.href = '../login.php';
        </script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi database
mysqli_close($conn);
