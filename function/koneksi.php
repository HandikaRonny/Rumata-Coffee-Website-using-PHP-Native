<?php 
  $host = "localhost"; // nama host
  $user = "root"; // nama pengguna database
  $pass = ''; // password pengguna database
  $db   = "project_rc"; // nama database
  
  $conn = mysqli_connect($host, $user, $pass, $db);
  
  if(mysqli_connect_errno()){
    die("Koneksi database gagal: ".mysqli_connect_error());
  }
