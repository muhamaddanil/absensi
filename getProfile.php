<?php
if (isset($_SERVER["HTTP_ORIGIN"])) {
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Max-Age: 86400"); // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {

	if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
		header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

	exit(0);
}

require "conn.php";

$id = 'E0 B5 C0 A3';
$sql ="SELECT * FROM siswa WHERE id='".$id."' LIMIT 1;";
// $sql ="SELECT * FROM siswa ;";
$result = mysqli_query($conn, $sql);
$response = array();

while($row = mysqli_fetch_array($result)){
	array_push($response, array(
		"id"=>$row[0],
		"nama"=>$row[1],
		"kelas"=>$row[2],
		"jenis_kelamin"=>$row[3],
	));
}

echo json_encode($response);
mysqli_close($conn)

?>
