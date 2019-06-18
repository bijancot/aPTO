<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");


$id = "yoloo";
$kolo = $mysqli->prepare("SELECT count(*) from apto_tagihan where idtagihan!=?");
$kolo->bind_param('s',$id);
$kolo->execute();
$kolo->bind_result($count);

$num=0;
while($kolo->fetch()){
    $num =  $count;
    $num +=1;
}
if($num<=9){
    $idtagihan = "TGH000".$num;
}else if($num>9 && $num<=99){
    $idtagihan = "TGH00".$num;
}else if($num>99 && $num<=999){
    $idtagihan = "TGH0".$num;
}else if($num>999){
    $idtagihan = "TGH".$num;
}
include_once("../req/database.php");
$isu = "nono";
$qu =$mysqli->prepare("SELECT iduser,nama from apto_user where level=2 and iduser!=?");
$qu->bind_param('s',$isu);
$qu->execute();
$qu->bind_result($iduser,$nama);
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
    <h1>Buat Tagihan sekarang</h1>
    <form action="proses.php" method="POST">
        <p>Nomor Tagihan : </p>
        <input type="text" value="<?php echo $idtagihan?>" name="idtagihan" readonly><br/>
        <p>Perihal Tagihan Tagihan : </p>
        <input type="text" placeholder="subject tagihan" name="subject" required><br/>
        <p>Deskripsi Tagihan : </p>
        <textarea name="deskripsi" placeholder="deskripsi ada di sini" cols="20" rows="4" required></textarea><br/>
        <p>User Tertagih</p>
        <select name="iduser" required>
            <?php
            while($qu->fetch()){
                echo "<option value=\"$iduser\">".$nama."</option>";
            }
            ?>
        </select>
        <p>Tanggal Jatuh tempo:</p>
        <input type="date" name="jatuhtempo" required><br/>
        <p>Nominal Tagihan : </p>
        <input type="number" name="nominal" placeholder="nominal tagihan" pattern="[0-9]" required><br/>
        <br/><br/>
        <input type="submit" value="Masukkan Data" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="cancel">
    </form>
</body>
</html>