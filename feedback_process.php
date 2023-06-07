<?php
include_once('koneksi.php');

// Mendapatkan data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$isi_masukan = $_POST['isi_masukan'];

// Mendapatkan tanggal saat ini
$tgl_post = date('Y-m-d');


// Menyimpan data ke database
$sql = "INSERT INTO masukan (nama, email, subject, isi_masukan, tgl_post, kondisi, id_admin) VALUES ('$nama', '$email', '$subject', '$isi_masukan', '$tgl_post', 'Hide', '1')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Masukan berhasil dikirim. Terima kasih telah memberikan masukan!');
        window.location.href = 'feedback.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
