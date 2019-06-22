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

$ko = $mysqli->prepare("SELECT count(b.idpembayaran) from apto_tagihan a join apto_pembayaran b on a.idtagihan=b.idtagihan where iduser=?");
$ko->bind_param('s',$iduser1);
$ko->execute();
$ko->bind_result($hitung);

while($ko->fetch()){
    $hotong = $hitung;
}
$ko->close();
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

        if($hotong>=1){
            include_once("../req/database.php");
            $yu = $mysqli->prepare("SELECT a.idtagihan,a.iduser,a.subject,a.deskripsi,a.jatuhtempo,a.nominal,b.status from apto_tagihan a left join apto_pembayaran b on a.idtagihan=b.idtagihan where a.idtagihan!=? and a.iduser=?");
            $yu->bind_param('ss',$idd,$iduser1);
            $yu->execute();
            $yu->bind_result($idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal,$status);
            $i =0;
            while($yu->fetch()){       
                if($status==1){
                    $yolo = "Sedang Diverifikasi";
                    $huft = "";
                }else if($status==2){
                    $yolo = "Tagihan Terbayar";
                    $huft = "";
                }else if($status==NULL){
                    $yolo = "belum dibayar";
                    $huft = "<a href=\"bayar.php?idtagihan=$idtagihan\">Bayat Tagihan ini</a>";
                }
                echo "
            <div class=\"kotak\">

            <h3>status : $yolo</h3>
            ID tagihan : $idtagihan</br>
            User : $iduser / $nama</br>
            Perihal Tagihan : $subject<br/>
            Keterangan Tagihan : $deskripsi</br>
            Jatuh Tempo : $jatuhtempo</br>
            Nominal :";
    
            echo "<h2>Rp ". number_format($nominal, 0, ".", ".").",- </h2>
    
            </div>";
            }
                
        }else if($hotong==0){
            $o = $mysqli->prepare("SELECT idtagihan,iduser,subject,deskripsi,jatuhtempo,nominal FROM apto_tagihan WHERE iduser=?");
            $o->bind_param('s',$iduser1);
            $o->execute();
            $o->bind_result($idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal);

                while($o->fetch()){
                        echo "
                    <div class=\"kotak\">
                    <h3>status : Belum Terbayar</h3>
                    ID tagihan : $idtagihan</br>
                    User : $iduser / $nama</br>
                    Perihal Tagihan : $subject<br/>
                    Keterangan Tagihan : $deskripsi</br>
                    Jatuh Tempo : $jatuhtempo</br>
                    Nominal :";
            
                    echo "<h2>Rp ". number_format($nominal, 0, ".", ".").",- </h2>
            
                    <a href=\"bayar.php?idtagihan=$idtagihan\">Bayat Tagihan ini</a>
                    </div>";
                }
           }
       
    ?>
</body>
</html>