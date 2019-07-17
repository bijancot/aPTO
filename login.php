<?php
require_once("req/database.php");
echo $user=$_POST['username'];
echo $pass=md5($_POST['password']);

echo "anda tidak terdaftar, silahkan kembali <a href=\"index.php\">Kembali</a>";
$log = $mysqli->prepare("SELECT count(IF(iduser IS NULL or iduser = '', 'empty', iduser)),iduser,nama,email,alamat,notelp,jk,level,status from apto_user where username=? and password =? is not null");
$log->bind_param('ss',$user,$pass);
$log->execute();
$log->bind_result($huft,$iduser,$nama,$email,$alamat,$notelp,$jk,$level,$status);

echo $huft;
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
                "level"=>$level,
                "status"=>$status                
            );
            if($love==0||$love==1){
                header("Location:apto-admin/");
            }else if($love==2){
                header("Location:apto-user/");
            }else if($love=='NULL'&&$isUser==0){
                echo "ERROR";
                header("Location:index.php");
            }
        }else if($isUser==0){
            setcookie("message","oops something wrong",time()+30,"/");
            header("Location:index.php");
        }
}


?>
