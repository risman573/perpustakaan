<?php
	// Jumlah total buku
	$sql = $koneksi->query("SELECT COUNT(id_buku) AS buku FROM buku");
	$data = $sql->fetch_assoc();
	$buku = $data['buku'];

	// Jumlah total anggota
	$sql = $koneksi->query("SELECT COUNT(id_anggota) AS agt FROM anggota");
	$data = $sql->fetch_assoc();
	$agt = $data['agt'];

	// Jumlah buku yang sedang dipinjam oleh siapa pun
	$sql = $koneksi->query("SELECT COUNT(id_peminjaman) AS jml_pinjam FROM peminjaman WHERE status='Pinjam'");
	$data = $sql->fetch_assoc();
	$jml_pinjam = $data['jml_pinjam'];

	// Jumlah buku yang sudah dikembalikan oleh siapa pun
	$sql = $koneksi->query("SELECT COUNT(id_peminjaman) AS jml_kembali FROM peminjaman WHERE status='Kembali'");
	$data = $sql->fetch_assoc();
	$jml_kembali = $data['jml_kembali'];
?>
<section class="content-header">
	<h1>DASHBOARD</h1>
</section>

<section class="content">
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-blue">
				<div class="inner">
					<h4><?= $buku; ?></h4>
					<p>Total Buku</p>
				</div>
				<div class="icon"><i class="ion ion-ios-book"></i></div>
				<a href="?page=MyApp/data_buku" class="small-box-footer">
					Lihat Detail <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4><?= $agt; ?></h4>
					<p>Total Anggota</p>
				</div>
				<div class="icon"><i class="ion ion-person-add"></i></div>
				<a href="?page=MyApp/data_anggota" class="small-box-footer">
					Lihat Detail <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-orange">
				<div class="inner">
					<h4><?= $jml_pinjam; ?></h4>
					<p>Buku Sedang Dipinjam</p>
				</div>
				<div class="icon"><i class="ion ion-loop"></i></div>
				<a href="?page=MyApp/data_peminjaman" class="small-box-footer">
					Lihat Detail <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-purple">
				<div class="inner">
					<h4><?= $jml_kembali; ?></h4>
					<p>Buku Dikembalikan</p>
				</div>
				<div class="icon"><i class="ion ion-checkmark-round"></i></div>
				<a href="?page=MyApp/data_peminjaman" class="small-box-footer">
					<!-- Lihat Detail <i class="fa fa-arrow-circle-right"></i> -->
				</a>
			</div>
		</div>

	</div>
</section>
