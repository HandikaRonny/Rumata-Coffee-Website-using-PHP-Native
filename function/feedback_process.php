<?php
session_start(); // Pastikan Anda telah memulai sesi sebelum mengakses data pelanggan yang sedang login

include_once('koneksi.php');

// Mendapatkan data dari form
$subject = $_POST['subject'];
$isi_masukan = $_POST['isi_masukan'];

// Mendapatkan tanggal saat ini
$tgl_post = date('Y-m-d');

// Mendapatkan ID pelanggan yang sedang login
if (isset($_SESSION['is_logged_in'])) {
    $id_admin = $_SESSION['id_admin'];
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $nama_pelanggan = $_SESSION['nama_pelanggan'];
    $email_pelanggan = $_SESSION['email_pelanggan'];
} else {
    echo "<script>
        alert('Silahkan login terlebih dahulu!');
        window.location.href = '../feedback.php';
    </script>";
}

// Menyimpan data ke database
$sql = "INSERT INTO masukan (nama, email, subject, isi_masukan, tgl_post, kondisi, id_admin, id_pelanggan) VALUES ('$nama_pelanggan', '$email_pelanggan', '$subject', '$isi_masukan', '$tgl_post', 'Hide', '$id_admin', '$id_pelanggan')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Masukan berhasil dikirim. Terima kasih telah memberikan masukan!');
        window.location.href = '../feedback.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
