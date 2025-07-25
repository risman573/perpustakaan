<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["level_user"];
}

//KONEKSI DB
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SISTEM INFORMASI PERPUSTAKAAN</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition skin-green sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<span class="logo-lg">
					<img src="dist/img/logo.png" width="37px">
					<b>SIP</b>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a class="dropdown-toggle">
								<span>
									<b>
										Sistem Informasi Perpustakaan CRUD
									</b>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				</<b>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/avatar.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-warning">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>
				</br>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
						<!-- Level  -->
						<?php
						if ($data_level == "petugas") {
						?>

							<li class="treeview">
								<a href="?page=petugas">
									<i class="fa fa-dashboard"></i>
									<span>Dashboard</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="treeview">
								<a href="#">
									<i class="fa fa-folder"></i>
									<span>Kelola Buku</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="?page=MyApp/data_kategoriBuku">
											<i class="fa fa-book"></i>Kategori Buku</a>
									</li>
									<li>
										<a href="?page=MyApp/data_buku">
											<i class="fa fa-book"></i>Data Buku</a>
									</li>
									<!-- <li>
										<a href="?page=MyApp/data_anggota">
											<i class="fa fa-users"></i>Data Anggota</a>
									</li> -->
								</ul>
							</li>

							<!-- <li class="treeview">
								<a href="?page=data_sirkul">
									<i class="fa fa-refresh"></i>
									<span>Sirkulasi</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li> -->

							<li class="treeview">
								<a href="?page=MyApp/data_peminjaman">
									<i class="fa fa-bookmark"></i>
									<span>Peminjaman</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<!-- <li class="treeview">
								<a href="#">
									<i class="fa fa-book"></i>
									<span>Log Peminjaman</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">

									<li>
										<a href="?page=log_pinjam">
											<i class="fa fa-arrow-circle-o-down"></i>Peminjaman</a>
									</li>
									<li>
										<a href="?page=log_kembali">
											<i class="fa fa-arrow-circle-o-up"></i>Pengembalian</a>
									</li>
								</ul>
							</li> -->

							<!-- <li class="treeview">
								<a href="#">
									<i class="fa fa-print"></i>
									<span>Laporan</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="?page=laporan_sirkulasi">
											<i class="fa fa-file"></i>Laporan Sirkulasi</a>
									</li>
								</ul>
							</li> -->

							<li class="header">SETTING</li>

							<li class="treeview">
								<a href="?page=MyApp/data_petugas">
									<i class="fa fa-user"></i>
									<span>Petugas Sistem</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="treeview">
								<a href="?page=MyApp/data_anggota">
									<i class="fa fa-users"></i>
									<span>Data Anggota</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

						<li>
							<a href="logout.php">
								<i class="fa fa-sign-out"></i>
								<span>Logout</span>
								<span class="pull-right-container"></span>
							</a>
						</li>

					<?php
					} elseif ($data_level == "anggota") {
					?>
						<li class="treeview">
							<a href="?page=anggota">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
							</a>
						</li>

						<li class="treeview">
							<a href="?page=peminjaman_saya">
								<i class="fa fa-book"></i>
								<span>Peminjaman Saya</span>
							</a>
						</li>

						<li class="treeview">
							<a href="?page=profil_anggota">
								<i class="fa fa-user"></i>
								<span>Profil Saya</span>
							</a>
						</li>

						<li>
							<a href="logout.php">
								<i class="fa fa-sign-out"></i>
								<span>Logout</span>
							</a>
						</li>
					<?php
					}
					?>

			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php
				if (isset($_GET['page'])) {
					$hal = $_GET['page'];

					switch ($hal) {
						//Klik Halaman Home Pengguna
						case 'petugas':
							include "home/petugas.php";
							break;
						case 'anggota':
							include "home/anggota.php";
							break;

						//petugas
						case 'MyApp/data_petugas':
							include "admin/petugas/data_petugas.php";
							break;
						case 'MyApp/add_petugas':
							include "admin/petugas/add_petugas.php";
							break;
						case 'MyApp/edit_petugas':
							include "admin/petugas/edit_petugas.php";
							break;
						case 'MyApp/del_petugas':
							include "admin/petugas/del_petugas.php";
							break;

						//anggota
						case 'MyApp/data_anggota':
							include "admin/anggota/data_anggota.php";
							break;
						case 'MyApp/add_anggota':
							include "admin/anggota/add_anggota.php";
							break;
						case 'MyApp/edit_anggota':
							include "admin/anggota/edit_anggota.php";
							break;
						case 'MyApp/del_anggota':
							include "admin/anggota/del_anggota.php";
							break;
						case 'MyApp/print_anggota':
							include "admin/anggota/print_anggota.php";
							break;
						case 'MyApp/print_allanggota':
							include "admin/anggota/print_allanggota.php";
							break;

						//kategori buku
						case 'MyApp/data_kategoriBuku':
							include "admin/kategoriBuku/data_kategoriBuku.php";
							break;
						case 'MyApp/add_kategoriBuku':
							include "admin/kategoriBuku/add_kategoriBuku.php";
							break;
						case 'MyApp/edit_kategoriBuku':
							include "admin/kategoriBuku/edit_kategoriBuku.php";
							break;
						case 'MyApp/del_kategoriBuku':
							include "admin/kategoriBuku/del_kategoriBuku.php";
							break;

						//buku
						case 'MyApp/data_buku':
							include "admin/buku/data_buku.php";
							break;
						case 'MyApp/add_buku':
							include "admin/buku/add_buku.php";
							break;
						case 'MyApp/edit_buku':
							include "admin/buku/edit_buku.php";
							break;
						case 'MyApp/del_buku':
							include "admin/buku/del_buku.php";

						//peminjaman
						case 'MyApp/data_peminjaman':
							include "admin/peminjaman/data_peminjaman.php";
							break;
						case 'MyApp/add_peminjaman':
							include "admin/peminjaman/add_peminjaman.php";
							break;
						case 'MyApp/perpanjang':
							include "admin/peminjaman/perpanjang.php";
							break;
						case 'MyApp/kembalikan':
							include "admin/peminjaman/kembalikan.php";
							break;

						//sirkul
						case 'data_sirkul':
							include "admin/sirkul/data_sirkul.php";
							break;
						case 'add_sirkul':
							include "admin/sirkul/add_sirkul.php";
							break;
						case 'panjang':
							include "admin/sirkul/panjang.php";
							break;
						case 'kembali':
							include "admin/sirkul/kembali.php";
							break;

						//log
						case 'log_pinjam':
							include "admin/log/log_pinjam.php";
							break;
						case 'log_kembali':
							include "admin/log/log_kembali.php";
							break;

						//laporan
						case 'laporan_sirkulasi':
							include "admin/laporan/laporan_sirkulasi.php";
							break;
						case 'MyApp/print_laporan':
							include "admin/laporan/print_laporan.php";
							break;

						// khusus anggota
						case 'peminjaman_saya':
							include "anggota/peminjaman_saya.php";
							break;
						case 'profil_anggota':
							include "anggota/profil_anggota.php";
							break;

							//default
						default:
							echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
							break;
					}

				} else {
					// Default ke dashboard sesuai level
					if ($data_level == "petugas") {
						include "home/petugas.php";
					} elseif ($data_level == "anggota") {
						include "home/anggota.php";
					} else {
						include "home/petugas.php";
					}
				}
			?>
			</section>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<strong>Copyright &copy;
				<a href="https://www.facebook.com/">Muhammad Ivan Setiawan</a>.</strong> All rights reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
		-->

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

		<!--Bootstrap 3.3.6 -->

		<script src = "bootstrap/js/bootstrap.min.js"></script>


		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->


		<script>
			$(function() {
				$("#example1").DataTable({
					columnDefs: [{
						"defaultContent": "-",
						"targets": "_all"
					}]
				});
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>
</body>

</html>
