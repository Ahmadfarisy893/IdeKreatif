<?php
session_start(); // mulai sesi
session_unset(); // menghapus semua sesi
session_destroy(); // menghancurkan semua sesi sepenuhnya
header('Location: login.php'); // mengarahkan penggunak ke login.php
exit(); // menghentikan scrpit
?>