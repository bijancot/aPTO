<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$ku = "dsd";
$yoo = $mysqli->prepare("SELECT count(iduser) FROM apto_user where iduser!=?");
$yoo->bind_param('s',$ku);
$yoo->execute();
$yoo->bind_result($count);

while($yoo->fetch()){
    $num = $count;
    $num = $num+1;
}

if($num<=9){
    $iduser = "USR000".$num;
}else if($num>9 && $num<=99){
    $iduser = "USR00".$num;
}else if($num>99 && $num<=999){
    $iduser = "USR0".$num;
}else if($num>999){
    $iduser = "USR".$num;
}
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
    <form action="proses.php" method="POST">
    id user : <?php echo $iduser?><br/><br/>
    nama user :<br/><br/>
    <input name="namauser" type="text" required><br/>
    email :<br/><br/>
    <input name="email" type="text" required><br/><br/>
    notelp :<br/>
    +62 <input name="notelp" type="text" required><br/><br/>
    jk :<br/>
    <input type="radio" name="jk" value="L" id="laki" <?php if($jk=="L"){echo "checked=\"checked\"";}?>/><label for="laki">Laki-Laki</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="jk" value="P" id="perempuan" <?php if($jk=="P"){echo "checked=\"checked\"";}?>/><label for="perempuan"">Perempuan</label><br/><br/>
    username :<br/>
    <input name="username" type="text" required><br/><br/>
    password :<br/>
    <input name="password" type="password" required><br/><br/>
    alamat :<br/>
    <textarea name="alamat" required>
    </textarea><br/>
    <input type="hidden" name="level" value="2">
    <input type="hidden" name="status" value="1">
    <input type="hidden" name="iduser" value="<?php echo $iduser?>"><br/><br/>
    <input type="submit" name="submit" value="Tambahkan User">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="reset" value="cancel" onclick="header()"/>
    </form>
</body>
</html>