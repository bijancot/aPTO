<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    require_once("../req/database.php");

    $user = "Monicc";
    $iduser = "USR0003";

    $yu = $mysqli->prepare("SELECT iduser,nama,email,alamat,notelp,jk from apto_user where iduser=? and nama=?");
    $yu->bind_param('ss',$iduser,$user);
    $yu->execute();
    $yu->bind_result($idusers,$nama,$email,$alamat,$notelp,$jk);
?>
<body>
    <h2>INI TAGIHAN ANDA</h2>
    
    <?php
        while($yu->fetch()){
            echo "<a href=\"kelola-tagihan.php?iduser=$idusers\">Lihat Tagihan anda</a>";
        }
    ?>
</body>
</html>