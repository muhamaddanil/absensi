<?php
require_once('conn.php');

$id = $_REQUEST['id'];
$nama = $_REQUEST['nama'];
$kelas = $_REQUEST['kelas'];
$jenis_kelamin = $_REQUEST['jenis_kelamin'];
// insert comment
$query = mysqli_query($conn, "INSERT INTO absensi (id, nama, kelas, jenis_kelamin)
     VALUES ('$id', '$nama', '$kelas', '$jenis_kelamin') ");

if ($query) {
    echo json_encode(array('response' => 'success'));
} else {
    echo json_encode(array('response' => 'failed'));
}
