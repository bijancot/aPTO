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
include_once("../req/database.php");
include_once("valid-user.php");

$id = $_SESSION['data']['iduser'];
$nom = $_SESSION['data']['nama'];
require_once("../req/database.php");

$ko = $mysqli->prepare("SELECT a.idtagihan,a.iduser,a.subject,a.deskripsi,a.jatuhtempo,a.nominal,b.status from apto_tagihan a join apto_pembayaran b on a.idtagihan=b.idtagihan where iduser=?");
$ko->bind_param('s',$id);
$ko->execute();
$ko->bind_result($idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal,$status);

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
                    if($status==0){
                        $kond="Proses";
                    }else if($status==1){
                        $kond="Pembayaran Valid";
                    }
                    echo "
                <tr>
                    <td>$idtagihan</td>
                    <td>$subject</td>
                    <td>$iduser / $nom</td>
                    <td>$deskripsi</td>
                    <td>$nominal</td>
                    <td><a href=\"detail-tagihan.php\"/>Detail Tagihan<a/> | <a href=\"bayar.php?idtagihan=$idtagihan\"/>Bayar Tagihan</a></td>
                    <td>$kond</td>
                </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>