<?php
session_start();
session_destroy();
header("Location: login.php");
 // Penting: Keluar dari skrip setelah pengalihan header
?>
