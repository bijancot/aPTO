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
include_once("../req/session_check.php");
include("../req/database.php");
include_once("valid-user.php");

$id = $_SESSION['data']['iduser'];
$nom = $_SESSION['data']['nama'];


$ko = $mysqli->prepare("SELECT count(*) from apto_tagihan a left join apto_pembayaran b on a.idtagihan=b.idtagihan where iduser=?");
$ko->bind_param('s',$id);
$ko->execute();
$ko->bind_result($hitung);

?>
<body>
    <table border="1">
        <thead>
            <tr>
                <td>ID TAGIHAN</td>
                <td>SUBJEK TAGIHAN</td>
                <td>USER TERTAGIH</td>
                <td>DESKRIPSI TAGIHAN</td>
                <td>NOMINAL</td>
                <td>OPSI</td>
                <td>STATUS</td>
            </tr>
        </thead>
        <tbody>
            <?php
  
                while($ko->fetch()){
                    if($hitung>=1){
                        include("../req/database.php");
                        $v = $mysqli->prepare("SELECT a.idtagihan,a.iduser,a.subject,a.deskripsi,a.jatuhtempo,a.nominal,b.status from apto_tagihan a left join apto_pembayaran b on a.idtagihan=b.idtagihan where a.iduser=?");
                        $v->bind_param('s',$id);
                        $v->execute();
                        $v->bind_result($idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal,$status);

                        while($v->fetch()){
                            if($status==1){
                                $kond="Dalam proses";
                                $hoho = " - ";
                            }else if($status==2){
                                $kond="Tagihan diterima";
                                $hoho = " - ";
                            }else if($status==0){
                                $kond="Belum dibayar";
                                $hoho = "<a href=\"bayar.php?idtagihan=$idtagihan\"/>Bayar Tagihan</a>";
                            }else if($status==3){
                                $kond="Pembayaran ditolak";
                                $hoho = "<a href=\"bayar.php?idtagihan=$idtagihan\"/>Bayar Tagihan</a>";
                            }
                            echo "
                        <tr>
                            <td>$idtagihan</td>
                            <td>$subject</td>
                            <td>$iduser / $nom</td>
                            <td>$deskripsi</td>
                            <td>$nominal</td>
                            <td><a href=\"detail-tagihan.php\"/>Detail Tagihan<a/> | $hoho</td>
                            <td>$kond</td>
                        </tr>";}
                    }else if($hitung==0){
                        include("../req/database.php");
                        $o = $mysqli->prepare("SELECT idtagihan,iduser,subject,deskripsi,jatuhtempo,nominal from apto_tagihan where iduser=?");
                        $o->bind_param('s',$id);
                        $o->execute();
                        $o->bind_result($idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal);

                        while($o->fetch()){
                            echo "
                        <tr>
                            <td>$idtagihan</td>
                            <td>$subject</td>
                            <td>$iduser / $nom</td>
                            <td>$deskripsi</td>
                            <td>$nominal</td>
                            <td><a href=\"detail-tagihan.php\"/>Detail Tagihan<a/> | <a href=\"bayar.php?idtagihan=$idtagihan\"/>Bayar Tagihan</a></td>
                            <td>Belum terbayar</td>
                        </tr>";
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>