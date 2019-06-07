<!DOCTYPE html>
<html lang="en">
<?php
include_once("../req/session_check.php");
include_once("../req/database.php");

$idd = "Fsdfsd";
$iduser1=$_SESSION['data']['iduser'];
$yu = $mysqli->prepare("SELECT idtagihan,iduser,subject,deskripsi,jatuhtempo,nominal from apto_tagihan where idtagihan!=? and iduser=?");
$yu->bind_param('ss',$idd,$iduser1);
$yu->execute();
$yu->bind_result($idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    while($yu->fetch()){
        echo $idtagihan;
    }
    ?>
</body>
</html>