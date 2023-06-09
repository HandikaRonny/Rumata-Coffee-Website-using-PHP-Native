<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tambah Produk</title>
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
                <div class="container">
                    <h2 class="mt-4">Tambah Produk Baru</h2>
                    <form action="tambah_produk_proses_bk.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk:</label>
                            <input type="text" name="nama_produk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori_produk" class="form-label">Kategori Produk:</label>
                            <select name="kategori_produk" class="form-select" required>
                                <option value="">Pilih kategori</option>
                                <option value="Kopi Kekinian">Kopi Kekinian</option>
                                <option value="Bubuk Kopi">Bubuk Kopi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_produk" class="form-label">Deskripsi Produk:</label>
                            <textarea name="deskripsi_produk" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk:</label>
                            <input type="number" name="harga_produk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok_produk" class="form-label">Stok Produk:</label>
                            <input type="number" name="stok_produk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Gambar Produk:</label>
                            <input type="file" name="gambar_produk" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <a href="produk_bubuk_kopi.php" class="btn btn-danger me-2">Batalkan</a>
                            <button type="submit" class="btn btn-success">Tambah Produk +</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
