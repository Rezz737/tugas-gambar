<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah username dan password cocok
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    // Cek apakah data pengguna ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Data pengguna valid, set session dan arahkan ke halaman utama
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit; // Pastikan tidak ada output sebelum redirect
    } else {
        // Data pengguna tidak valid, arahkan kembali ke halaman login
        echo "Login gagal. Silakan coba lagi <a href='login.php'>di sini</a>.";
    }
}

// Tutup koneksi database
mysqli_close($db);
?>
