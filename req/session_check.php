<?php
if($_SESSION['data']==null){
    setcookie("message","belum login, login terlebih dahulu",time()+30,"/");
    header("Location:../index.php");
}
?>