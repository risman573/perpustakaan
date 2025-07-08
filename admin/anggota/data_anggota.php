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
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_anggota" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
			<!-- <a href="?page=MyApp/print_allanggota" title="Print" class="btn btn-success" stlye="color : green;">
				<i class="glyphicon glyphicon-print"></i>Print</a> -->
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>No. Telepon</th>
							<th>Jenis Kelamin</th>
							<th>Status</th>
							<th>Username</th>
							<th>Dibuat oleh</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

				<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT a.*, p.nama as nama_petugas from anggota a join petugas p on a.id_petugas=p.id_petugas");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<?php echo $data['no_telp']; ?>
							</td>
							<td>
								<?php echo $data['jk']; ?>
							</td>
							<td>
								<?php echo $data['status']; ?>
							</td>
							<td>
								<?php echo $data['username']; ?>
							</td>
							<td>
								<?php echo $data['nama_petugas']; ?>
							</td>

							<td>
								<a href="?page=MyApp/edit_anggota&kode=<?php echo $data['id_anggota']; ?>" title="Ubah Data"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>

								<a href="?page=MyApp/del_anggota&kode=<?php echo $data['id_anggota']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
				 				 </a>

								<!-- <a href="?page=MyApp/print_anggota&kode=<?php echo $data['id_anggota'] ?>" title="print"
								 target="_blank"><button class="btn btn-primary">
								<i class="fa fa-print"></i> -->

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
</section>