<?php
//kode 9 digit

// $carikode = mysqli_query($koneksi,"SELECT kode_buku FROM buku order by kode_buku desc");
// $datakode = mysqli_fetch_array($carikode);
// $kode = $datakode['kode_buku'];
// $urut = substr($kode, 1, 3);
// $tambah = (int) $urut + 1;

// if (strlen($tambah) == 1){
// 	$format = "B"."00".$tambah;
// }else if (strlen($tambah) == 2){
//  	$format = "B"."0".$tambah;
// }else if (strlen($tambah) == 3){
// 	$format = "B".$tambah;
// }
?>

<section class="content-header">
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
					<h3 class="box-title">Tambah Buku</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<!-- <div class="form-group">
							<label>Kode Buku</label>
							<input type="text" name="kode_buku" id="kode_buku" class="form-control" value="<?php echo $format; ?>"
							 readonly/>
						</div> -->

						<div class="form-group">
							<label>Judul Buku</label>
							<input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Judul Buku">
						</div>

						<div class="form-group">
							<label>Pengarang</label>
							<input type="text" name="pengarang" id="pengarang" class="form-control" placeholder="Nama Pengarang">
						</div>

						<div class="form-group">
							<label>Penerbit</label>
							<input type="text" name="penerbit" id="penerbiit" class="form-control" placeholder="Penerbit">
						</div>

						<div class="form-group">
							<label>Kategori</label>
							<select name="kat_id" id="kat_id" class="form-control" required>
								<option value="">-- Pilih Kategori --</option>
								<?php
									$sql_kat = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY deskripsi ASC");
									while ($data_kat = mysqli_fetch_array($sql_kat)) {
										echo "<option value='".$data_kat['kat_id']."'>".$data_kat['deskripsi']."</option>";
									}
								?>
							</select>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_buku" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){

        $sql_simpan = "INSERT INTO buku (judul_buku,pengarang,penerbit,kat_id) VALUES (
          '".$_POST['judul_buku']."',
          '".$_POST['pengarang']."',
          '".$_POST['penerbit']."',
					'".$_POST['kat_id']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_buku';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_buku';
          }
      })</script>";
    }
  }

