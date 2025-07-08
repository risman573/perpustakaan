<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM anggota WHERE id_anggota='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
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
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Anggota</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<!-- <labe>Id anggota</labe> -->
							<input type='hidden' class="form-control" name="id_anggota" value="<?php echo $data_cek['id_anggota']; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Nama</label>
							<input type='text' class="form-control" name="nama" value="<?php echo $data_cek['nama']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jk" id="jk" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
                  //cek data yg dipilih sebelumnya
                  if ($data_cek['jk'] == "Laki-laki") echo "<option value='Laki-laki' selected>Laki-laki</option>";
                  else echo "<option value='Laki-laki'>Laki-laki</option>";
                  if ($data_cek['jk'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                  else echo "<option value='Perempuan'>Perempuan</option>";
                ?>
							</select>
						</div>

						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control" name="alamat" rows="5"><?php echo $data_cek['alamat']; ?></textarea>
						</div>

						<div class="form-group">
							<label for="no_telp">No. Telepon</label>
							<input type="number" class="form-control" name="no_telp" value="<?php echo $data_cek['no_telp']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" name="username" value="<?php echo $data_cek['username']; ?>"
							/>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="password" id="pass" value="<?php echo $data_cek['password']; ?>"
							/>
							<input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_anggota" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE anggota SET
				nama='".$_POST['nama']."',
				jk='".$_POST['jk']."',
				no_telp='".$_POST['no_telp']."',
        alamat='".$_POST['alamat']."'
        WHERE id_anggota='".$_POST['id_anggota']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_anggota';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_anggota';
            }
        })</script>";
    }
}
?>
<script type="text/javascript">
        function change()
        {
        var x = document.getElementById('pass').type;

        if (x == 'password')
        {
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML;
        }
        else
        {
            document.getElementById('pass').type = 'password';
            document.getElementById('mybutton').innerHTML;
        }
        }
    </script>

