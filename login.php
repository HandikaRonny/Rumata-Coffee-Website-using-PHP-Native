<?php
session_start();
include_once('function/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = 'SELECT * FROM admin_rc WHERE username_adm=? AND password_adm=?';

  $statement = $conn->prepare($query);
  $statement->bind_param(
    'ss',
    $username,
    $password
  );
  $statement->execute();
  $result_set = $statement->get_result();
  $row = $result_set->fetch_assoc();
  if ($result_set->num_rows) {
    $_SESSION['is_logged_in'] = 'admin_rc';
    $_SESSION['id_admin'] = $row['id_admin'];
    $_SESSION['nama_adm'] = $row['nama_adm'];
    header('Location: administrator/administrator.php');
  } else {
    $error = "Username atau password salah";
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = 'SELECT * FROM pelanggan WHERE username_pelanggan=? AND password_pelanggan=?';

  $statement = $conn->prepare($query);
  $statement->bind_param(
    'ss',
    $username,
    $password
  );
  $statement->execute();
  $result_set = $statement->get_result();
  $row = $result_set->fetch_assoc();
  if ($result_set->num_rows) {
    $_SESSION['is_logged_in'] = 'pelanggan';
    $_SESSION['id_pelanggan'] = $row['id_pelanggan'];
    $_SESSION['nama_pelanggan'] = $row['nama_pelanggan'];
    $_SESSION['alamat_pelanggan'] = $row['alamat_pelanggan'];
    $_SESSION['no_telp_pelanggan'] = $row['no_telp_pelanggan'];
    $_SESSION['email_pelanggan'] = $row['email_pelanggan'];
    $_SESSION['username_pelanggan'] = $row['username_pelanggan'];
    $_SESSION['password_pelanggan'] = $row['password_pelanggan'];
    header('Location: index.php');
  } else {
    $error = "Username atau password salah";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Rumata Coffee</title>
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

  <link rel="stylesheet" href="css/validasi.css" />
</head>

<body style="background-image: url('img/bg-login2.png')">
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
      <div class="col-md-5">
        <div class="card">
          <div class="card-body loginBox text-white">
            <div class="text-center mb-3">
              <img src="img/Logo.jpeg" alt="Logo" class="logo" />
            </div>
            <h3 class="card-title text-center text-white">Selamat Datang</h3>
            <p class="text-center">Login degan memasuki informasi dibawah</p>
            <form method="POST" class="py-3">
              <div class="inputBox mx-4">
                <label for="username" class="form-label">Username:</label>
                <input class="" type="text" placeholder="Username" name="username" id="username" />

                <label for="password" class="form-label">Password:</label>
                <input class="" type="password" placeholder="Password" name="password" id="password" />
              </div>
              <?php if (isset($error)) { ?>
                <div class="form-group">
                  <p class="text-center text-danger"><?php echo $error; ?></p>
                </div>
              <?php } ?>
              <div class="text-center mx-4">
                <input type="submit" name="" value="Log-in" />
              </div>
              <div class="text-center">
                <p>Tidak Memiliki Akun? <a href="registrasi.php">Daftar disini</a></p>
                <a href="forgotpassword.php">Lupa Password</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>