<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$id="edasdasdf";
$k = $mysqli->prepare("SELECT a.idtagihan,a.subject,a.nominal,a.jatuhtempo,b.status,b.idpembayaran,a.log FROM apto_tagihan a LEFT JOIN apto_pembayaran b on a.idtagihan=b.idtagihan where a.idtagihan!=?");
$k->bind_param('s',$id);
$k->execute();
$k->bind_result($idtagihan,$subject,$nominal,$jatuhtempo,$status,$idpembayaran,$logg);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../req/bulma/css/bulma.min.css">
    <title>Document</title>
</head>
<style>
    *{
        padding:0px;
        margin : 0 0%;
    }
</style>
<body>
    <div class="hero">
        <div class="container">
            <section class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-items">
                    <a href="buat-tagihan.php" class="button is-normal is-info">Buat Tagihan Baru</a><br/><br/>
                    </div>
                </div>
                <div class="level-right">
                <div class="level-items">
                    <a href="logout-admin.php" class="button is-normal is-danger">Log Out</a><br/><br/>
                    </div>
                </div>
            </div>
    <table class="table is-bordered is-striped is-hoverable">
    <thead>
        <tr>
            <td>ID Tagihan</td>
            <td>Subjek</td>
            <td>nominal</td>
            <td>jatuhtempo</td>
            <td>opsi</td>
            <td colspan="2">Status</td>
        </tr>
    </thead>
    <tbody>
    <?php
    while($k->fetch()){

        if($status==0){
            $kond = "Belum ada pembayaran";
        }else if($status==1){
            $kond = "<a href=\"validasi-pembayaran.php?idtagihan=$idtagihan&idpembayaran=$idpembayaran\">Pembayaran Menunggu Validasi</a>";
        }else if($status==2){
            $kond = "Pembayaran Telah diverifikasi";
        }else if($status==3){
            $kond = "Pembayaran telah ditolak";
        }
        $originalDate = $jatuhtempo;
        $jatuhtempo = date("d-m-Y", strtotime($originalDate));
        echo "
        <tr>
            <td>$idtagihan</td>
            <td>$subject</td>
            <td>$nominal</td>
            <td>$jatuhtempo</td>
            <td><a href=\"detail-tagihan.php?idtagihan=$idtagihan\">Detail Tagihan</a> | <a href=\"edit-tagihan.php?idtagihan=$idtagihan\">Edit Tagihan</a> | <a href=\"proses.php?submit=Hapus&idtagihan=$idtagihan\">Hapus Tagihan </a></td>
            <td>$kond</td>
            <td>$logg</td>
        </tr>";
    }
    ?>
    </tbody>
    </table>
    <br/>
    <a href="index.php" class="button is-normal is-info">Kembali ke halaman awal admin</a>
            </section>
    </div>
</body>
</html>