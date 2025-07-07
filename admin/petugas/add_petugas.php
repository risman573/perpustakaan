<section class="content-header">
	<h1>
		PETUGAS
	</h1>
	<!-- <ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Tabsis</b>
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
					<h3 class="box-title">Tambah Petugas</h3>
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
						<div class="form-group">
							<label for="nama">Nama Petugas</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama petugas">
						</div>

						<div class="form-group">
							<label for="alamat">Alamat</label>
  						<textarea class="form-control" name="alamat" rows="5" id="alamat" placeholder="Alamat"></textarea>
						</div>

						<div class="form-group">
							<label for="no_telp">No. Telepon</label>
							<input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Telepon">
						</div>

						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>

						<!-- <div class="form-group">
							<label>Level</label>
							<select name="level" id="level" class="form-control">
								<option>-- Pilih Level --</option>
								<option>Administrator</option>
								<option>Petugas</option>
							</select>
						</div> -->

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_petugas" title="Kembali" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO petugas (nama,alamat,no_telp,username,password) VALUES (
        '".$_POST['nama']."',
        '".$_POST['alamat']."',
        '".$_POST['no_telp']."',
        '".$_POST['username']."',
        '".$_POST['password']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'index.php?page=MyApp/data_petugas';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = 'index.php?page=MyApp/add_petugas';
        }
      })</script>";
    }
     //selesai proses simpan data
}

