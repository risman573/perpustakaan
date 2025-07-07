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
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_peminjaman" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Buku</th>
							<th>Peminjam</th>
							<th>Tgl. Peminjaman</th>
							<th>Tgl. Pengembalian</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_peminjaman,
							b.judul_buku,
							a.id_anggota,
							a.nama,
							p.tgl_peminjaman,
							p.tgl_kembali
							FROM peminjaman p
								INNER JOIN buku b ON p.id_buku=b.id_buku
				  			INNER JOIN anggota a ON p.id_anggota=a.id_anggota
							WHERE p.status = 'Pinjam'
							ORDER BY p.tgl_peminjaman DESC
						");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['judul_buku']; ?>
								</td>
								<td>
									<?php echo $data['id_anggota']; ?>
									-
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php $tgl = $data['tgl_peminjaman'];
									echo date("d/M/Y", strtotime($tgl)) ?>
								</td>
								<td>
									<?php $tgl = $data['tgl_kembali'];
									echo date("d/M/Y", strtotime($tgl)) ?>
								</td>

								<?php
									$tgl1 = date("Y-m-d"); // hari ini
									$tgl2 = $data['tgl_kembali']; // tanggal kembali dari database

									$pecah1 = explode("-", $tgl1);
									$pecah2 = explode("-", $tgl2);

									$jd1 = GregorianToJD($pecah1[1], $pecah1[2], $pecah1[0]);
									$jd2 = GregorianToJD($pecah2[1], $pecah2[2], $pecah2[0]);

									$selisih = $jd1 - $jd2;
									$denda = $selisih * 1000;
								?>

								<td>
									<?php if ($selisih <= 0) { ?>
										<span class="label label-primary">Belum Terlambat</span>
									<?php } else { ?>
										<span class="label label-warning">Terlambat: <?= $selisih ?> hari</span>
								</td>
							<?php } ?>

							<td>
								<a href="?page=MyApp/perpanjang&kode=<?php echo $data['id_peminjaman']; ?>" onclick="return confirm('Perpanjang Buku Ini ?')" title="Perpanjang" class="btn btn-success">
									<i class="fa fa-forward"> Perpanjang</i>
								</a>
								<a href="?page=MyApp/kembalikan&kode=<?php echo $data['id_peminjaman']; ?>" onclick="return confirm('Kembalikan Buku Ini ?')" title="Kembalikan" class="btn btn-danger">
									<i class="fa fa-backward"> Kembalikan</i>
							</td>
							</tr>
						<?php
						}
						?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
	<h4> *Note
		<br> Masa peminjaman buku adalah <span style="color:red; font-weight:bold;">7 hari</span> dari tanggal peminjaman.
	</h4>
</section>