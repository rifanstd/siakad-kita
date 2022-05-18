<?php 
// require files
require 'functions.php';

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Booststrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<title>Halaman Register</title>
</head>
<body>
	<!-- register -->
	<div class="container mt-5" style="max-width: 500px;">
		<div class="row text-center">
			<div class="col">
				<h1>Register</h1>
			</div>
		</div>
		<div class="row">
			<form action="" method="post">
				<div class="mb-3">
					<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Inputkan username anda!">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Inputkan password anda!">
					<div class="form-text">Password must be at least 8 characters!</div>
				</div>
				<div class="mb-3">
					<label for="confirm-password" class="form-label">Confirm Password</label>
					<input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Konfirmasi Password anda!">
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" class="btn btn-success" name="register">Register</button>
					</div>
					<div class="col-md d-flex justify-content-end align-self-center">
						<a href="login.php" style="text-decoration: none; color: #198754;">Sudah memiliki akun?</a>
					</div>
				</div> 
			</form>
		</div>
	</div>
	<!-- end of register -->

	<!-- execute -->
	<div class="container text-center">
		<div class="row">
			<div class="col-md">
				<?php if (isset($_POST["register"])) { ?>
					<?php if (register($_POST) > 0) { ?>
						<p style="color: green; font-weight: bold;">Registrasi berhasil. Silahkan klik disini untuk Login.</p>
					<?php } elseif (register($_POST) === 0) { ?>
						<span style="color: red; font-weight: bold;">Username anda sudah digunakan pengguna lain.</span><br>
						<span style="color: red; font-weight: bold;">Silahkan gunakan username yang lain!</span>
					<?php } elseif (register($_POST) === -1) { ?>
						<p style="color: red; font-weight: bold;">Password harus terdiri dari minimal 8 karakter!</p>
					<?php } elseif (register($_POST) === -2) { ?>
						<p style="color: red; font-weight: bold;">Konfirmasi password anda tidak sama dengan password anda. Harap periksa kembali!</p>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- end of execute -->


	<!-- Javascript Bootstrap -->
	<script src="bootstrap\js\bootstrap.min.css"></script>
</body>
</html>