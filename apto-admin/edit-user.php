<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$lev='2';
$ge = $_GET['iduser'];
$ku = $mysqli->prepare("SELECT iduser,nama,email,alamat,notelp,jk,username FROM apto_user where level=? and iduser=?");
$ku->bind_param('ss',$lev,$ge);
$ku->execute();
$ku->bind_result($iduser,$nama,$email,$alamat,$notelp,$jk,$username);
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
while($ku->fetch()){
?>
    <form action="proses.php" method="POST">
    id user : <?php echo $iduser?><br/><br/>
    nama user :<br/><br/>
    <input name="namauser" type="text" value="<?php echo $nama?>" required><br/>
    email :<br/><br/>
    <input name="email" type="text" value="<?php echo $email?>" required><br/><br/>
    notelp :<br/>
    +62 <input name="notelp" type="text" value="<?php echo $notelp?>" required><br/><br/>
    jk :<br/>
    <input type="radio" name="jk" value="L" id="laki"/><label for="laki">Laki-Laki</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="jk" value="P" id="perempuan"/><label for="perempuan">Perempuan</label><br/><br/>
    username :<br/>
    <input name="username" type="text" value="<?php echo $username?>" required><br/><br/>
    password :<br/>
    <input name="password" type="password" required><br/><br/>
    alamat :<br/>
    <textarea name="alamat" placeholder="alamat user"  required>
    <?php echo $alamat?>
    </textarea><br/>
    <input type="hidden" name="level" value="2">
    <input type="hidden" name="status" value="1">
    <input type="hidden" name="iduser" value="<?php echo $iduser?>"><br/><br/>
    <input type="submit" name="submit" value="Update User">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" value="cancel" onclick="location.href = 'kelola-user.php';"/>
    </form>
<?php }?>
</body>
</html>