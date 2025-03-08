<?php
session_start();
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // verivikasi password
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $row["name"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["user_id"] = $row["user_id"];
            //  notification selamat datang
            $_SESSION["notification"] = [
                'type' => 'primary',
                'message' => 'selamat datang kembali'
            ];
            header('Location: ../dashboard.php');
            exit();
        } else {
            // password salah
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Username atau password SALAH'
            ];
        }
   
    } else {
        //username tidak ditemukan
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Username atau password SALAH'
        ];
    }
    // Redirect to halaman login if faild
    header('Location: login.php');
    exit();
}
$conn->close();
?>