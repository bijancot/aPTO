<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
$id = $_GET['iduser'];
require_once("../req/database.php");

$ko = $mysqli->prepare("SELECT idtagihan,iduser,subject,deskripsi,jatuhtempo,nominal from apto_tagihan where iduser=?");
$ko->bind_param('s',$id);
$ko->execute();
$ko->bind_param($idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal);

$a = md5("bijan2089");
echo $a;
?>
<body>
    <table>
        <thead>
            <tr>
                <td>ID TAGIHAN</td>
            </tr>
        </thead>
    </table>
</body>
</html>