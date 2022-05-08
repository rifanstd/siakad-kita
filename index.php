<?php
// require file to use
require 'functions.php';

// get data mahasiswa from database
$dataMahasiswa = querySelect("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Booststrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<title>Sistem Informasi Akademik Kita</title>
</head>
<body>

	<!-- Jumbotron -->
	<div class="jumbotron pt-5">
		<h1 class="display-5 text-center">Sistem Informasi Akademik Kita</h1>
		<p class="lead fs-5 text-center">Ini merupakan website sederhana Sistem Informasi Akademik</p>
		<hr class="my-4">
	</div>
	<!-- End of jumbotron -->

	<!-- Tambah data and Search -->
	<div class="container mb-3">
		<div class="row">
			<div class="col-md">
				<form>
					<a href="input_data.php">
						<button type="button" class="btn btn-primary">Tambah Data</button>
					</a>
				</form>
			</div>
			<div class="col-md">
				<form class="d-flex w-50 ms-auto">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</div>
	<!-- End of tambah data and search -->

	<!-- Show Data -->
	<?php if ($dataMahasiswa == 0) { ?>
		<p class="text-center fw-bold">Tidak ada data</p>
	<?php } else { ?>
		<div class="container table-responsive justify-content-center">
			<table class="table text-center table-hover table-bordered border-dark">
				<thead class="bg-secondary" style="color: white;">
					<tr>
						<th scope="col">NPM</th>
						<th scope="col">Nama</th>
						<th scope="col">Jurusan</th>
						<th scope="col">Semester</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- Showing data -->
					<?php foreach ($dataMahasiswa as $row) : ?>
						<tr class="align-middle">
							<td><?php echo $row['npm'] ?></td>
							<td><?php echo $row['nama'] ?></td>
							<td><?php echo $row['jurusan'] ?></td>
							<td><?php echo $row['smt'] ?></td>
							<td>
								<a href="edit.php?npm=<?php echo $row['npm']; ?>">Edit</a> |
								<a href="delete.php?npm=<?php echo $row['npm']; ?>">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php } ?>
	<!-- End of show data -->


	<!-- Javascript Bootstrap -->
	<script src="bootstrap\js\bootstrap.min.css"></script>
</body>
</html>