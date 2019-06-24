<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$id = $_GET['idtagihan'];
$pem = $_GET['idpembayaran'];
$yolo = $mysqli->prepare("SELECT a.idpembayaran,a.idtagihan,a.tglbayar,a.bankasal,a.banktujuan,a.nominalbayar,a.buktibayar,a.status,b.subject,b.nominal,c.nama FROM apto_pembayaran a join apto_tagihan b on a.idtagihan=b.idtagihan join apto_user c on b.iduser=c.iduser where a.idtagihan=? and a.idpembayaran=?");
$yolo->bind_param('ss',$id,$pem);
$yolo->execute();
$yolo->bind_result($idpembayaran,$idtagihan,$tglbayar,$bankasal,$banktujuan,$nominalbayar,$buktibayar,$status,$subject,$nominal,$nama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    while($yolo->fetch()){
    echo "<h2>Pembayaran Untuk Tagihan  $subject ($idtagihan)</h2>
    <h4>$subject</h4>
    <h4>Tagihan untuk pelanggan $nama</h4>
    Besar Tagihan : Rp "; echo number_format($nominal, 0, ".", ".").",-<br/><br/>";
    echo "<h2>Bukti Pembayaran Tagihan $idtagihan</h2>
    Tanggal Bayar : $tglbayar<br/>
    Bank asal : $bankasal</br>
    Bank yang dituju : $banktujuan<br/>
    Nominal yang dibayar : Rp "; echo number_format($nominalbayar, 0, ".", ".").",-<br/>";
    echo "Bukti Bayar :<br/><br/>
    <img src=\"/apto-user/$buktibayar\">";
    }
    ?>
    <form action="proses.php" method="POST">
        <input type="hidden" value="<?php echo $idpembayaran?>" name="idpembayaran">
        <input type="hidden" value="2" name="status">
        <input type="submit" value="Validasi Pembayaran" name="submit">
    </form>
    <form action="proses.php" method="POST">
        <input type="hidden" value="<?php echo $idpembayaran?>" name="idpembayaran">
        <input type="hidden" value="3" name="status">
        <input type="submit" value="Tolak Pembayaran" name="submit">
    </form>
</body>
</html>
