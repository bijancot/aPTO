<!DOCTYPE html>
<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$id = $_GET['idtagihan'];

$yu = $mysqli->prepare("SELECT a.idtagihan,a.subject,a.deskripsi,a.nominal,a.jatuhtempo,b.iduser,b.nama from apto_tagihan a join apto_user b on a.iduser=b.iduser where a.idtagihan=?");
$yu->bind_param('s',$id);
$yu->execute();
$yu->bind_result($idtagihan,$subject,$deskripsi,$nominal,$jatuhtempo,$iduser,$nama);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../req/bulma/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <div class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-fifth"></div>
                    <div class="column is-three-fifth">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-items">
                                <a href="kelola.php" class="button is-info">Kembali ke halaman sebelumnya</a>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-items">
                                <a href="logout-admin.php" class="button is-danger">Log Out</a>
                                </div>
                            </div>
                    </div>
                        <div class="box">
                        <h2 class="title is-4">INI DETAIL TAGIHAN</h2>
    <?php
        while($yu->fetch()){
            echo "Nomor Tagihan : $idtagihan<br/>
            User Tertagih : $nama<br/>
            Nomor Register User : $iduser<br/>
            Subjek : $subject<br/>
            Keterangan : $deskripsi<br/>
            Tanggal Jatuh Tempo :";echo date("d-m-Y", strtotime($jatuhtempo));echo "<br/>
            Nominal : <br/>";
            echo "<h2 class=\"subtitle is-3\">Rp ". number_format($nominal, 0, ".", ".").",- </h2>";
        }
    ?> 
                        </div>
                    </div>
                    <div class="column is-one-fifth"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>