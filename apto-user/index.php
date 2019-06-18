<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php

echo $_COOKIE['message'];
unset($_COOKIE['message']);
setcookie('message', null, -1, '/');

session_start();
include_once("../req/session_check.php");
include_once("valid-user.php");

    $nama = $_SESSION['data']['nama'];
    $foto = $_SESSION['data']['foto'];

    if($foto==null){
        $foto = "../img/default.jpg";
    }
?>
<body>
    <h2>Customer Area</h2>
    
    <?php echo "Halo, pengguna ".$nama;?><br/><br/>
    <a href="kelola-tagihan.php">Lihat Tagihan anda</a><br/>
    <a href="detail-tagihan.php">Bayar Tagihan anda</a>
    <a href="logout-user.php">Logout gan!</a>
</body>
</html>