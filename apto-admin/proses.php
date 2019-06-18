<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

$param = $_POST['submit'];
$paramget = $_GET['submit'];

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

    header( "refresh:2; url=index.php" );
    
}if($param = "Edit Data"){
    require_once("../req/database.php");

    $mo = $mysqli->prepare("UPDATE apto_tagihan set iduser=?, subject=?, deskripsi=?, jatuhtempo=?, nominal=? where idtagihan=?");
    $mo->bind_param('ssssss',$iduser,$subject,$deskripsi,$jatuhtempo,$nominal,$idtagihan);
    
    $iduser = $_POST['iduser'];
    $subject = $_POST['subject'];
    $deskripsi = $_POST['deskripsi'];
    $jatuhtempo = $_POST['jatuhtempo'];
    $nominal = $_POST['nominal'];
    $idtagihan = $_POST['idtagihan'];
    $mo->execute();

    header( "refresh:2; url=index.php" );
}if($paramget = "Hapus"){
    require_once("../req/database.php");
    echo "hapus";

    $my = $mysqli->prepare("DELETE FROM apto_tagihan where idtagihan=?");
    $idtagihan = $_GET['idtagihan'];
    $my->bind_param('s',$idtagihan);
    $my->execute();

    header( "refresh:2; url=index.php" );
}

?>