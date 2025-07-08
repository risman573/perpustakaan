<?php
//kode 9 digit

$carikode = mysqli_query($koneksi,"SELECT id_anggota FROM anggota order by id_anggota desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_anggota'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
	$format = "A"."00".$tambah;
}else if (strlen($tambah) == 2){
 	$format = "A"."0".$tambah;
}else if (strlen($tambah) == 3){
	$format = "A".$tambah;
}
?>

<section class="content-header">
	<h1>
		ANGGOTA
	</h1>
	<!-- <ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Perpustakaan</b>
			</a>
		</li>
	</ol> -->
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Anggota</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<!-- <button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button> -->
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<!-- <div class="form-group">
							<label>ID anggota</label>
							<input type="text" name="id_anggota" id="id_anggota" class="form-control" value="<?php echo $format; ?>"
							 readonly/>
						</div> -->

						<div class="form-group">
							<label>Nama Anggota</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Anggota">
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jk" id="jk" class="form-control" required>
								<option>-- Pilih --</option>
								<option>Laki-laki</option>
								<option>Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" rows="5" placeholder="Alamat"></textarea>
						</div>

						<div class="form-group">
							<label>No. Telepon</label>
							<input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="No. Telepon">
						</div>

						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>

						<p>Petugas input: <strong><?php echo $_SESSION['ses_nama']; ?></strong></p>
						<input type="hidden" name="id_petugas" value="<?php echo $_SESSION['ses_id']; ?>" />

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_anggota" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){

        $sql_simpan = "INSERT INTO anggota (nama,jk,alamat,no_telp,id_petugas,username,password) VALUES (
          '".$_POST['nama']."',
          '".$_POST['jk']."',
          '".$_POST['alamat']."',
          '".$_POST['no_telp']."',
					'".$_POST['id_petugas']."',
					'".$_POST['username']."',
					'".$_POST['password']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_anggota';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_anggota';
          }
      })</script>";
    }
  }

