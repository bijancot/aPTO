<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../req/session_check.php");

$nama = $_SESSION['data']['nama'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ADMIN AREA</h1>
    <h3>Hello admin <?php echo $nama?></h3>

    <h3>Menu yang tersedia : </h3>
        <a href="kelola.php">Kelola Tagihan</a><br/>
        <a href="logout-admin.php">Logout</a>
</body>
</html>