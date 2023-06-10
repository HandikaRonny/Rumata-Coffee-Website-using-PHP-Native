<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi - Rumata Coffee</title>
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

  <link rel="stylesheet" href="css/validasi.css" />
</head>

<body style="background-image: url(img/bg-login2.png)">
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
        <a href="feedback.php" class="nav-item nav-link">Masukan</a>
        <?php
        if (isset($_SESSION['is_logged_in'])) {
          if ($_SESSION['is_logged_in'] == 'pelanggan') {
            echo ('<a href="function/logout.php" class="nav-item nav-link">Logout</a>');
          } elseif ($_SESSION['is_logged_in'] == 'admin_rc') {
            echo ('<a href="administrator/administrator.php" class="nav-item nav-link">Admin</a>');
          }
        } else {
          echo ('<a href="login.php" class="nav-item nav-link active">Login</a>');
        }
        ?>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
  <div class="container py-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body loginBox text-white">
            <div class="text-center mb-2">
              <img src="img/Logo.jpeg" alt="Logo" class="logo" />
            </div>
            <h3 class="card-title text-center text-white">Registrasi Form</h3>
            <p class="text-center">Masukan data dengan lengkap dan benar</p>
            <form action="function/registrasi_proses.php" method="POST" class="py-2">
              <div class="inputBox mx-5">
                <label for="name" class="form-label">Nama Lengkap:</label>
                <input class="" type="text" placeholder="Nama Lengkap" name="nama_pelanggan" id="nama_pelanggan" />

                <label for="alamat" class="form-label">Alamat:</label>
                <input class="" type="text" placeholder="Alamat" name="alamat_pelanggan" id="alamat_pelanggan" />

                <label for="no_telp" class="form-label">Nomor Telepon:</label>
                <input class="" type="number" placeholder="Nomor Telepon" name="no_telp_pelanggan" id="no_telp_pelanggan" />

                <label for="email" class="form-label">Email:</label>
                <input class="" type="email" placeholder="Email" name="email_pelanggan" id="email_pelanggan" />

                <label for="username" class="form-label">Username:</label>
                <input class="" type="text" placeholder="Username" name="username_pelanggan" id="username_pelanggan" />

                <label for="password" class="form-label">Password:</label>
                <input class="" type="password" placeholder="Password" name="password_pelanggan" id="password_pelanggan" />
              </div>
              <div class="text-center mx-5">
                <input type="submit" name="" value="Submit" />
              </div>
              <div class="text-center">
                <p>
                  Sudah memiliki akun? <a href="login.php">Login disini</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>