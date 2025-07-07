<?php
  $server   = "localhost";
  $username = "root";
  $password = "";
  $database = "perpustakaan";

  // Membuat koneksi
  $koneksi = mysqli_connect($server, $username, $password, $database);

  // Periksa koneksi
  if (!$koneksi) {
      die("Koneksi gagal: " . mysqli_connect_error());
  }
  // echo "Koneksi berhasil";
?>