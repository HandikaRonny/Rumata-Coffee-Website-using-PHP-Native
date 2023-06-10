<?php
include_once('koneksi.php');
// Mendapatkan nilai id_masukan dari form
$id_masukan = $_POST['id_masukan'];

// Periksa tombol yang ditekan
if (isset($_POST['tampilkan'])) {
    // Update kolom "kondisi" menjadi "Show" berdasarkan id_masukan
    $query = "UPDATE masukan SET kondisi = 'Show' WHERE id_masukan = $id_masukan";
    if ($conn->query($query) === TRUE) {
        header('Location: ../administrator/masukan.php');
    } else {
        echo "Error: " . $conn->error;
    }
} elseif (isset($_POST['sembunyikan'])) {
    // Update kolom "kondisi" menjadi "Hide" berdasarkan id_masukan
    $query = "UPDATE masukan SET kondisi = 'Hide' WHERE id_masukan = $id_masukan";
    if ($conn->query($query) === TRUE) {
        header('Location: ../administrator/masukan.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
