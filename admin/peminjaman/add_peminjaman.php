<section class="content-header">
	<h1>
		Peminjaman
		<small>Buku</small>
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
					<h3 class="box-title">Tambah Peminjaman</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Nama Peminjam</label>
							<select name="id_anggota" id="id_anggota" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih Peminjam --</option>
								<?php
								// ambil data dari database
								$query = "select * from anggota";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['id_anggota'] ?>">
									<?php echo $row['id_anggota'] ?>
									-
									<?php echo $row['nama'] ?>
								</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Buku</label>
							<select name="id_buku" id="id_buku" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih Buku --</option>
								<?php
								// ambil data dari database
								$query = "select * from buku";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['id_buku'] ?>">
									<?php echo $row['id_buku'] ?>
									-
									<?php echo $row['judul_buku'] ?>
								</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Tgl. Peminjaman</label>
							<input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control" />
						</div>

						<div class="form-group">
							<label>Tgl. Pengembalian</label>
							<input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly />
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_peminjaman" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
			<script>
				document.getElementById("tgl_peminjaman").addEventListener("change", function () {
					const tglPinjam = new Date(this.value);
					if (!this.value) return;

					tglPinjam.setDate(tglPinjam.getDate() + 7); // tambah 7 hari

					const yyyy = tglPinjam.getFullYear();
					const mm = ("0" + (tglPinjam.getMonth() + 1)).slice(-2);
					const dd = ("0" + tglPinjam.getDate()).slice(-2);

					const tglKembaliFormatted = `${yyyy}-${mm}-${dd}`;
					document.getElementById("tgl_kembali").value = tglKembaliFormatted;
				});
			</script>
</section>

<?php
    if (isset ($_POST['Simpan'])) {
			$tgl_p = $_POST['tgl_peminjaman'];
			$tgl_k = $_POST['tgl_kembali'];

			$sql_simpan = "INSERT INTO peminjaman (id_buku,id_anggota,tgl_peminjaman,tgl_kembali) VALUES (
				'" . $_POST['id_buku'] . "',
				'" . $_POST['id_anggota'] . "',
				'" . $tgl_p . "',
				'" . $tgl_k . "');";
			$query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);

			if ($query_simpan) {
				echo "<script>
				Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=MyApp/data_peminjaman';
					}
				})</script>";
			} else {
				echo "<script>
				Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=MyApp/add_peminjaman';
					}
				})</script>";
			}
		}
