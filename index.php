<?php

// session
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;	
}

// require file to use
require 'functions.php';

// get data mahasiswa from database
$dataMahasiswa = querySelect("SELECT * FROM mahasiswa");

// if search
if (isset($_POST['submit-search'])){
	$dataMahasiswa = querySearch($_POST['keyword']);
}

// if filter
if (isset($_POST['submit-filter'])){
	$dataMahasiswa = queryFilter($_POST['filter-jurusan'], $_POST['filter-semester']);
}


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
	
	<!-- section nav bar -->
	<section>
		<nav class="navbar navbar-expand-lg navbar-dark bg-success">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Siakad Kita</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</section>

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
				<form action="" method="post" class="d-flex justify-content-end">
					<select name="filter-jurusan" class="form-select mb-2 me-2">
						<option value="*" selected hidden>Jurusan</option>
						<option value="Fisika">Fisika</option>
						<option value="Biologi">Biologi</option>
						<option value="Kimia">Kimia</option>
						<option value="Matematika">Matematika</option>
						<option value="Ilmu Komputer">Ilmu Komputer</option>
					</select>
					<select name="filter-semester" id="key" class="form-select mb-2 me-2">
						<option value="*" selected hidden>Semester</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
					</select>
					<button class="btn btn-outline-success mb-2" type="submit" name="submit-filter">Filter</button>
					<?php if (isset($_POST['submit-filter'])) : ?>
						<?php if ($_POST['filter-jurusan'] != '*' or $_POST['filter-semester'] != '*'): ?>
							<a href="index.php">
								<button class="btn btn-primary mb-2 ms-2" type="submit">Reset</button>
							</a>
						<?php endif; ?>
					<?php endif; ?>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md mt-2">
				<form>
					<a href="input_data.php">
						<button type="button" class="btn btn-success">Tambah Data</button>
					</a>
				</form>
			</div>
			<div class="col-md mt-2">
				<form action="" method="post" class="d-flex ms-auto">
					<input class="form-control me-2" name="keyword" type="search" placeholder="Search by name or NPM" aria-label="Search" autocomplete="off">
					<button class="btn btn-outline-success" type="submit" name="submit-search">Search</button>
					<?php if (isset($_POST['submit-search'])) : ?>
						<?php if ($_POST['keyword'] != ''): ?>
							<a href="index.php">
								<button class="btn btn-primary ms-2" type="submit">Reset</button>
							</a>
						<?php endif; ?>
					<?php endif; ?>
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
								<a href="edit.php?npm=<?php echo $row['npm']; ?>" style="text-decoration: none;">
									<button class="btn btn-warning mt-1" type="submit" style="font-size: 12px;">Edit</button>
								</a>
								<a href="delete.php?npm=<?php echo $row['npm']; ?>" style="text-decoration: none;">
									<button class="btn btn-danger mt-1" type="submit" style="font-size: 12px;">Hapus</button>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php } ?>
	<!-- End of show data -->


	<!-- Javascript Bootstrap -->
	<script src="bootstrap\js\bootstrap.min.js"></script>

</body>
</html>