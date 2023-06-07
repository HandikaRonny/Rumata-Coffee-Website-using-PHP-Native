<?php
session_start();
include_once('koneksi.php');
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

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-1 py-lg-0">
        <a href="index.php" class="navbar-brand ms-5">
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
                    echo ('<a href="administrator.php" class="nav-item nav-link">Admin</a><br>');
                } else {
                    echo ('<a href="login.php" class="nav-item nav-link">Login</a><br>');
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
        <div class="carousel-inner py-3">
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
    <div class="container-fluid about py-5">
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
                        <div class="row g-3">
                            <?php
                            while ($row = $result_set_kk->fetch_assoc()) {
                                echo ('<div class="col-lg-6">');
                                echo ('<div class="d-flex h-100">');
                                echo ('<div class="flex-shrink-0">');
                                echo ('<img class="img-fluid" src="img/' . $row['gambar_produk'] . '" alt="" style="width: 150px; height: 185px;">');
                                echo ('<h4 class="bg-dark text-primary py-1">Rp.' . number_format($row['harga_produk'], 0, ',', '.') . ',00</h4>');
                                echo ('</div>');
                                echo ('<div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4">');
                                echo ('<h5 class="">' . $row['nama_produk'] . '</h5>');
                                echo ('<span>' . $row['deskripsi_produk'] . '</span>');
                                echo ('<div class="d-flex justify-content-lg-start pt-5">');
                                echo ('<a href="https://api.whatsapp.com/send?phone=6282294880042&text=*Silahkan%20isi%20form%20pesanan%20Anda:%0A%0AHalo,%20saya%20ingin%20memesan%20produk%20Rumata%20Coffee.%0ANama%20produk%20:%0AJumlah%20pesanan%20:" class="btn btn-dark border-inner py-3 px-4">Beli Sekarang</a>');
                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                            }
                            ?>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-3">
                            <?php
                            while ($row = $result_set_bk->fetch_assoc()) {
                                echo ('<div class="col-lg-6">');
                                echo ('<div class="d-flex h-100">');
                                echo ('<div class="flex-shrink-0">');
                                echo ('<img class="img-fluid" src="img/' . $row['gambar_produk'] . '" alt="" style="width: 150px; height: 185px;">');
                                echo ('<h4 class="bg-dark text-primary py-1">Rp.' . number_format($row['harga_produk'], 0, ',', '.') . ',00</h4>');
                                echo ('</div>');
                                echo ('<div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4">');
                                echo ('<h5 class="">' . $row['nama_produk'] . '</h5>');
                                echo ('<span>' . $row['deskripsi_produk'] . '</span>');
                                echo ('<div class="d-flex justify-content-lg-start pt-5">');
                                echo ('<a href="https://api.whatsapp.com/send?phone=6282294880042&text=*Silahkan%20isi%20form%20pesanan%20Anda:%0A%0AHalo,%20saya%20ingin%20memesan%20produk%20Rumata%20Coffee.%0ANama%20produk%20:%0AJumlah%20pesanan%20:" class="btn btn-dark border-inner py-3 px-4">Beli Sekarang</a>');
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
    <div class="container-fluid bg-img text-secondary" style="margin-top: 90px">
    <div class="container">
      <div class="row gx-5">
        <div class="col-lg-4 col-md-6 mb-lg-n5 my-3">
          <h4 class="text-primary text-uppercase">Quick Links</h4>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-secondary mb-2" href="home.php"><i class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
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