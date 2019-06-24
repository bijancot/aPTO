<?php
session_start();
include_once("../req/session_check.php");
include_once("valid-admin.php");
include_once("../req/database.php");

echo $param = $_POST['submit'];
$paramget = $_GET['submit'];

echo $idpembayaran = $_POST['idpembayaran'];
echo $status = $_POST['status'];

if($param == "Masukkan Data"){
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
    
}else if($param == "Edit Data"){
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
}else if($paramget == "Hapus"){
    require_once("../req/database.php");
    echo "hapus";

    $my = $mysqli->prepare("DELETE FROM apto_tagihan where idtagihan=?");
    $idtagihan = $_GET['idtagihan'];
    $my->bind_param('s',$idtagihan);
    $my->execute();

    header( "refresh:2; url=index.php" );

}else if($param=="Validasi Pembayaran"){
    require_once("../req/database.php");
    echo "pembayaran diterima";

    
    $mt = $mysqli->prepare("UPDATE apto_pembayaran SET status=? WHERE idpembayaran=?");
    echo $idpembayaran = $_POST['idpembayaran'];
    echo $status = $_POST['status'];
    $mt->bind_param('ss',$status,$idpembayaran);
    $mt->execute();

    header( "refresh:2; url=kelola.php" );

}else if($param=="Tolak Pembayaran"){
    require_once("../req/database.php");
    echo "pembayaran ditolak, akan segera disampaikan ke user";

    $ms = $mysqli->prepare("UPDATE apto_pembayaran SET status=? WHERE idpembayaran=?");
    echo $idpembayaran = $_POST['idpembayaran'];
    echo $status = $_POST['status'];
    $ms->bind_param('ss',$status,$idpembayaran);
    $ms->execute();

    header( "refresh:2; url=kelola.php" );
}

?>