<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../req/session_check.php");
include_once("../req/database.php");
include_once("valid-user.php");

$idd = "Fsdfsd";
$iduser1=$_SESSION['data']['iduser'];
$nama = $_SESSION['data']['nama'];
$yu = $mysqli->prepare("SELECT count(a.idtagihan),a.idtagihan,a.iduser,a.subject,a.deskripsi,a.jatuhtempo,a.nominal,b.status from apto_tagihan a join apto_pembayaran b on a.idtagihan=b.idtagihan where a.idtagihan!=? and a.iduser=?");
$yu->bind_param('ss',$idd,$iduser1);
$yu->execute();
$yu->bind_result($itung,$idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal,$status);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .kotak{
        border:1px solid red;
        background: yellow;
        width:30%;
        margin-bottom:20px;
        padding:5px;
    }
</style>
<body>
    <?php
    

    while($yu->fetch()){
        if($itung>0){
            if($status==0){
                echo "
            <div class=\"kotak\">
            <h3>SEDANG DIVERIFIKASI</h3>
            ID tagihan : $idtagihan</br>
            User : $iduser / $nama</br>
            Perihal Tagihan : $subject<br/>
            Keterangan Tagihan : $deskripsi</br>
            Jatuh Tempo : $jatuhtempo</br>
            Nominal :";
    
            echo "<h2>Rp ". number_format($nominal, 0, ".", ".").",- </h2>
    
            <a href=\"bayar.php?idtagihan=$idtagihan\">Bayat Tagihan ini</a>
            </div>";
            }else if($status==1){
                echo "tidak ada tagihan atau tagihan sudah terbayar";
            }
        }else if($hitung<1){
            echo "tidak ada tagihan untuk anda";
        }
       
    }
    ?>
</body>
</html>