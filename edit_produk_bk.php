<?php
include_once('koneksi.php');
// Mengambil ID produk dari URL
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Query untuk mendapatkan data produk berdasarkan ID dari database
    $query = "SELECT * FROM produk WHERE id_produk = $id_produk";

    // Eksekusi query dan ambil data produk
    // Gantikan bagian ini dengan kode yang sesuai dengan metode eksekusi query di framework atau library database yang Anda gunakan
    $result = $conn->query($query);
    $produk = $result->fetch_assoc();
}

// Jika ada permintaan untuk menyimpan perubahan produk
if (isset($_POST['simpan_perubahan'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $kategori_produk = $_POST['kategori_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $harga_produk = $_POST['harga_produk'];
    $stok_produk = $_POST['stok_produk'];

    // Periksa apakah ada gambar yang diunggah
    if ($_FILES['gambar_produk']['name']) {
        $gambar_produk = $_FILES['gambar_produk']['name'];
        $tmp_gambar = $_FILES['gambar_produk']['tmp_name'];
        $path = "img/"; // Ganti dengan path folder penyimpanan gambar Anda

        // Pindahkan file gambar ke folder tujuan
        move_uploaded_file($tmp_gambar, $path . $gambar_produk);

        // Query untuk mengupdate data produk beserta gambar
        // Silakan ganti dengan kode query sesuai dengan struktur tabel Anda
        $query = "UPDATE produk SET nama_produk = '$nama_produk', kategori_produk = '$kategori_produk', deskripsi_produk = '$deskripsi_produk', harga_produk = '$harga_produk', stok_produk = '$stok_produk', gambar_produk = '$gambar_produk' WHERE id_produk = $id_produk";
    } else {
        // Query untuk mengupdate data produk tanpa mengubah gambar
        // Silakan ganti dengan kode query sesuai dengan struktur tabel Anda
        $query = "UPDATE produk SET nama_produk = '$nama_produk', kategori_produk = '$kategori_produk', deskripsi_produk = '$deskripsi_produk', harga_produk = '$harga_produk', stok_produk = '$stok_produk' WHERE id_produk = $id_produk";
    }

    // Eksekusi query untuk mengupdate data produk
    // Gantikan bagian ini dengan kode yang sesuai dengan metode eksekusi query di framework atau library database yang Anda gunakan
    $conn->query($query);

    // Redirect ke halaman "produk_kopi_kekinian.php" setelah proses pembaruan selesai
    header("Location: produk_bubuk_kopi.php");
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
    <title>Edit Produk</title>
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
                <div class="container mt-4">
                    <h1 class="mb-4">Edit Produk</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk:</label>
                            <input type="text" name="nama_produk" class="form-control" value="<?php echo $produk['nama_produk']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kategori_produk" class="form-label">Kategori Produk:</label>
                            <select name="kategori_produk" class="form-select" required>
                                <option value="Bubuk Kopi">Bubuk Kopi</option>
                                <option value="Kopi Kekinian">Kopi Kekinian</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_produk" class="form-label">Deskripsi Produk:</label>
                            <textarea name="deskripsi_produk" class="form-control"><?php echo $produk['deskripsi_produk']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk:</label>
                            <input type="text" name="harga_produk" class="form-control" value="<?php echo $produk['harga_produk']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="stok_produk" class="form-label">Stok Produk:</label>
                            <input type="text" name="stok_produk" class="form-control" value="<?php echo $produk['stok_produk']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Gambar Produk:</label>
                            <input type="file" name="gambar_produk" class="form-control">
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <a href="produk_bubuk_kopi.php" class="btn btn-danger me-2">Batalkan</a>
                            <button type="submit" name="simpan_perubahan" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
