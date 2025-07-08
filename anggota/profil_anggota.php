<?php
  $id_user = $_SESSION["ses_id"];
  $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id_user'");
  $data = mysqli_fetch_array($query);
?>

<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Profil Saya</h3>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="5"><?= $data['alamat']; ?></textarea>
        </div>
        <div class="form-group">
          <label>No. Telepon</label>
          <input type="number" name="no_telp" class="form-control" value="<?= $data['no_telp']; ?>">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?= $data['username']; ?>">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" id="pass" value="<?= $data['password']; ?>">
          <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox" /> Lihat Password
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" name="update" class="btn btn-primary">Update Profil</button>
      </div>
    </form>
  </div>
</section>

<?php
if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $no_telp = $_POST['no_telp'];
  $alamat = $_POST['alamat'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = mysqli_query($koneksi, "UPDATE anggota SET
        nama='$nama',
        no_telp='$no_telp',
        alamat='$alamat',
        username='$username',
        password='$password'
      WHERE id_anggota='$id_user'");

  if ($sql) {
    echo "<script>
      Swal.fire({title: 'Profil berhasil diperbarui',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          window.location = '?page=profil_anggota';
        }
      })
    </script>";
  }
}
?>

<script type="text/javascript">
  function change() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>