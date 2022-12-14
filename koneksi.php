<!DOCTYPE html>
<html>
<body>
<?php
    $host= "localhost";
    $user= "root";
    $pass= "";
    $db= "apotekalhuda";
    // Create connection
    $conn = mysqli_connect($host, $user, $pass, $db);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";
    // LAIN KALI JANGAN DI TUTUP DATABASENYA SEBELUM SELESAI WOE -yuzu
?>

</html>