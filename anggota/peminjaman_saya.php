<?php
  $id_user = $_SESSION["ses_id"];
  $query = mysqli_query($koneksi, "SELECT * FROM peminjaman
      INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
      WHERE peminjaman.id_anggota = '$id_user'");
?>

<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Peminjaman Saya</h3>
    </div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['judul_buku']; ?></td>
              <td><?= $data['tgl_peminjaman']; ?></td>
              <td><?= $data['tgl_kembali']; ?></td>
              <td><?= $data['status']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
