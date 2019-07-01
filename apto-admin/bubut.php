<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");


$iduser = $_GET['iduser'];
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
$iduser = $_GET['iduser'];
$kol = $mysqli->prepare("SELECT nama from apto_user where iduser=?");
$kol->bind_param('s',$iduser);
$kol->execute();
$kol->bind_result($nama);

while($kol->fetch()){
    $nom=$nama;
}
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
<body>
  
    <form action="proses.php" method="POST">
        <input type="hidden" name="iduser" value="<?php echo $iduser?>">
        <div class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-fifth" ></div>
                    <div class="column is-three-fifth">
                    <div class="level">
                <div class="level-left">
                    <div class="level-items">
                    <a href="kelola-user.php" class="button is-normal is-info">Kembali ke halaman kelola user</a>
                    </div>
                </div>
                <div class="level-right">
                <div class="level-items">
                    <a href="logout-admin.php" class="button is-normal is-danger">Log Out</a>
                    </div>
                </div>
            </div>
                        <div class="box">
                        <h1 class="title is-3">Buat Tagihan sekarang</h1>
                            <div class="columns">
                                <div class="column is-half">
                                <div class="field">
                                        <label class="label">Nomor Tagihan</label>
                                        <div class="control">
                                        <input type="text" value="<?php echo $idtagihan?>" name="idtagihan" readonly class="input">
                                        <p class="help">Id Tagihan bersifat dinamis</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">User Tertagih</label>
                                        <div class="control">
                                            <input class="input" readonly value="<?php echo $nom?>">
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="column is-half">
                                            <div class="field">
                                                <label class="label">Jatuh Tempo</label>
                                                <div class="control">
                                                <input type="date" name="jatuhtempo" required class="input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-half">
                                            <div class="field">
                                                <label class="label">Nominal Tagihan</label>
                                                <div class="control">
                                                <input type="number" name="nominal" placeholder="nominal tagihan" class="input" pattern="[0-9]" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                <div class="field">
                                        <label class="label">Perihal Tagihan</label>
                                        <div class="control">
                                        <input type="text" placeholder="subject tagihan" name="subject" class="input" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Deskripsi Tagihan</label>
                                        <div class="control">
                                        <textarea name="deskripsi" placeholder="deskripsi ada di sini" cols="20" rows="4" required class="textarea"></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" value="Buat Tagihan" class="button is-normal is-info" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button is-normal is-warning" onclick="location.href='kelola-user.php'" value="cancel">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-one-fifth"></div>
                </div>
            </div>
        </div>
    </div>
       
    </form>
</body>
</html>