<?php

$param = $_POST['submit'];

if($param = "Masukkan Data"){
    require_once("../req/database.php");

    $idd = "kolo";
    $my = $mysqli->prepare("INSERT INTO apto_tagihan(idtagihan,iduser,subject,deskripsi,jatuhtempo,nominal) VALUES(?,?,?,?,?,?)");
    $my->bind_param('ssssss',$idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal);
    $idtagihan = $_POST['idtagihan'];
    $iduser = $_POST['iduser'];
    $subject = $_POST['subject'];
    $deskripsi = $_POST['deskripsi'];
    $jatuhtempo = $_POST['jatuhtempo'];
    $nominal = $_POST['nominal'];
    $my->execute();

    header( "refresh:2;url=index.php" );
}

?>