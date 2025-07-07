<?php
  if (isset($_GET['kode'])) {
      $sql_cek = "SELECT * FROM peminjaman WHERE id_peminjaman='" . $_GET['kode'] . "'";
      $query_cek = mysqli_query($koneksi, $sql_cek);
      $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

      // ambil tgl kembali lama
      $tgl_kembali_lama = $data_cek['tgl_kembali'];

      // buat tgl kembali baru = tgl kembali lama + 7 hari
      $tgl_kembali_baru = date('Y-m-d', strtotime('+7 days', strtotime($tgl_kembali_lama)));

      $sql_ubah = "UPDATE peminjaman SET
          tgl_kembali = '$tgl_kembali_baru'
          WHERE id_peminjaman = '" . $_GET['kode'] . "'";

      $query_ubah = mysqli_query($koneksi, $sql_ubah);

      if ($query_ubah) {
          echo "<script>
          Swal.fire({title: 'Perpanjang Peminjaman Buku Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
          }).then((result) => {
              if (result.value) {
                  window.location = 'index.php?page=MyApp/data_peminjaman';
              }
          })</script>";
      } else {
          echo "<script>
          Swal.fire({title: 'Perpanjang Peminjaman Buku Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {
              if (result.value) {
                  window.location = 'index.php?page=MyApp/data_peminjaman';
              }
          })</script>";
      }
  }
?>
