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
session_start();
include_once("../req/session_check.php");
include_once("../req/database.php");
include_once("valid-user.php");

$id = "yoloo";
$kolo = $mysqli->prepare("SELECT count(*) from apto_pembayaran where idtagihan!=?");
$kolo->bind_param('s',$id);
$kolo->execute();
$kolo->bind_result($count);

$num=0;
while($kolo->fetch()){
    $num =  $count;
    $num +=1;
}
if($num<=9){
    $idbayar = "PAY000".$num;
}else if($num>9 && $num<=99){
    $idbayar = "PAY00".$num;
}else if($num>99 && $num<=999){
    $idbayar = "PAY0".$num;
}else if($num>999){
    $idbayar = "PAY".$num;
}

$idtagihan = $_GET['idtagihan'];
?>
    <h1>Bayar sekarang</h1>
    <form method="POST" action="bayar-sekarang.php" enctype="multipart/form-data">
    <input type="hidden" name="idtagihan" value="<?php echo $idtagihan?>"/>
    <input type="hidden" name="tglbayar" value="<?php echo date("Y-m-d")?>"/>
    TAGIHAN <?php echo $idtagihan;?> || TANGGAL BAYAR : <?php echo date("d-m-Y");?><br/><br/>

    Nomor Pembayaran :<br/><br/>
    <input type="text" value="<?php echo "$idbayar"?>" name="idpembayaran" readonly/><br/><br/>
    Bank Asal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bank Tujuan : <br/><br/>
    <input type="text" name="bankasal">
    <select name="banktujuan">
        <option value="BRI">BRI</option>
        <option value="BNI">BNI</option>
        <option value="MANDIRI">MANDIRI</option>
    </select><br/><br/>
    Nominal Bayar : <br/><br/>
    <input type="number" name="nominalbayar" placeholder="nominal tagihan" pattern="[0-9]" required><br/><br/>
    Bukti Pembayaran : <br/><br/>
    <input type="file" name="buktibayar" placeholder="Upload foto bukti transfer"><br/><br/>
    <input type="submit" value="Bayar Sekarang" name="submit">
    </form>
</body>
</html>