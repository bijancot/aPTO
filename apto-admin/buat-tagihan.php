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
    <link rel="stylesheet" href="../req/bulma/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <form action="proses.php" method="POST">
    <div class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth"></div>
                <div class="column is-three-fifth">
                <div class="level">
                <div class="level-left">
                    <div class="level-items">
                    <a href="kelola.php" class="button is-normal is-info">Kembali ke halaman kelola user</a>
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
                                    <label class="label">Id Tagihan</label>
                                    <div class="control">
                                    <input type="text" value="<?php echo $idtagihan?>" name="idtagihan" class="input" readonly>
                                    <p class="help">Id tagihan bersifat dinamis</p>
                                    </div>    
                                </div>
                                <div class="columns">
                                    <div class="column is-half">
                                    <div class="field">
                                        <label class="label">User Tertagih</label>
                                        <div class="control">
                                            <div class="select">
                                            <select name="iduser" class= required>
                                                <?php
                                                while($qu->fetch()){
                                                    echo "<option value=\"$iduser\">".$nama."</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>    
                                    </div>
                                    </div>
                                    <div class="column is-half">
                                        <div class="field">
                                            <label class="label">Jatuh Tempo</label>
                                            <div class="control">
                                            <input type="date" name="jatuhtempo" class="input" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="field">
                                        <label class="label">Nominal Tagihan</label>
                                        <div class="control">
                                        <input type="number" name="nominal" placeholder="nominal tagihan" class="input" pattern="[0-9]" required>
                                        </div>
                                    </div>
                                    <br/>
                                    <input type="submit" class="button is-normal is-info" value="Masukkan Data" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" class="button is-normal is-warning" yvalue="cancel" onclick="location.href='kelola-user.php'">
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                <label class="label">Perihal Tagihan</label>
                                    <div class="control">
                                    <input type="text" class="input" placeholder="subject tagihan" name="subject" required>
                                    </div>
                                </div>
                                <div class="field">
                                <label class="label">Deskripsi Tagihan</label>
                                    <div class="control">
                                    <textarea name="deskripsi" placeholder="deskripsi ada di sini" cols="20" rows="4" class="textarea" required></textarea>
                                    </div>
                                </div>
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