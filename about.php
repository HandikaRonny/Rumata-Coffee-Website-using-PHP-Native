<?php
session_start();
include_once('function/koneksi.php');

$id_deskripsi1 = "2";
$deskripsi1 = "SELECT * FROM deskripsi WHERE id_deskripsi = '$id_deskripsi1'";
$result_deskripsi1 = $conn->query($deskripsi1);
$row1 = $result_deskripsi1->fetch_assoc();

$id_deskripsi2 = "3";
$deskripsi2 = "SELECT * FROM deskripsi WHERE id_deskripsi = '$id_deskripsi2'";
$result_deskripsi2 = $conn->query($deskripsi2);
$row2 = $result_deskripsi2->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tetang Kami - Rumata Coffee</title>
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

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                <a href="menu.php" class="nav-item nav-link">Produk</a>
                <a href="about.php" class="nav-item nav-link  active">Tentang Kami</a>
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

    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 500px;" data-aos="fade-up">
                <h2 class="text-primary font-secondary">Tentang Kami</h2>
                <h1 class="display-4 text-uppercase">Selamat datang di Rumata Coffee</h1>
            </div>
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="min-height: 400px;" data-aos="fade-up">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/<?php echo $row1['gambar_deskripsi']; ?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pb-5" data-aos="fade-down">
                    <h4 class="mb-4"><?php echo $row1['judul_deskripsi']; ?></h4>
                    <p class="mb-5"><?php echo $row1['isi_deskripsi']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 pb-5" data-aos="fade-down">
                    <h4 class="mb-4"><?php echo $row2['judul_deskripsi']; ?></h4>
                    <p class="mb-5"><?php echo $row2['isi_deskripsi']; ?></p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0" style="min-height: 400px;" data-aos="fade-up">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/<?php echo $row2['gambar_deskripsi']; ?>" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-img ps-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 my-1 mb-lg-0" style="min-height: 400px;" data-aos="fade-up">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.4525828579476!2d99.12252647365543!3d2.3535949575304707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e01c215005083%3A0x65462cae6d9950f!2sRumata%20Coffee!5e0!3m2!1sid!2sid!4v1686060995033!5m2!1sid!2sid" width="100%" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 mt-5" data-aos="fade-down">
                    <h4 class="mb-4 text-white">Temukan Kami:</h4>
                    <p class="mb-5 text-white">Lokasi Rumata Coffee berada di Jalan Partahan Bosi, Kecamatan Laguboti, Kabupaten Toba, Sumatera Utara dengan Kode Pos 22381</p>
                    <div class="d-flex mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        <p class="mb-0 text-white">Jl. Partahan Bosi No.kel, Ps. Laguboti, Kec. Laguboti, Toba, Sumatera Utara 22381</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>
                        <p class="mb-0 text-white">rumatacoffee05@gmail.com</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-telephone text-primary me-2"></i>
                        <p class="mb-0 text-white">+62 813-7612-7992</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

    <!-- JS AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Javascript -->
    <script src="js/main.js"></script>

</body>

</html>