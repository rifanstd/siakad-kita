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




?>