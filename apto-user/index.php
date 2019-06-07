<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
 session_start();
 include_once("../req/database.php");

    $_SESSION['data']['username'];
    $_SESSION['data']['iduser'];
    $nama = $_SESSION['data']['nama'];
    $foto = $_SESSION['data']['foto'];

    if($foto==null){
        $foto = "../img/default.jpg";
    }
?>
<body>
    <h2>Customer Area</h2>
    
    <?php echo "Halo, pengguna ".$nama;?><br/><br/>
    <a href="kelola-tagihan.php">Lihat Tagihan anda</a>
    <?php echo "<img src=\"$foto\"/>";?>
    <a href="logout-user.php">Logout gan!</a>
</body>
</html>