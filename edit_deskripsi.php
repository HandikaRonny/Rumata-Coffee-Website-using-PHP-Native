<?php
include_once('koneksi.php');
// Mengambil ID deskripsi dari URL
if (isset($_GET['id_deskripsi'])) {
    $id_deskripsi = $_GET['id_deskripsi'];

    // Query untuk mendapatkan data deskripsi berdasarkan ID dari database
    $query = "SELECT * FROM deskripsi WHERE id_deskripsi = $id_deskripsi";

    // Eksekusi query dan ambil data deskripsi
    // Gantikan bagian ini dengan kode yang sesuai dengan metode eksekusi query di framework atau library database yang Anda gunakan
    $result = $conn->query($query);
    $deskripsi = $result->fetch_assoc();
}

// Jika ada permintaan untuk menyimpan perubahan deskripsi
if (isset($_POST['simpan_perubahan'])) {
    $id_deskripsi = $_POST['id_deskripsi'];
    $judul_deskripsi = $_POST['judul_deskripsi'];
    $isi_deskripsi = $_POST['isi_deskripsi'];

    // Periksa apakah ada gambar yang diunggah
    if ($_FILES['gambar_deskripsi']['name']) {
        $gambar_deskripsi = $_FILES['gambar_deskripsi']['name'];
        $tmp_gambar = $_FILES['gambar_deskripsi']['tmp_name'];
        $path = "img/"; // Ganti dengan path folder penyimpanan gambar Anda

        // Pindahkan file gambar ke folder tujuan
        move_uploaded_file($tmp_gambar, $path . $gambar_deskripsi);

        // Query untuk mengupdate data deskripsi beserta gambar
        // Silakan ganti dengan kode query sesuai dengan struktur tabel Anda
        $query = "UPDATE deskripsi SET judul_deskripsi = '$judul_deskripsi', isi_deskripsi = '$isi_deskripsi', gambar_deskripsi = '$gambar_deskripsi' WHERE id_deskripsi = $id_deskripsi";
    } else {
        // Query untuk mengupdate data deskripsi tanpa mengubah gambar
        // Silakan ganti dengan kode query sesuai dengan struktur tabel Anda
        $query = "UPDATE deskripsi SET judul_deskripsi = '$judul_deskripsi', isi_deskripsi = '$isi_deskripsi' WHERE id_deskripsi = $id_deskripsi";
    }

    // Eksekusi query untuk mengupdate data deskripsi
    // Gantikan bagian ini dengan kode yang sesuai dengan metode eksekusi query di framework atau library database yang Anda gunakan
    $conn->query($query);

    // Redirect ke halaman "deskripsi.php" setelah proses pembaruan selesai
    header("Location: deskripsi.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Deskripsi</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/administrator.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="administrator.php">Rumata Coffee</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <?php
                    if (isset($_SESSION['is_logged_in'])) {
                        echo ('<li><a href="logout.php" class="dropdown-item">Logout</a></li>');
                    } else {
                        echo ('<li><a href="login.php" class="dropdown-item">Login</a></li>');
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <!-- SideNav Start -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="administrator.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="deskripsi.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            Deskripsi
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduk" aria-expanded="false" aria-controls="collapseProduk">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-columns"></i>
                            </div>
                            Tabel Produk
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseProduk" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="produk_kopi_kekinian.php">Kopi Kekinian</a>
                                <a class="nav-link" href="produk_bubuk_kopi.php">Bubuk Kopi</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="masukan.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            Masukan
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Log in sebagai:</div>
                    <?php
                    if (isset($_SESSION['is_logged_in'])) {
                        echo $_SESSION['nama_adm'];
                    } else {
                        echo "Pengguna";
                    }
                    ?>
                </div>
            </nav>
        </div>
        <!-- SideNav End -->
        <div id="layoutSidenav_content">
            <main>
        </div>
        <div class="container mt-5">
            <h1 class="my-4">Edit Deskripsi</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_deskripsi" value="<?php echo $deskripsi['id_deskripsi']; ?>">
                <div class="mb-3">
                    <label for="judul_deskripsi" class="form-label">Judul Deskripsi:</label>
                    <input type="text" name="judul_deskripsi" class="form-control" value="<?php echo $deskripsi['judul_deskripsi']; ?>">
                </div>
                <div class="mb-3">
                    <label for="isi_deskripsi" class="form-label">Isi Deskripsi:</label>
                    <textarea name="isi_deskripsi" class="form-control"><?php echo $deskripsi['isi_deskripsi']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar_deskripsi" class="form-label">Gambar Deskripsi:</label>
                    <input type="file" name="gambar_deskripsi" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="deskripsi.php" class="btn btn-danger me-2">Batalkan</a>
                    <button type="submit" name="simpan_perubahan" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    </main>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
