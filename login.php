<?php
	include "config/koneksi.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Perpustakaan</title>
		<link rel="icon" href="dist/img/logo.png">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/AdminLTE.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<h3>
					<font color="green">
						<b>Sistem Informasi Perpustakaan</b>
					</font>
				</h3>
				</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<center>
					<img src="dist/img/logo.png" width=160px />
				</center>
				<br>
				<!-- <p class="login-box-msg">Login System</p> -->
				<form action="#" method="post">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" name="username" placeholder="Username" required autoFocus>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">

						</div>
						<!-- /.col -->
						<div class="col-xs-4">
							<button type="submit" class="btn btn-success btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b>Masuk</b>
							</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<!-- /.social-auth-links -->

			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<!-- sweet alert -->
	</body>

</html>

<?php
	session_start();
	include "config/koneksi.php";

	if (isset($_POST['btnLogin'])) {
		$username = mysqli_real_escape_string($koneksi, $_POST['username']);
		$password = mysqli_real_escape_string($koneksi, $_POST['password']);

		// Cek login sebagai PETUGAS
		$sql_petugas = "SELECT * FROM petugas WHERE BINARY username='$username' AND password='$password'";
		$query_petugas = mysqli_query($koneksi, $sql_petugas);

		if (mysqli_num_rows($query_petugas) == 1) {
			$data = mysqli_fetch_assoc($query_petugas);
			$_SESSION["ses_id"] = $data["id_petugas"];
			$_SESSION["ses_nama"] = $data["nama"];
			$_SESSION["ses_username"] = $data["username"];
			$_SESSION["level_user"] = "petugas";

			echo "<script>
				Swal.fire({
					title: 'Login Berhasil sebagai Petugas',
					icon: 'success',
					confirmButtonText: 'OK'
				}).then(() => {
					window.location = 'index.php';
				});
			</script>";
			exit;
		}

		// Cek login sebagai ANGGOTA
		$sql_anggota = "SELECT * FROM anggota WHERE BINARY username='$username' AND password='$password'";
		$query_anggota = mysqli_query($koneksi, $sql_anggota);

		if (mysqli_num_rows($query_anggota) == 1) {
			$data = mysqli_fetch_assoc($query_anggota);
			$_SESSION["ses_id"] = $data["id_anggota"];
			$_SESSION["ses_nama"] = $data["nama"];
			$_SESSION["ses_username"] = $data["username"];
			$_SESSION["level_user"] = "anggota";

			echo "<script>
				Swal.fire({
					title: 'Login Berhasil sebagai Anggota',
					icon: 'success',
					confirmButtonText: 'OK'
				}).then(() => {
					window.location = 'index.php';
				});
			</script>";
			exit;
		}

		// Jika tidak ditemukan di kedua tabel
		echo "<script>
			Swal.fire({
				title: 'Login Gagal',
				text: 'Username atau password salah',
				icon: 'error',
				confirmButtonText: 'Coba Lagi'
			}).then(() => {
				window.location = 'login.php';
			});
		</script>";
	}
?>