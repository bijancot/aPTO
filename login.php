<?php
require_once("req/database.php");
$user=$_POST['username'];
$pass=md5($_POST['password']);

$log = $mysqli->prepare("SELECT count(iduser),iduser,nama,email,alamat,notelp,jk,foto,level,status from apto_user where username=? and password=?");
$log->bind_param('ss',$user,$pass);
$log->execute();
$log->bind_result($huft,$iduser,$nama,$email,$alamat,$notelp,$jk,$foto,$level,$status);

while($log->fetch()){
    $isUser = $huft;    
    $love = $level;
        if($isUser==1){

            session_start();
            $_SESSION['data'] = array(
                "iduser"=>$iduser,
                "nama"=>$nama,
                "username"=>$user,
                "email"=>$alamat,
                "alamat"=>$alamat,
                "notelp"=>$notelp,
                "jk"=>$jk,
                "foto"=>$foto,
                "level"=>$level,
                "status"=>$status                
            );
            if($love==0||$love==1){
                header("Location:apto-admin/");
            }else if($love==2){
                header("Location:apto-user/");
            }else{
                echo "ERROR";
                header("Location:index.php");
            }
        }else if($isUser==0){
            setcookie("message","belum login, login terlebih dahulu",time()+30,"/");
            header("Location:../index.php");
        }
}


?>