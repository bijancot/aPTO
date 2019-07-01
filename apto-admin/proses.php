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
}else if($param=="Buat Tagihan"){
    require_once("../req/database.php");

    $mee = $mysqli->prepare("INSERT INTO apto_tagihan(idtagihan,iduser,subject,deskripsi,jatuhtempo,nominal) VALUES(?,?,?,?,?,?)");
    $mee->bind_param('ssssss',$idtagihan,$iduser,$subject,$deskripsi,$jatuhtempo,$nominal);
    
    $idtagihan = $_POST['idtagihan'];
    $iduser = $_POST['iduser'];
    $subject = $_POST['subject'];
    $deskripsi = $_POST['deskripsi'];
    $jatuhtempo = $_POST['jatuhtempo'];
    $nominal = $_POST['nominal'];
    $mee->execute();
    header( "refresh:2; url=kelola-user.php" );
}else if($param== "Tambahkan User"){
    require_once("../req/database.php");

    $tky = $mysqli->prepare("INSERT INTO apto_user(iduser,nama,email,alamat,notelp,jk,username,password,level,status) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $tky->bind_param('ssssssssss',$iduser,$nama,$email,$alamat,$notelp,$jk,$username,$password,$level,$status);
    $iduser = $_POST['iduser'];
    $nama = $_POST['namauser'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $jk = $_POST['jk'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    $tky->execute();
    header( "refresh:2; url=kelola-user.php" );
}else if($paramget == "hapus user"){
    require_once("../req/databasepdo.php");
    echo "hapus";

    $my = $pdo->prepare("DELETE FROM apto_user where iduser=:idusers");
    echo $iduser = $_GET['iduser'];
    $my->bindParam(":idusers",$_GET['iduser']);
    $my->execute();

    header( "refresh:2; url=kelola-user.php" );
}else if($param == "Update User"){
    require_once("../req/database.php");

    $mo = $mysqli->prepare("UPDATE apto_user set nama=?, email=?, alamat=?, notelp=?, jk=? ,username=?,password=? where iduser=? and level=? and status=?");
    $mo->bind_param('ssssssssss',$nama,$email,$alamat,$notelp,$jk,$username,$password,$iduser,$level,$status);
    
    $iduser = $_POST['iduser'];
    $nama = $_POST['namauser'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $jk = $_POST['jk'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    $status = $_POST['status'];

    $mo->execute();

    header( "refresh:2; url=kelola-user.php" );
}

?>