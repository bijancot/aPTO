<?php
include_once("../req/database.php");

session_start();
if($_SESSION['data']==null){
    setcookie("message","belum login, login terlebih dahulu",time()+30,"/");
    header("Location:../index.php");
}

$id="edasdasdf";
$k = $mysqli->prepare("select idtagihan,subject,nominal,jatuhtempo from apto_tagihan where idtagihan!=?");
$k->bind_param('s',$id);
$k->execute();
$k->bind_result($idtagihan,$subject,$nominal,$jatuhtempo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        padding:0px;
        margin : 0 0%;
    }
</style>
<body>
    <a href="buat-tagihan.php">Buat Tagihan</a>
    <table border="1">
    <thead>
        <tr>
            <td>ID Tagihan</td>
            <td>Subjek</td>
            <td>nominal</td>
            <td>jatuhtempo</td>
            <td>opsi</td>
        </tr>
    </thead>
    <tbody>
    <?php
    while($k->fetch()){
        $originalDate = $jatuhtempo;
        $jatuhtempo = date("d-m-Y", strtotime($originalDate));
        echo "
        <tr>
            <td>$idtagihan</td>
            <td>$subject</td>
            <td>$nominal</td>
            <td>$jatuhtempo</td>
            <td><a href=\"detail-tagihan.php?idtagihan=$idtagihan\">Detail Tagihan</a> | <a href=\"edit-tagihan.php?idtagihan=$idtagihan\">Edit Tagihan</a> | <a href=\"proses.php?submit=Hapus&idtagihan=$idtagihan\">Hapus Tagihan </a></td>
        </tr>";
    }
    ?>
    </tbody>
    </table>
</body>
</html>