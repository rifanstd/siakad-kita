<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Booststrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<title>Berhasil!</title>
</head>
<body>

	<!-- require files -->
	<?php require 'functions.php'; ?>
	<?php $npm = $_GET['npm']; ?>

	<?php if (deleteData($npm) > 0) : ?>
		<div class="jumbotron pt-5 text-center">
			<h1 class="display-5 text-center">Data Berhasil Di Hapus!</h1>
			<a href="index.php" class="lead fs-5 text-center">Kembali ke halaman Home.</p></a>
			<hr class="my-4">
		</div>
	<?php endif; ?>




	<!-- Javascript Bootstrap -->
	<script src="bootstrap\js\bootstrap.min.css"></script>
</body>
</html>