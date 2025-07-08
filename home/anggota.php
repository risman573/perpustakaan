<?php
	$id_anggota = $_SESSION['ses_id'];

	// Jumlah buku yang sedang dipinjam
	$sql = $koneksi->query("SELECT COUNT(id_peminjaman) AS jml_pinjam FROM peminjaman WHERE id_anggota='$id_anggota' AND status='Pinjam'");
	$data = $sql->fetch_assoc();
	$jml_pinjam = $data['jml_pinjam'];

	// Jumlah buku yang sudah dikembalikan
	$sql2 = $koneksi->query("SELECT COUNT(id_peminjaman) AS jml_kembali FROM peminjaman WHERE id_anggota='$id_anggota' AND status='Kembali'");
	$data2 = $sql2->fetch_assoc();
	$jml_kembali = $data2['jml_kembali'];
?>

<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-orange">
		<div class="inner">
			<h4><?= $jml_pinjam; ?></h4>
			<p>Sedang Dipinjam</p>
		</div>
		<div class="icon">
			<i class="ion ion-ios-book"></i>
		</div>
		<a href="?page=peminjaman_saya" class="small-box-footer">
			Lihat Detail <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>

<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-purple">
		<div class="inner">
			<h4><?= $jml_kembali; ?></h4>
			<p>Sudah Dikembalikan</p>
		</div>
		<div class="icon">
			<i class="ion ion-checkmark-round"></i>
		</div>
		<a href="?page=peminjaman_saya" class="small-box-footer">
			Lihat Detail <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>