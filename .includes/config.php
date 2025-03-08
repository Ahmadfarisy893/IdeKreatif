<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "ideKreatif";
// membuat koneksi ke database menggunakan mysql
$conn = mysqli_connect($host, $username, $password, $database);

// cek apakah berhasil terkoneksi
if ($conn->connect_error) {
    //jika gagal akan menampilkan pesan error
    die("Database gagal terkoneksi: " . $conn->connect_error);

}
?>