<?php
session_start();
include_once('koneksi.php');
$deskripsi = 'SELECT * FROM deskripsi';
$result_deskripsi = $conn->query($deskripsi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Deskripsi - Rumata Coffee</title>
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
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Deskripsi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">
                            <a href="administrator.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Deskripsi</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Tabel Deskripsi
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    while ($row = $result_deskripsi->fetch_assoc()) {
                                        echo ('<tr>');
                                        echo ('<td>' . $row['id_deskripsi'] . '</td>');
                                        echo ('<td>' . $row['judul_deskripsi'] . '</td>');
                                        echo ('<td>' . $row['isi_deskripsi'] . '</td>');
                                        echo ('<td><img src="img/' . $row['gambar_deskripsi'] . '" class="img-thumbnail" style="max-width: 100px; max-height: 100px;"></td>');
                                        echo ('<td>');
                                        echo ('<div class="d-flex sub">');
                                        echo ('<a href="edit_deskripsi.php?id_deskripsi=' . $row['id_deskripsi'] . '" class="btn btn-warning mx-1">Edit</a>');
                                        echo ('</div>');
                                        echo ('</td>');
                                        echo ('</tr>');
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/administrator.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>

</html>
