<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../req/bulma/css/bulma.min.css">
    <title>Document</title>
</head>
<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$id =$_GET['idtagihan'];
$yo = $mysqli->prepare("SELECT a.idtagihan,a.subject,a.deskripsi,a.nominal,a.jatuhtempo,b.iduser,b.nama from apto_tagihan a join apto_user b on a.iduser=b.iduser where a.idtagihan=?");
$yo->bind_param('s',$id);
$yo->execute();
$yo->bind_result($idtagihan,$subject,$deskripsi,$nominal,$jatuhtempo,$iduser,$nama);

while($yo->fetch()){
    $hasil = array('idtagihan'=>$idtagihan,
    'subject'=>$subject,
    'deskripsi'=>$deskripsi,
    'nominal'=>$nominal,
    'jatuhtempo'=>$jatuhtempo,
    'iduser'=>$iduser,
    'nama'=>$nama);
}
?>
<body>
    <div class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-fifth">
                    </div>
                    <div class="column is-three-fifth">
                    <div class="level">
                <div class="level-left">
                    <div class="level-items">
                    <a href="kelola.php" class="button is-normal is-info">Kembali ke halaman sebelumnya</a>
                    </div>
                </div>
                <div class="level-right">
                <div class="level-items">
                    <a href="logout-admin.php" class="button is-normal is-danger">Log Out</a>
                    </div>
                </div>
            </div>
                        <div class="box">
                            <h2 class="title is-3">Edit Tagihan</h2>
                            <div class="columns">
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Id Tagihan</label>
                                        <div class="control">
                                        <input type="text" value="<?php echo $hasil['idtagihan']?>" name="idtagihan" readonly><br/>
                                        </div>
                                        <p class="help">This is a help text</p>
                                    </div>
                                    <div class="columns">
                                        <div class="column is-half">
                                        <div class="field">
                                            <label class="label">jatuh Tempo</label>
                                            <div class="control">
                                            <input type="date" name="jatuhtempo" value="<?php echo $hasil['jatuhtempo']?>" required><br/>
                                            </div>
                                            <p class="help">This is a help text</p>
                                        </div>
                                        </div>
                                        <div class="column is-half">
                                        <div class="field">
                                                <label class="label">User Tertagih</label>
                                                <div class="control">
                                                <select name="iduser" required>
                                                
                                                <?php
                                                require_once("../req/database.php");

                                                $lev=2;
                                                $iduse="dadasd";
                                                $tu = $mysqli->prepare("SELECT iduser,nama FROM apto_user where level=? and iduser!=?");
                                                $tu->bind_param('ss',$lev,$iduse);
                                                $tu->execute();
                                                $tu->bind_result($iduser,$nama);

                                                    while($tu->fetch()){
                                                        if($iduser==$hasil['iduser']){
                                                            echo "<option value=\"$iduser\" selected>$nama</option>";
                                                        }
                                                        else{
                                                            echo "<option value=\"$iduser\">$nama</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                                </div>
                                                <p class="help">This is a help text</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Nominal Tagihan</label>
                                        <div class="control">
                                        <input type="number" name="nominal" placeholder="nominal tagihan" pattern="[0-9]" value="<?php echo $hasil['nominal']?>" required><br/>
                                        </div>
                                        <p class="help">This is a help text</p>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Subject Tagihan</label>
                                        <div class="control">
                                        <input type="text" placeholder="subject tagihan" name="subject" value="<?php echo $hasil['subject']?>" required><br/>
                                        </div>
                                        <p class="help">This is a help text</p>
                                    </div>
                                    <div class="field">
                                        <label class="label">Deskripsi Tagihan</label>
                                        <div class="control">
                                        <textarea name="deskripsi" class="textarea is-normal" placeholder="deskripsi ada di sini" cols="20" rows="4" <?php echo $hasil['deskripsi']?> required><?php echo $hasil['deskripsi']?> </textarea><br/>
                                        </div>
                                        <p class="help">This is a help text</p>
                                    </div>
                                </div>
                            </div>
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <input type="submit" class="button is-info" value="Edit Data" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="cancel" class="button button is-warning" onclick="location.href='kelola.php'">
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
<form action="proses.php" method="POST">  
    </form>
</body>
</html>