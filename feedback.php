<?php
session_start();
include_once('function/koneksi.php');
$masukan = 'SELECT * FROM masukan WHERE kondisi = "Show"';
$result_masukan = $conn->query($masukan);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Masukan - Rumata Coffee</title>
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
        <a href="about.php" class="nav-item nav-link">Tentang Kami</a>
        <a href="feedback.php" class="nav-item nav-link active">Masukan</a>
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

  <!-- Masukan -->
  <div class="container my-3">
    <h1>Masukan dan Komentar:</h1>
    <!-- masukan -->
    <?php
    while ($row = $result_masukan->fetch_assoc()) {
      echo ('<div class="card my-1">');
      echo ('<div class="card-body">');
      echo ('<h5 class="card-title">' . $row['nama'] . '</h5>');
      echo ('<h6 class="card-subtitle mb-2 text-muted">' . $row['tgl_post'] . '</h6>');
      echo ('<h6 class="card-subtitle mb-2">' . $row['subject'] . '</h6>');
      echo ('<p class="card-text">' . $row['isi_masukan'] . '</p>');
      echo ('</div>');
      echo ('</div>');
    }
    ?>
  </div>

  <!-- Feedback Start -->
  <div class="container-fluid bg-dark bg-img p-3">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-4 text-white">Beri Masukan</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-img py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form action="function/feedback_process.php" method="POST">
            <div class="row g-3">
              <div class="col-sm-12">
                <input type="text" name="subject" class="form-control bg-light border-0 px-4" placeholder="Subject" style="height: 55px;" required>
              </div>
              <div class="col-sm-12">
                <textarea name="isi_masukan" class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Masukan" required></textarea>
              </div>
              <div class="col-sm-12">
                <button class="btn btn-primary border-inner w-100 py-3" type="submit">Kirim Masukan</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Feedback End -->


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
            <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="https://wa.me//628176127992"><i class="fab fa-whatsapp fw-normal"></i></a>
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


  <!-- Back to Top -->
  <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>