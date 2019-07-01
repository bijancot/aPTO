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
                        <div class="box">
                            <h2 class="title is-3">Buat User</h2>
                            <div class="columns">
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Id User</label>
                                        <div class="control">
                                        <input class="input" type="text" value="<?php echo $iduser?>" name="idtagihan" readonly><br/>
                                        </div>
                                        <p class="help">This is a help text</p>
                                    </div>
                                    <div class="field">
                                        <label class="label">Nama User</label>
                                        <div class="control">
                                        <input class="input" name="namauser" type="text" required><br/>
                                        </div>
                                        <p class="help">This is a help text</p>
                                    </div>
                                    <div class="field">
                                        <label class="label">Email</label>
                                        <div class="control">
                                        <input class="input" name="email" type="text" required>
                                        </div>
                                        <p class="help">This is a help text</p>
                                    </div>
                                <div class="field">
                                    <label class="label">Alamat</label>
                                    <div class="control">
                                    
                                    <textarea name="alamat" class="textarea" required>
                                    </textarea>
                                    </div>
                                </div>

                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Username</label>
                                        <div class="control">
                                        <input class="input" name="username" type="text" required>
                                        <p class="help">This is a help text</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Password</label>
                                        <div class="control">
                                        <input class="input" name="password" type="password" required>
                                        <p class="help">This is a help text</p>
                                        </div>
                                    </div>
                                    <label class="label">No. Telp</label>
                                    <div class="field has-addons">
                                        <p class="control">
                                            <a class="button is-static">
                                            +62
                                            </a>
                                        </p>
                                        <p class="control">
                                        <input class="input" name="notelp" type="text" required>
                                    </div>
                                        </p>
                                        <div class="field">
                                <label class="label">Jenis Kelamin</label>
                                <div class="control">
                                <label class="radio">
                                    <input type="radio" name="jk" value="L" id="laki" <?php if($jk=="L"){echo "checked=\"checked\"";}?>/>
                                    Laki - Laki
                                </label>
                                <label class="radio">
                                <input type="radio" name="jk" value="P" id="perempuan" <?php if($jk=="P"){echo "checked=\"checked\"";}?>/>
                                Perempuan
                                </label>
                                </div>
                            </div>
                                <input type="hidden" name="level" value="2">
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" name="iduser" value="<?php echo $iduser?>"><br/><br/>
                                <input type="submit" name="submit" value="Tambahkan User" class="button is-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="reset" value="cancel" onclick="location.href='kelola-user.php'" class="button is-warning"/>
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