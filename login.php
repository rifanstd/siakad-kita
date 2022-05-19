<?php 

// require files
require 'functions.php';

session_start();

// cookie cek
if (isset($_COOKIE["key1"]) && isset($_COOKIE["key2"])) {
	$key1 = $_COOKIE["key1"];
	$key2 = $_COOKIE["key2"];

	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$key1'");

	$row = mysqli_fetch_assoc($result);

	// cek cookie dari username dan password
	if ($key2 === hash('sha256', $row["username"])) {
		$_SESSION["login"] = true;
	}
}


// session

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;	
}

?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Booststrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<title>Halaman Login</title>
</head>
<body>

	<!-- Login container -->
	<div class="container mt-5" style="max-width: 500px;">
		<div class="row text-center">
			<div class="col">
				<h1>Login</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md">
				<form action="" method="post">
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" placeholder="Inputkan username anda!">
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Inputkan password anda!">
					</div>
					<div class="mb-3">
						<input type="checkbox" name="remember-me" id="remember-me" class="form-check-input">
						<label for="remember-me" class="form-label ms-1">Remember Me</label>
					</div>
					<div class="row">
						<div class="col-md">
							<button type="submit" class="btn btn-success" name="login">Login</button>
						</div>
						<div class="col-md d-flex justify-content-end align-self-center">
							<a href="register.php" style="text-decoration: underline; color: #198754;">Belum memiliki akun?</a>
						</div>
					</div> 
				</form>
			</div>
		</div>
	</div>
	<!-- end of login -->

	<!-- execute -->
	<div class="container text-center">
		<?php if(isset($_POST["login"])) { ?>
			<?php if(login($_POST) === 0) { ?>
				<p style="color: red; font-weight: bold;">Username yang anda masukkan salah!</p>
			<?php } elseif(login($_POST) === (-1)) { ?>
				<p style="color: red; font-weight: bold;">Password yang anda masukkan salah!</p>
			<?php } else { ?>
				<?php 
				$_SESSION["login"] = true; 
				header("Location: index.php");
				
				// set cookie
				if (isset($_POST["remember-me"])) {
					$data = dataCookie($_POST);
					setcookie('key1', $data[0], time()+3600);
					setcookie('key2', hash('sha256', $data[1]), time()+3600);			
				}
				exit;
				?>
			<?php } ?>
		<?php } ?>	
	</div>
	<!-- end of execute -->


	<!-- Javascript Bootstrap -->
	<script src="bootstrap\js\bootstrap.min.css"></script>
</body>
</html>