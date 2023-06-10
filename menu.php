<?php
session_start();
include_once('function/koneksi.php');
$query_kk = 'SELECT * FROM produk WHERE kategori_produk = "Kopi Kekinian"';
$query_bk = 'SELECT * FROM produk WHERE kategori_produk = "Bubuk Kopi"';
$result_set_kk = $conn->query($query_kk);
$result_set_bk = $conn->query($query_bk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Produk - Rumata Coffee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script>
        function showLoginPopup() {
            alert("Silahkan Login terlebih dahulu");
            // Anda dapat menambahkan kode lain di sini untuk menampilkan pop-up login yang sesuai
        }
    </script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-1 py-lg-0">
        <a href="index.php" class="navbar-brand ms-3">
            <img src="img/Logo.jpeg" alt="Rumata Coffee" class="nav-img" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-1">
                <a href="index.php" class="nav-item nav-link">Beranda</a>
                <a href="menu.php" class="nav-item nav-link active">Produk</a>
                <a href="about.php" class="nav-item nav-link">Tentang Kami</a>
                <a href="feedback.php" class="nav-item nav-link">Masukan</a>
                <?php
                if (isset($_SESSION['is_logged_in'])) {
                    if ($_SESSION['is_logged_in'] == 'pelanggan') {
                        echo ('<a href="function/logout.php" class="nav-item nav-link">Logout</a>');
                    } elseif ($_SESSION['is_logged_in'] == 'admin_rc') {
                        echo ('<a href="administrator/administrator.php" class="nav-item nav-link">Admin</a>');
                    }
                } else {
                    echo ('<a href="login.php" class="nav-item nav-link">Login</a>');
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Produk -->
    <div style="background: #c3c4c4;">
        <div id="demo" class="container carousel slide" data-bs-ride="carousel" style="max-width: 650px; margin: 0 auto;">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner py-1">
                <div class="carousel-item active">
                    <img src="img/1.png" alt="Rumata Coffee" class="d-block w-100 img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="img/2.png" alt="Rumata Coffee" class="d-block w-100 img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="img/3.png" alt="Rumata Coffee" class="d-block w-100 img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="img/4.png" alt="Rumata Coffee" class="d-block w-100 img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="img/5.png" alt="Rumata Coffee" class="d-block w-100 img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="img/6.png" alt="Rumata Coffee" class="d-block w-100 img-fluid">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Products Start -->
    <div class="container-fluid about py-4">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Produk & Harga</h2>
                <h1 class="display-4 text-uppercase">Jelajahi Kopi Kami</h1>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">
                    <li class="nav-item">
                        <a class="nav-link text-white active" data-bs-toggle="pill" href="#tab-1">Kopi Kekinian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-2">Bubuk Kopi</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row row-cols-1 row-cols-md-2 g-2">
                            <?php
                            while ($row = $result_set_kk->fetch_assoc()) {
                                echo ('<div class="col">');
                                echo ('<div class="card h-100 d-flex flex-row">');
                                echo ('<div class="flex-shrink-0">');
                                echo ('<img src="img/' . $row['gambar_produk'] . '" class="card-img img-fluid" alt="Produk 1" style="height: 300px; width: 200px;">');
                                echo ('</div>');
                                echo ('<div class="card-body text-start text-dark d-flex flex-column" style="background: url();font-size: 14px;">');
                                echo ('<h5 class="card-title">' . $row['nama_produk'] . '</h5>');
                                echo ('<p class="card-text">' . $row['deskripsi_produk'] . '</p>');
                                echo ('<div class="mt-auto">');
                                echo ('<p class="card-text my-1">Berat satuan: ' . $row['berat_produk'] . ' gram</p>');
                                echo ('<p class="card-text my-1">Stok: ' . $row['stok_produk'] . '</p>');
                                echo ('<h6 class="card-text my-1">Harga: Rp.' . number_format($row['harga_produk'], 0, ',', '.') . ',-</h6>');
                                // Pengecekan apakah pengguna sudah login
                                if (isset($_SESSION['is_logged_in'])) {
                                    echo ('<a href="https://api.whatsapp.com/send?phone=6281376127992&text=*Silahkan%20isi%20form%20pesanan%20Anda:%0A%0AHalo,%20saya%20ingin%20memesan%20produk%20Rumata%20Coffee.%0ANama%20produk%20:%0AJumlah%20pesanan%20:%0AAlamat%20tujuan:" class="btn btn-dark border-inner py-3 px-3">Beli Sekarang</a>');
                                } else {
                                    echo ('<button class="btn btn-dark border-inner py-3 px-3" onclick="showLoginPopup()">Beli Sekarang</button>');
                                }
                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                            }
                            ?>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <?php
                            while ($row = $result_set_bk->fetch_assoc()) {
                                echo ('<div class="col">');
                                echo ('<div class="card h-100 d-flex flex-row">');
                                echo ('<div class="flex-shrink-0">');
                                echo ('<img src="img/' . $row['gambar_produk'] . '" class="card-img img-fluid" alt="Produk 1" style="height: 300px; width: 200px;">');
                                echo ('</div>');
                                echo ('<div class="card-body text-start text-dark d-flex flex-column" style="background: url();font-size: 14px;">');
                                echo ('<h5 class="card-title">' . $row['nama_produk'] . '</h5>');
                                echo ('<p class="card-text">' . $row['deskripsi_produk'] . '</p>');
                                echo ('<div class="mt-auto">');
                                echo ('<p class="card-text my-1">Berat satuan: </p>');
                                echo ('<p class="card-text my-1">Stok: ' . $row['stok_produk'] . '</p>');
                                echo ('<h6 class="card-text my-1">Harga: Rp.' . number_format($row['harga_produk'], 0, ',', '.') . ',-</h6>');
                                // Pengecekan apakah pengguna sudah login
                                if (isset($_SESSION['is_logged_in'])) {
                                    echo ('<a href="https://api.whatsapp.com/send?phone=6281376127992&text=*Silahkan%20isi%20form%20pesanan%20Anda:%0A%0AHalo,%20saya%20ingin%20memesan%20produk%20Rumata%20Coffee.%0ANama%20produk%20:%0AJumlah%20pesanan%20:%0AAlamat%20tujuan:" class="btn btn-dark border-inner py-3 px-3">Beli Sekarang</a>');
                                } else {
                                    echo ('<button class="btn btn-dark border-inner py-3 px-3" onclick="showLoginPopup()">Beli Sekarang</button>');
                                }
                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-img text-secondary mt-1">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 mb-lg-n5 my-3">
                    <h4 class="text-primary text-uppercase">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
                        <a class="text-secondary mb-2" href="menu.php"><i class="bi bi-arrow-right text-primary me-2"></i>Produk</a>
                        <a class="text-secondary mb-2" href="about.php"><i class="bi bi-arrow-right text-primary me-2"></i>Tentang kami</a>
                        <a class="text-secondary" href="feedback.php"><i class="bi bi-arrow-right text-primary me-2"></i>Masukan</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-3">
                    <h4 class="text-primary text-uppercase">Hubungi Kami</h4>
                    <div class="d-flex mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        <p class="mb-0">Jl. Partahan Bosi No.kel, Ps. Laguboti, Kec. Laguboti, Toba, Sumatera Utara 22381</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>
                        <p class="mb-0">rumatacoffee05@gmail.com</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-telephone text-primary me-2"></i>
                        <p class="mb-0">+62 813-7612-7992</p>
                    </div>
                </div>
                <div class="d-flex col-lg-4 col-md-6 my-3 justify-content-center">
                    <div class="d-flex mt-4 p-lg-5">
                        <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="https://instagram.com/rumatacoffee.id?igshid=MzRlODBiNWFlZA=="><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="https://www.facebook.com/rumatacoffee/?mibextid=ZbWKwL"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="https://wa.me//6281376127992"><i class="fab fa-whatsapp fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-secondary py-2" style="background: #111111">
        <div class="container text-center">
            <p class="">
                Copyright &copy; 2023
                All
                Rights Reserved. By Rumata Coffee
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>