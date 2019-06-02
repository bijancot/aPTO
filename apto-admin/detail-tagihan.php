<!DOCTYPE html>
<?php
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
    <title>Document</title>
</head>
    <style>
        *{
            padding:0px;
            margin:0 0%;
        }
        .kotak{
            border:1px solid red;
            background:yellow;
        }
    </style>
<body>
    <h2>INI DETAIL TAGIHAN</h2>
    <?php
        while($yu->fetch()){
            echo "Nomor Tagihan : $idtagihan<br/>
            User Tertagih : $nama<br/>
            Nomor Register User : $iduser<br/>
            Subjek : $subject<br/>
            Keterangan : $deskripsi<br/>
            Tanggal Jatuh Tempo : $jatuhtempo<br/>
            Nominal : <br/>";
            	
	      
            echo "<h2>Rp ". number_format($nominal, 0, ".", ".").",- </h2>";
        }
    ?> 
</body>
</html>