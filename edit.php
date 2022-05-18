<?php 
// session
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;	
}

// require files
require 'functions.php'; 


// get Npm
$npm = $_GET['npm'];

// get data by npm
$mhs = querySelect("SELECT * FROM mahasiswa WHERE npm = $npm");

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Booststrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<title>Edit Data Mahasiswa</title>
</head>
<body>

	<!-- Title -->
	<div class="jumbotron jumbotron-fluid text-center pt-5">
		<div class="container">
			<h1 class="display-5">Edit Data</h1>
			<p class="lead">Silahkan ubah data mahasiswa.</p>
		</div>
	</div>
	<!-- End of Title -->

	<!-- Form input data mahasiswa -->
	<div class="container-md mb-3">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form action="" method="post">
					<div class="mb-3">
						<label for="npm" class="form-label">Edit NPM</label>
						<input disabled type="number" class="form-control" id="npm" aria-describedby="npm" placeholder="<?php echo $mhs[0]['npm']; ?>">
						<input type="hidden" name="npm" value="<?php echo $mhs[0]['npm']; ?>">
					</div>
					<div class="mb-3">
						<label for="nama" class="form-label">Edit Nama</label>
						<input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" value="<?php echo $mhs[0]['nama']; ?>">
					</div>
					<div class="mb-3">
						<label for="jurusan" class="form-label">Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-select">
							<option value="<?php echo $mhs[0]['jurusan']; ?>" selected hidden><?php echo $mhs[0]['jurusan']; ?></option>
							<option value="Ilmu Komputer">Ilmu Komputer</option>
							<option value="Biologi">Biologi</option>
							<option value="Fisika">Fisika</option>
							<option value="Matematika">Matematika</option>
							<option value="Kimia">Kimia</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="smt" class="form-label">Semester</label>
						<select name="semester" id="smt" class="form-select">
							<option value="<?php echo $mhs[0]['smt']; ?>" selected hidden><?php echo $mhs[0]['smt']; ?></option>
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
					</div>
					<div class="d-flex">
						<button type="submit" name="submit-add" class="btn btn-success me-auto">Simpan</button>
						<a href="index.php" target="_blank">
							<button type="button" class="btn btn-success ms-auto">Lihat Data</button>
						</a>
					</div>
				</form>	
			</div>
		</div>
	</div>
	<!-- End form input data -->

	<!-- Execute data input -->
	<div class="container-md justify-content-center">
		<div class="row-md justify-content-center">
			<div class="col-md text-center">
				<?php
				
				// submit-add button is clicked?
				if (isset($_POST['submit-add'])) {
					// Cek if there is any field that empty
					if (empty($_POST['nama']) || empty($_POST['jurusan']) || empty($_POST['semester'])) {
						echo "<p style='color: red;'><b>Data harus Lengkap ! Gagal mengubah data</b>.</p>";
					}
					else {
						// check there is failed or succesed input data to database
						if (editData($_POST) > 0) {
							echo '<p class="text-center" style="color: green; font-weight: bold;">Data Berhasil diubah</p>';
							echo '
							<form>
							<a href="index.php">
							<button type="button" class="btn btn-primary">Lihat Data</button>
							</a>
							</form>
							';
						}
						else {
							echo '<p class="text-center" style="color: blue; font-weight: bold;">Tidak ada data yang diubah</p>';
							echo '
							<form>
							<a href="index.php">
							<button type="button" class="btn btn-primary">Lihat Data</button>
							</a>
							</form>
							';
						}
					}
				}
				?>
			</div>
		</div>
	</div>
	<!-- End of execute data input -->


</body>
</html>