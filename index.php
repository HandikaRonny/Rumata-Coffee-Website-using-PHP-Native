<?php
session_start();
include_once('function/koneksi.php');

$id_deskripsi = 1;
$deskripsi = "SELECT * FROM deskripsi WHERE id_deskripsi = $id_deskripsi";
$result_deskripsi = $conn->query($deskripsi);
$row = $result_deskripsi->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Beranda - Rumata Coffee</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="Free HTML Templates" name="keywords" />
  <meta content="Free HTML Templates" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />

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
        <a href="index.php" class="nav-item nav-link active">Beranda</a>
        <a href="menu.php" class="nav-item nav-link">Produk</a>
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

  <!-- Hero Start -->
  <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/car-1.png" alt="Rumata Coffee" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="img/car-2.jpeg" alt="Rumata Coffee" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="img/car-3.png" alt="Rumata Coffee" class="d-block w-100">
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

  <!-- About Start -->
  <div class="container-fluid bg-img py-5">
    <div class="container">
      <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px" data-aos="fade-up">
        <h2 class="text-primary font-secondary">Tentang Kami</h2>
        <h1 class="display-5 text-white">Selamat datang di Rumata Coffee</h1>
      </div>
      <div class="row gx-5">
        <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px" data-aos="fade-up">
          <div class="position-relative h-100">
            <img class="position-absolute w-100 h-100" src="img/<?php echo $row['gambar_deskripsi']; ?>" style="object-fit: cover" />
          </div>
        </div>
        <div class="col-lg-6 pb-5" data-aos="fade-down">
          <h4 class="text-white mb-4">
            <?php echo $row['judul_deskripsi']; ?>
          </h4>
          <p class="text-white mb-5">
            <?php echo $row['isi_deskripsi']; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

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
            <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="https://api.whatsapp.com/send?phone=6281376127992"><i class="fab fa-whatsapp fw-normal"></i></a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.jS"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


  <!-- JS AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Javascript -->
  <script src="js/main.js"></script>
</body>

</html>