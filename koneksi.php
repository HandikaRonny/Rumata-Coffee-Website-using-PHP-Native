<?php 
  $host = "localhost"; // nama host
  $user = "id20876819_rumatadb"; // nama pengguna database
  $pass = ']gqk?8OpV(N#mvcu'; // password pengguna database
  $db   = "id20876819_project_rc"; // nama database
  
  $conn = mysqli_connect($host, $user, $pass, $db);
  
  if(mysqli_connect_errno()){
    die("Koneksi database gagal: ".mysqli_connect_error());
  }
?>
