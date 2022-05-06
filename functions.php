<?php 

// connect to database
$conn = mysqli_connect("localhost", "root", "", "siakad_kita");


// Function Query Select
function querySelect($query){
	global $conn;
	
	$result = mysqli_query($conn, $query);

	$rows = [];

	// Check if table is none data
	if (mysqli_num_rows($result) == 0) {
		return 0;
	}
	else {
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
}


// Function input data
function inputData($data){
	global $conn;
	$nama = htmlspecialchars($data['nama']);
	$jurusan = $data['jurusan'];
	$semester = $data['semester'];

	// sqlInsert
	$sqlInsert = "insert into mahasiswa values('', '$nama', '$jurusan', '$semester')";

	// Query execute (send data to database)
	mysqli_query($conn, $sqlInsert);

	return mysqli_affected_rows($conn);
}


// Function delete data
function deleteData($npm){
	global $conn;

	// sql delete
	$sqlDelete = "DELETE FROM mahasiswa WHERE npm = $npm";
	mysqli_query($conn, $sqlDelete);

	return mysqli_affected_rows($conn);
}



?>